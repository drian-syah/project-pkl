<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function index ()
    {
        $data = [
        'title' => 'Menu Bidang',
        'menuAdminBidang' => 'active',
        'menuAdminBidangShow' => 'active',
        'bidang' => Bidang::orderBy('id', 'asc')->get(),
        ];
        
        return view('admin.data_bidang.daftar_bidang.index', $data);
    }
}
