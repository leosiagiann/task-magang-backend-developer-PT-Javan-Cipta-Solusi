<?php

namespace App\Http\Controllers;

use App\Models\Vilage;
use App\Models\District;
use Illuminate\Http\Request;

class VilageController extends Controller
{
    public function index()
    {
        $vilage = Vilage::all();
        return view('vilage.index', ['vilage' => $vilage]);
    }

    public function create()
    {
        $district = District::all();
        return view('vilage.create', ['district' => $district]);
    }

    public function add(Request $request)
    {
        $vilage = new Vilage();
        $vilage->nama = $request->nama;
        $vilage->id_district = $request->id_district;
        $vilage->save();
        return redirect('/vilage');
    }

    public function update(Vilage $vilage)
    {
        $district = District::all();
        return view('vilage.update', compact('vilage', 'district'));
    }

    public function change(Request $request, Vilage $vilage)
    {
        Vilage::Where('id', $vilage->id)->update([
            'nama' => $request->nama,
            'id_district' => $request->id_district
        ]);
        return redirect('/vilage');
    }

    public function delete(Vilage $vilage)
    {
        $vilage->delete();
        return redirect('/vilage');
    }
}