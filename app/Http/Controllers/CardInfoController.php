<?php

namespace App\Http\Controllers;

use App\AcademicDepartment;
use App\Program;
use App\StudentAcademic;
use Illuminate\Http\Request;
use App\Exports\CardInfoExport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class CardInfoController extends Controller
{
    public $students;

    public function __construct($students=null)
    {
        $this->students = $students;

        $this->middleware('auth:staff');

    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $levels = array(100=>100, 200=>200, 300=>300, 400=>400, 500=>500, 600=>600, 700=>700, 800=>800, 900=>900);

        $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('results.card-info', compact('programs', 'levels'));
    }

    public function findStudent(Request $request)
    {
        $program = Program::where('id', $request->program)->first();

        if($request->level <= 600){

            $degree = $program->degree;

        }
        elseif($request->level <= 700){
            $degree = "PGD";

        }
        elseif($request->level <= 700){
            $degree = $program->masters;

        }
        else{

            $degree = "Ph.D";

        }

        $department = AcademicDepartment::where('id', $program->academic_department_id)->first();

        $students = StudentAcademic::with('student')->where('program_id', $request->program)
                ->where('level', $request->level)->wherehas('student', function ($query)
                {
                    $query->where('status', 1);
                })->get();

        if($students->count() != 0){

            $card_details = [];

            $program = preg_replace('/\s+/', '_', strtolower($program->name));

            $concat_program_level = $program."_".$request->level;

            if(!File::exists(storage_path()."/card_info/$concat_program_level/")){

                File::makeDirectory(storage_path()."/card_info/$concat_program_level/", $mode=0777, true, true);

                File::makeDirectory(storage_path()."/card_info/$concat_program_level/passport", $mode=0777, true, true);

                File::makeDirectory(storage_path()."/card_info/$concat_program_level/signature", $mode=0777, true, true);

            }

            $zip = new \ZipArchive();

            if ($zip->open("$concat_program_level.zip", \ZipArchive::CREATE) !== true) {
                throw new \RuntimeException('Cannot open ' . "$concat_program_level.zip");
            }

            $card_details[0] =
                    [
                        "lname" => "Lastname",
                        "oname" => "OtherNames",
                        "department" => "Department",
                        "program" => "Program",
                        "matri_no" => "Matric Number",
                        "blood_group" => "Blood Group",
                        "level" => "Level",
                        "gender" => "Gender",
                        "card" => "ID Card Name",
                        "signature" => "Signature Name",
                    ];


            foreach ($students as $key => $stud) {

                $card_details[$stud->student_id] =
                    [
                        "lname" => strtoupper(ucwords($stud->student->surname)),
                        "oname" => ucwords(strtolower($stud->student->first_name))." ".ucwords(strtolower($stud->student->middle_name)),
                        "department" => ucwords(strtolower($department->name)),
                        "program" => "$degree ".ucwords(strtolower($stud->program->name)),
                        "matri_no" => $stud->mat_no,
                        "blood_group" => strtoupper($stud->student_medical->blood_group),
                        // "blood_group" => strtoupper(optional($stud->student_medical)->blood_group ?? 'N/A'),
                        "level" => $stud->level,
                        "gender" => ucwords(strtolower($stud->student->gender)),
                        "card" => $stud->student_id,
                        "signature" => $stud->student_id,
                    ];

                    $filename =  $stud->student_id;

                    if($stud->student->passport != null){

                        file_put_contents(
                            storage_path()."/card_info/$concat_program_level/passport/"."$filename.png",
                            base64_decode(
                                str_replace('data:image/jpeg;base64,', '', $stud->student->passport)
                            )
                        );

                        $zip->addFile(storage_path()."/card_info/$concat_program_level/passport/"."$filename.png", "passport/$filename.png");

                    }

                    if($stud->student->signature != null){

                        file_put_contents(
                            storage_path()."/card_info/$concat_program_level/signature/"."$filename.png",
                            base64_decode(
                                str_replace('data:image/jpeg;base64,', '', $stud->student->signature)
                            )
                        );

                        $zip->addFile(storage_path()."/card_info/$concat_program_level/signature/"."$filename.png", "signature/$filename.png");

                    }




            }

            $export = new CardInfoExport($card_details);

            Excel::store($export, "$concat_program_level.xlsx");

            $zip->addFile(storage_path()."/app/$concat_program_level.xlsx", "$concat_program_level.xlsx");

            $zip->close();

            if (File::exists(storage_path()."/app/$concat_program_level.xlsx")) File::delete(storage_path()."/app/$concat_program_level.xlsx");
            if (File::exists(storage_path()."/card_info")) File::deleteDirectory(storage_path()."/card_info");

            return response()->download("$concat_program_level.zip")->deleteFileAfterSend(true);

        }
        else{

            $request->session()->flash('message', 'Error: No student record found in selected program and level.');

        }

    }

}
