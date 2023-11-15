<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class CardInfoExport implements FromArray
{
    protected $students;

    public function __construct(array $students)
    {
        $this->students = $students;
    }

    /**
    * @return \Illuminate\Support\Array
    */
    public function array(): array
    {
        return $this->students;
    }
}
