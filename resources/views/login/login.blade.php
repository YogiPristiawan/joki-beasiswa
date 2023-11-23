@extends('layout.layout')
@section('konten')
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
            <h1>Log In</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ( $errors->all() as $item )
                            <li> {{$item}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" value="{{old('email')}}" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" value="{{old('password')}}" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-danger">Masuk</button>
            </form>
        </div>
    </div>
@endsection
