<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    // fungsi untuk menampilkan daftar data yang sudah diinput
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('pendaftaran.create', compact('mahasiswa'));
        // $data = Pendaftaran::orderBy('nim', 'asc')->get();
        // return view('pendaftaran.hasil')->with('data', $data,);

    }

    // fungsi untuk membuat data baru
    public function create()
    {
        $this->middleware('auth')->only('pendaftaran.create');

        $mahasiswa = Mahasiswa::all();
        return view('pendaftaran.create', [
            "mahasiswa" => $mahasiswa
        ]);
    }

    public function store(Request $request)
    {
        // validasi data
        $request->validate(
            [
                'nama' => 'required',
                'nim' => 'required',
                'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'noHp' => 'required|numeric',
                'semester' => 'required',
                'jenisBeasiswa' => 'required',
                'fileBerkas' => 'required',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'nim.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Masukkan alamat email yang valid',
                'email.regex' => 'Format email tidak valid',
                'noHp.required' => 'Nomor HP wajib diisi',
                'fileBerkas.required' => 'Berkas syarat wajib diisi',
            ]
        );

        // fungsi mengupload file atau document pada form
        $fileBerkas = $request->file('fileBerkas');
        $nama_file = 'BERKAS' . date('Ymdhis') . '-' . $request->file('fileBerkas')->getClientOriginalName();
        $fileBerkas->move('public/berkas syarat/', $nama_file);

        // fungsi memanggil data
        $data = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'noHp' => $request->noHp,
            'semester' => $request->semester,
            'jenisBeasiswa' => $request->jenisBeasiswa,
            'fileBerkas' => $request->fileBerkas,
            'fileBerkas' => $nama_file,
            'status_ajuan' => 'Belum Diverifikasi',
            // 'ipk' => $request->ipk,
        ];

        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        if ($mahasiswa) {
            $request->validate([
                'nim' => 'required|exists:mahasiswa',
                'nama' => 'required',
                'ipk' => 'required',
            ]);

            $mahasiswa->nama = $request->nama;
            $mahasiswa->ipk = $request->ipk;
            $mahasiswa->save();

            return redirect()->route('/')->with('success', 'Data beasiswa berhasil disimpan');
        } else {
            return redirect()->route('/pendaftaran.create')->with('error', 'Data mahasiswa tidak ditemukan');
        }
        // Pendaftaran::create($data);
        // return redirect()->to('/')->with('success', 'Berhasil menambahkan data');
    }

    public function fetchIpk(Request $request)
    {
        $nim = $request->input('nim');
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return response()->json(['nama' => $mahasiswa->nama, 'ipk' => $mahasiswa->ipk]);
    }

    public function update(string $nim)
    {
        $data = Pendaftaran::findorfail($nim);
        $data->status_ajuan = 'Verifikasi';
        $data->save();
        return redirect()->to('admin')->with('success', 'Verifikasi berhasil');
    }

    public function destroy(string $nim)
    {
        $data = Pendaftaran::findorfail($nim)->delete();
        return redirect()->to('admin')->with('success', 'Data berhasil dihapus');
    }
}
