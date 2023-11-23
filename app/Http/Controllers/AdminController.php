<?php

namespace App\Http\Controllers;

use App\Charts\BeasiswaChart;
use App\Models\admin;
use App\Models\mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(BeasiswaChart $BeasiswaChart) 
    {
        $data = Pendaftaran::orderBy('nim', 'asc')->get();
        return view('admin.index', ['data' => $data, 'BeasiswaChart' => $BeasiswaChart->build()]);
    }

}
