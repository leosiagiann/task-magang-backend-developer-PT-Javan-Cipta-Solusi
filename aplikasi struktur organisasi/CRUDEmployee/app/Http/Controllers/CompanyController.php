<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view('company.index', ['company' => $company]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function add(request $request)
    {
        $company = new Company();
        $company->nama = $request->nama;
        $company->alamat = $request->alamat;
        $company->created_at = time();
        $company->updated_at = null;
        $company->save();
        return redirect('/company');
    }

    public function delete(Company $company)
    {
        $company->delete();
        return redirect('/company');
    }

    public function update(Company $company)
    {
        return view('company.update', compact('company'));
    }

    public function change(Request $request, Company $company)
    {
        Company::where('id', $company->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
        return redirect('/company');
    }
}