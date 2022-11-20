<?php

namespace App\Imports;

use App\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            //
            'question'   => $row[0],
            'optiona'    => $row[1], 
            'optionb'    => $row[2], 
            'optionc'    => $row[3],
            'optiond'    => $row[4],
        ]);
    }
}
