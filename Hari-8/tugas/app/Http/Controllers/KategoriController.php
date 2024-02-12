<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $kategoris = Kategori::all();
        return view("/portofolio", compact("kategoris"));
    }
}
