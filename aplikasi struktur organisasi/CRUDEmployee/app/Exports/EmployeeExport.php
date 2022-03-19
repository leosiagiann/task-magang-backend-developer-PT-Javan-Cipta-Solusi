<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'id',
            'nama',
            'Posisi',
            'Perusahaan'
        ];
    }

    public function collection()
    {
        $result = Employee::all();
        $data = $result;
        foreach ($result as $s) {
            if ($s->atasan_id == 0) {
                $s->atasan_id = "CEO";
            } else if ($s->atasan_id == 1) {
                $s->atasan_id = "Direktur";
            } else if ($s->atasan_id == 2 || $s->atasan_id == 3) {
                $s->atasan_id = "Manager";
            } else {
                $s->atasan_id = "Staff";
            }
            $s->company_id = $s->company->nama;
        }
        return  $data;
    }
}