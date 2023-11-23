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
        <h2 class="text-center fw-bold mt-5">Daftar Beasiswa</h2>
    </div>
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Status Ajuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td> {{ $key+1 }} </td>
                    <td> {{ $item->nama }} </td>
                    <td> {{ $item->status_ajuan }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
