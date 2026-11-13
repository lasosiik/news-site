@extends('layouts.app')

@section('content')
    <h2>Вход в аккаунт</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label>Логин:</label>
        <input type="text" name="name" required>

        <label>Пароль:</label>
        <input type="password" name="password" required>

        <button type="submit">Войти</button>
    </form>

    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
@endsection