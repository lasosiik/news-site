@extends('layouts.app')

@section('content')
    <h2>Главная страница</h2>
    
    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    @forelse($articles as $article)
        <div class="card">
            <h3>{{ $article->heading }}</h3>
            <p>{{ $article->text }}</p>
            <small>
                Категория: <b>{{ $article->category->name ?? 'Без категории' }}</b> | 
                Автор: <b>{{ $article->user->name ?? 'Неизвестен' }}</b> | 
                {{ $article->created_at->format('d.m.Y H:i') }}
            </small>
        </div>
    @empty
        <p>Пока нет ни одной статьи.</p>
    @endforelse
@endsection