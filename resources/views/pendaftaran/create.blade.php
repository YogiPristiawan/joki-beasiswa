@extends('layout.layout')
@section('konten')
    <div class="mx-5 mt-5 fs-1 fw-bold">Daftar Beasiswa</div>
    <form class="mx-5 mt-4" action="{{ url('pendaftaran') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nim">NIM</label>
        <select name="nim" id="nim" class="form-control">
            @foreach ($mahasiswa as $item)
                <option value="{{ $item->nim }}">{{ $item->nim }} - {{ $item->nama }}</option>
            @endforeach
        </select>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" readonly>

        <label for="ipk">IPK:</label>
        <input type="text" name="ipk" id="ipk" readonly>

        {{-- <div class="mb-3">
            <label for="nama" class="form-label">Masukkan Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                id="nama" name="nama">
            @error('nama')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div> --}}

        {{-- <div class="mb-3">
            <label for="nama" class="form-label">Masukkan NIM</label>
            <input type="number" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}"
                id="nim" name="nim">
            @error('nim')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="email" class="form-label">Masukkan Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                id="email" name="email">
            @error('email')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="noHp" class="form-label">Nomor HP</label>
            <input type="number" class="form-control @error('noHp') is-invalid @enderror" value="{{ old('noHp') }}"
                id="noHp" name="noHp">
            @error('noHp')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester Saat Ini</label>
            <div class="input-group mb-3">
                <select name="semester" class="form-select" id="semester">
                    <option selected>Pilih...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
        </div>

        {{-- <div class="mb-3">
            <label for="ipk" class="form-label">IPK Terakhir</label>
            <input type="number" class="form-control" id="ipk" name="ipk" disabled required>
        </div> --}}

        @if ('ipk' >= 3)
            <div class="mb-3">
                <label for="jenisBeasiswa" class="form-label">Pilihan Beasiswa</label>
                <div class="input-group mb-3">
                    <select name="jenisBeasiswa" class="form-select" id="jenisBeasiswa">
                        <option selected>Pilih...</option>
                        <option value="Beasiswa Akademik">Beasiswa Akademik</option>
                        <option value="Beasiswa Non-Akademik">Beasiswa Non-Akademik</option>
                        <option value="Beasiswa Bidikmisi">Beasiswa Bidikmisi</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="fileBerkas" class="form-label">Upload Berkas Syarat</label>
                <input type="file" class="form-control @error('fileBerkas') is-invalid @enderror"
                    value="{{ old('fileBerkas') }}" id="fileBerkas" name="fileBerkas">
                @error('fileBerkas')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <button type="submit" name="submit" class="btn btn-primary my-4">Daftar</button>
        @else
            <div class="mb-3">
                <label for="jenisBeasiswa" class="form-label">Pilihan Beasiswa</label>
                <div class="input-group mb-3">
                    <select name="jenisBeasiswa" class="form-select" id="jenisBeasiswa" disabled>
                        <option selected>Pilih...</option>
                        <option value="Beasiswa Akademik">Beasiswa Akademik</option>
                        <option value="Beasiswa Non-Akademik">Beasiswa Non-Akademik</option>
                        <option value="Beasiswa Bidikmisi">Beasiswa Bidikmisi</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="fileBerkas" class="form-label">Upload Berkas Syarat</label>
                <input type="file" class="form-control @error('fileBerkas') is-invalid @enderror"
                    value="{{ old('fileBerkas') }}" id="disabledInput" name="fileBerkas" disabled>
                @error('fileBerkas')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <button type="submit" name="submit" class="btn btn-primary my-4" disabled>Daftar</button>
        @endif

        <a href="{{ url('/') }}" class="btn btn-light my-4">Cancel</a>
    </form>

    <script>
        $("#nim").on("change", function(e) {
            $.ajax({
                url: '/fetch-ipk',
                type: 'GET',
                data: {
                    nim: e.target.value
                },
                success: function(response) {
                    console.log("response", response)
                    $('#nama').val(response.nama);
                    $('#ipk').val(response.ipk);
                }
            });
        })
    </script>
@endsection
