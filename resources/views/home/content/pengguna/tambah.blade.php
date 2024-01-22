@extends('home.dashboard.layouts.index')

@section('title')
    <h3>Tambah Pengguna:</h3>
@endsection


@section('container')
    <form class="card" action="{{ route('user.store') }}" method="POST">


        <div class="card-body">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="name">Name</label>

                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
                    value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label" for="username">Username</label>

                <input class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    type="text" value="{{ old('username') }}">

                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>

                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    type="email" value="{{ old('email') }}">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>

                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    type="password">

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <div class="mb-3">
                <label class="form-label" for="role">Role</label>

                <select name="role" id="role" class="form-control">
                    <option value="" selected disabled>Pilih...</option>
                    @foreach ($roles as $key => $name)
                        <option value="{{ $key }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Simpan</button>
            <a class="btn btn-secondary" href="{{ route('user.index') }}">Kembali</a>
        </div>
    </form>
@endsection
