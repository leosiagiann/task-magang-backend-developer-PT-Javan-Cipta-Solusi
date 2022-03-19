<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function hasil(Request $request)
    {
        $data = $this->getNumber($request);
        $angka = $request->angka1;
        return view('hasil', compact('data', 'angka'));
    }

    private function getNumber($param)
    {
        $data = [];
        $no = 0;
        for ($i = $param->angka1; $i <= $param->angka2; $i++) {
            if ($i % 2 == 0)
                $data[$no] = "Angka Genap";
            else
                $data[$no] = "Angka Ganjil";
            $no++;
        }
        return $data;
    }
}