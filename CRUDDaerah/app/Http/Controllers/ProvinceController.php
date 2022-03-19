<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\Vilage;

use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $province = Province::all();
        return view('province.index', ['province' => $province]);
    }

    public function create()
    {
        return view('province.create');
    }

    public function add(Request $request)
    {
        $province = new Province();
        $province->nama = $request->nama;
        $province->save();
        return redirect('/');
    }

    public function update(Province $province)
    {
        return view('province.update', compact('province'));
    }

    public function change(Request $request, Province $province)
    {
        Province::where('id', $province->id)->update([
            'nama' => $request->nama
        ]);
        return redirect('/');
    }

    public function delete(Province $province)
    {
        $province->delete();
        $city = City::where('id_province', $province->id)->get();
        foreach ($city as $c) {
            $district = District::where('id_city', $c->id)->get();
            foreach ($district as $d) {
                Vilage::where('id_district', $d->id)->delete();
            }
            District::where('id_city', $c->id)->delete();
        }
        City::where('id_province', $province->id)->delete();
        return redirect('/');
    }
}