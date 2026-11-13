@extends('layouts.app')

@php
    use App\Models\Category;
@endphp

@section('content')
    <h2>Панель журналиста</h2>
    <p>Создание новой статьи.</p>

    <form action="{{ route('journalist.store') }}" method="POST">
        @csrf
        <label>Заголовок статьи:</label>
        <input type="text" name="heading" required>

        <label>Категория:</label>
        <select name="category_id" required>
            @foreach(Category::all() as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <label>Текст статьи:</label>
        <textarea name="text" rows="5" required></textarea>

        <button type="submit">Опубликовать</button>
    </form>
@endsection