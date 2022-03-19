<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function hitung(Request $request)
    {
        $kata = $this->hitungvokal($request->kata);
        return view('hitung', ['kata' => $kata]);
    }

    private function hitungvokal($kata)
    {
        $data_ = array();
        $hit = 0;
        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $e = 0;
        for ($i = 0; $i < strlen($kata); $i++) {
            if ($kata[$i] == 'a') {
                if ($a == 0) {
                    $data_[$hit] = $kata[$i];
                    $hit++;
                    $a = 1;
                }
            } else if ($kata[$i] == 'i') {
                if ($b == 0) {
                    $data_[$hit] = $kata[$i];
                    $hit++;
                    $b = 1;
                }
            } else if ($kata[$i] == 'u') {
                if ($c == 0) {
                    $data_[$hit] = $kata[$i];
                    $hit++;
                    $c = 1;
                }
            } else if ($kata[$i] == 'e') {
                if ($d == 0) {
                    $data_[$hit] = $kata[$i];
                    $hit++;
                    $d = 1;
                }
            } else if ($kata[$i] == 'o') {
                if ($e == 0) {
                    $data_[$hit] = $kata[$i];
                    $hit++;
                    $e = 1;
                }
            }
        }
        $result =  "\"" . $kata . "\" = $hit yaitu ";
        $tot = count($data_);
        for ($i = 0; $i < $tot; $i++) {
            $result .= $data_[$i];
            if ($i == 0 && $i == $tot - 2) $result .= " dan ";
            else if ($i == $tot - 2) $result .= " dan ";
            else if ($i == $tot - 1);
            else $result .= ", ";
        }
        return $result;
    }
}