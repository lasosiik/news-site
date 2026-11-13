@extends('layouts.app')

@section('content')
    <h2>Регистрация</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label>Логин:</label>
        <input type="text" name="name" required>

        <label>Пароль:</label>
        <input type="password" name="password" required>

        <label>Подтвердите пароль:</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Зарегистрироваться</button>
    </form>

    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
@endsection