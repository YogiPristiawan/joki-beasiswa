@extends('layout.layout')
@section('konten')
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <img src="{{ asset('images/logo-landscape.png') }}" class="img-thumbnail" style="width: 130px; height: 50px;"
                alt="logo-ittp">
            <ul class="d-flex navbar-nav mb-2 mb-lg-0">

                <li class="nav-item">
                    <a href="{{ url('admin') }}" class="btn nav-link text-light fw-bold">Data Beasiswa</a>
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
    <div class="container mt-5 mx-auto">

        {!! $BeasiswaChart->container() !!}

    </div>

    <div class="container">
        <h2 class="text-center fw-bold mt-5">Data Beasiswa</h2>

        <table class="border-dark border table mt-5">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No. Hp</th>
                    <th scope="col">Semester saat ini</th>
                    <th scope="col">IPK</th>
                    <th scope="col">Pilihan beasiswa</th>
                    <th scope="col">Berkas Syarat</th>
                    <th scope="col">Status Ajuan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td> {{ $key+1}} </td>
                        <td> {{ $item->nama }} </td>
                        <td> {{ $item->email }} </td>
                        <td> {{ $item->noHp }} </td>
                        <td> {{ $item->semester }} </td>
                        <td> {{ $item->ipk }} </td>
                        <td> {{ $item->jenisBeasiswa }} </td>
                        <td>
                            <a href="public/berkas user/{{ $item->fileBerkas }}" target="_blank"
                                rel="noopener noreferrer">Lihat
                                Berkas</a>
                        </td>
                        <td> {{ $item->status_ajuan }} </td>
                        <td>
                            @if ($item->status_ajuan != 'Verifikasi')
                                <form action="{{ url('pendaftaran/' . $item->nim) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Verifikasi</button>
                                </form>
                            @endif
                            <form onsubmit="return confirm('Apakah yakin untuk menghapus data?')"
                                action="{{ url('pendaftaran/' . $item->nim) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-light">Hapus</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ $BeasiswaChart->cdn() }}"></script>

    {{ $BeasiswaChart->script() }}
@endsection
