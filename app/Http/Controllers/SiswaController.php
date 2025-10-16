<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = array(
        'title' => 'Dashboard Siswa',
        'menuSiswa' => 'active',
        );
    }
}