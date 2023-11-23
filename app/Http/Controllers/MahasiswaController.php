<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('pendaftaran.create', ['mahasiswa' => $mahasiswa]);
    }
}
