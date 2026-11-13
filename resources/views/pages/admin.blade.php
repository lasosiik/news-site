@extends('layouts.app')

@section('content')
    <h2>Панель администратора</h2>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <h3>Управление статьями</h3>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
        <tr style="background: #eee;">
            <th style="padding: 10px; text-align: left;">Заголовок</th>
            <th style="padding: 10px; text-align: left;">Автор</th>
            <th style="padding: 10px; text-align: left;">Действия</th>
        </tr>
        @forelse($articles as $article)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 10px;">{{ $article->heading }}</td>
                <td style="padding: 10px;">{{ $article->user->name ?? 'Неизвестен' }}</td>
                <td style="padding: 10px;">
                    <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: red; color: white; border: none; padding: 5px 10px; cursor: pointer;" onclick="return confirm('Точно удалить?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3" style="padding: 10px;">Статей пока нет.</td></tr>
        @endforelse
    </table>

    <h3 style="margin-top: 30px;">Изменение ролей пользователей</h3>
    <form action="{{ route('admin.role.update') }}" method="POST">
        @csrf
        <label>Выберите пользователя:</label>
        <select name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role->name ?? 'Без роли' }})</option>
            @endforeach
        </select>

                <label>Новая роль:</label>
        <select name="role_id" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">
                    @if($role->name == 'admin') Администратор
                    @elseif($role->name == 'journalist') Журналист
                    @elseif($role->name == 'reader') Читатель
                    @else {{ $role->name }}
                    @endif
                </option>
            @endforeach
        </select>

        <button type="submit" style="background: #0056b3; color: white; border: none; padding: 10px 15px; cursor: pointer;">Изменить роль</button>
    </form>
@endsection