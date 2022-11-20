<?php

namespace App\Imports;

use App\StudentResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ProgramCoursesImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
   {
        return new StudentResult([
            //
       'mat_no' => [$row][2],
       'ca1' => $row[3],
       'ca2' => $row[4],
       'ca3' => $row[5],
       'exam' => $row[6],

        ]);
    }
}
