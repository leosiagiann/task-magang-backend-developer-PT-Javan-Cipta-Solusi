<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\District;
use App\Models\Vilage;
use App\Models\Village;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $city = City::all();
        return view('city.index', ['city' => $city]);
    }

    public function create()
    {
        $province = Province::all();
        return view('city.create', ['province' => $province]);
    }

    public function add(Request $request)
    {
        $city = new City();
        $city->nama = $request->nama;
        $city->id_province = $request->id_province;
        $city->save();
        return redirect('/city');
    }

    public function update(City $city)
    {
        $province = Province::all();
        return view('city.update', compact('city', 'province'));
    }

    public function change(Request $request, City $city)
    {
        City::Where('id', $city->id)->update([
            'nama' => $request->nama,
            'id_province' => $request->id_province
        ]);
        return redirect('/city');
    }

    public function delete(City $city)
    {
        $city->delete();
        $district = District::where('id_city', $city->id)->get();
        foreach ($district as $d) {
            Vilage::where('id_district', $d->id)->delete();
        }
        District::where('id_city', $city->id)->delete();
        return redirect('/city');
    }
}