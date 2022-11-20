<?php

namespace App\Exports;

use App\AcademicDepartment;
use Maatwebsite\Excel\Concerns\FromCollection;

class AcademicDepartmentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AcademicDepartment::all();
    }
}
