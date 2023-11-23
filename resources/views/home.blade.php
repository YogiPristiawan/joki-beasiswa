@extends('layout.layout')

@section('konten')
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <img src="{{ asset('images/logo-landscape.png') }}" class="img-thumbnail" style="width: 130px; height: 50px;"
                alt="logo-ittp">
            <ul class="d-flex navbar-nav mb-2 mb-lg-0">

                <li class="nav-item">
                    <a href="{{ url('/') }}" class="btn nav-link text-light fw-bold">Home</a>
                </li>

                <li class="nav-item">
                    @auth
                        <a href="{{ url('pendaftaran/create') }}" class="nav-link text-light fw-bold" href="#">Daftar
                            Beasiswa</a>
                    @else
                        <a href="{{ url('login') }}" class="nav-link text-light fw-bold">Daftar Beasiswa</a>
                    @endauth
                </li>

                <li class="nav-item">
                    @auth
                        <a href="{{ url('pendaftaran/hasil') }}" class="nav-link text-light fw-bold" href="#">Hasil</a>
                    @else
                        <a href="{{ url('login') }}" class="nav-link text-light fw-bold">Hasil</a>
                    @endauth
                </li>

                @guest
                    <a href="{{ url('login') }}" class="btn btn-light text-dark">Log In</a>
                @else
                    <a href="{{ url('logout') }}" class="btn btn-light text-dark">Log Out</a>
                @endguest
            </ul>
        </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center fw-bold mt-5">Sistem Beasiswa Institut Teknologi Telkom Purwokerto</h2>
    </div>
    <div class="card mt-5 mx-5 bg-light">
        <div class="card-body">
            <h4 class="card-title fw-bold">Beasiswa Akademik</h4>
            <h6 class="card-subtitle mb-2 fw-normal">Beasiswa ini diperuntukan bagi mahasiswa yang memiliki prestasi
                akademik
                yang tinggi. Prestasi akademik dinilai dari nilai IPK atau pencapaian akademik lainnya. Beasiswa yang
                didapatkan berupa potongan 50% UKT kuliah</h6>
        </div>
        <div class="card-body">
            <h4 class="card-title fw-bold">Beasiswa Non-Akademik</h4>
            <h6 class="card-subtitle mb-2 fw-normal">Beasiswa ini diperuntukan bagi mahasiswa yang memiliki prestasi selain
                di bidang akademik. Beberapa jenis beasiswa non-akademik melibatkan prestasi dalam olahraga, seni, kegiatan
                sosial, kepemimpinan, atau keahlian khusus lainnya. Beasiswa yang didapatkan berupa potongan 50% UKT kuliah
            </h6>
        </div>
        <div class="card-body">
            <h4 class="card-title fw-bold">Beasiswa Bidikmisi</h4>
            <h6 class="card-subtitle mb-2 fw-normal">BBeasiswa Bidikmisi adalah program bantuan keuangan yang
                diselenggarakan oleh Pemerintah Indonesia melalui Kementerian Pendidikan dan Kebudayaan. Program ini
                bertujuan untuk memberikan akses pendidikan tinggi kepada mahasiswa berprestasi namun memiliki keterbatasan
                ekonomi. Nama "Bidikmisi" sendiri merupakan singkatan dari "Bantuan Pendidikan Masyarakat Berprestasi."
            </h6>
        </div>
        <div class="card-body">
            @auth
                <a href="{{ url('pendaftaran/create') }}" class="btn btn-danger" type="button">Daftar Sekarang</a>
            @else
                <a href="{{ url('login') }}" class="btn btn-danger" type="button">Daftar Sekarang</a>
            @endauth
        </div>
    </div>
@endsection
