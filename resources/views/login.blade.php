@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="login-page">

    <div class="login-box">
        <h2>Login Pengguna</h2>
        <p>Masukkan NIS (Siswa) atau NIP (Guru)</p>

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label>Username / NIS / NIP</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>
        </form>
    </div>

</div>

@endsection
