@extends('layouts.app')

@section('content')
    <h2>Категория: {{ $selectedCategory }}</h2>

    <div style="margin-bottom: 20px;">
        <a href="{{ route('category', ['category_id' => 1]) }}" style="margin-right: 10px; padding: 5px 10px; background: {{ $categoryId == 1 ? '#ccc' : '#eee' }}; text-decoration: none; color: #333; border-radius: 4px;">Наука</a>
        <a href="{{ route('category', ['category_id' => 2]) }}" style="margin-right: 10px; padding: 5px 10px; background: {{ $categoryId == 2 ? '#ccc' : '#eee' }}; text-decoration: none; color: #333; border-radius: 4px;">Технологии</a>
        <a href="{{ route('category', ['category_id' => 3]) }}" style="margin-right: 10px; padding: 5px 10px; background: {{ $categoryId == 3 ? '#ccc' : '#eee' }}; text-decoration: none; color: #333; border-radius: 4px;">Спорт</a>
    </div>

    @forelse($articles as $article)
        <div class="card">
            <h3>{{ $article->heading }}</h3> 
            <p>{{ $article->text }}</p> 
            <small>Автор: <b>{{ $article->user->name ?? 'Неизвестен' }}</b></small>
        </div>
    @empty
        <p>В этой категории пока нет статей.</p>
    @endforelse
@endsection