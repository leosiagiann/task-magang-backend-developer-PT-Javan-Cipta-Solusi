<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return view('index', ['employee' => $employee]);
    }

    public function create()
    {
        $employee = Employee::all();
        return view('create', ['employee' => $employee]);
    }

    public function add(request $request)
    {
        $employee = new Employee();
        $employee->nama = $request->nama;
        $employee->atasan_id = $request->atasan_id;
        $employee->company_id = $request->company_id;
        $employee->created_at = time();
        $employee->updated_at = null;
        $employee->save();
        return redirect('/');
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
        return redirect('/');
    }

    public function update(Employee $employee)
    {
        $allemployee = Employee::all();
        return view('update', compact('employee'), ['allemployee' => $allemployee]);
    }

    public function change(Request $request, Employee $employee)
    {
        Employee::where('id', $employee->id)->update([
            'nama' => $request->nama,
            'atasan_id' => $request->atasan_id,
            'company_id' => $request->company_id
        ]);
        return redirect('/');
    }

    public function datadownload()
    {
        $employee = Employee::all();
        return view('data', ['employee' => $employee]);
    }

    public function excel()
    {
        return Excel::Download(new EmployeeExport, 'Employee.xlsx');
    }

    public function pdf()
    {
        $employee = Employee::all();
        $pdf = PDF::loadView('employee', compact('employee'));
        return $pdf->download('employee.pdf');
    }
}