<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\City;
use App\Models\Vilage;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $district = District::all();
        return view('district.index', ['district' => $district]);
    }

    public function create()
    {
        $city = City::all();
        return view('district.create', ['city' => $city]);
    }

    public function add(Request $request)
    {
        $district = new District();
        $district->nama = $request->nama;
        $district->id_city = $request->id_city;
        $district->save();
        return redirect('/district');
    }

    public function update(District $district)
    {
        $city = City::all();
        return view('district.update', compact('district', 'city'));
    }

    public function change(Request $request, District $district)
    {
        District::Where('id', $district->id)->update([
            'nama' => $request->nama,
            'id_city' => $request->id_city
        ]);
        return redirect('/district');
    }

    public function delete(District $district)
    {
        $district->delete();
        Vilage::where('id_district', $district->id)->delete();
        return redirect('/district');
    }
}