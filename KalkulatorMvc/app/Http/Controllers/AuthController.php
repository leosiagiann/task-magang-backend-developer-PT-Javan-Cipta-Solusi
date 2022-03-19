<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function execute(Request $request)
    {
        $soal = '"' . $request->angka1 . ' ' . $request->operasi . ' ' . $request->angka2 . '" =';
        $hasil = 0;
        if ($request->operasi == "*") {
            $hasil = $request->angka1 * $request->angka2;
        } elseif ($request->operasi == "/") {
            $hasil = $request->angka1 / $request->angka2;
        } elseif ($request->operasi == "-") {
            $hasil = $request->angka1 - $request->angka2;
        } else {
            $hasil = $request->angka1 + $request->angka2;
        }
        return view('execute', compact('soal', 'hasil'));
    }
}