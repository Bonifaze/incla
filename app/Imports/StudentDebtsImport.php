<?php

namespace App\Imports;

use App\StudentDebt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class StudentDebtsImport implements WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudentDebt([
            //
            'surname'   => $row[0],
            'first_name'    => $row[1], 
            'middle_name'    => $row[2], 
            'matric_no'    => $row[3],  //$row[13],
            //'student_id'    => //$row[14],
            //'tuition'    => //$row[15],
            'debt'    => $row[4], //$row[26],
            
        ]);
    }
}
