<header style="background: #333; color: #fff; padding: 15px;">
    <h2>Новостной портал</h2>
    <nav>
        <a href="{{ route('home') }}" style="color: #fff; margin-right: 15px;">Главная</a>
        <a href="{{ route('category') }}" style="color: #fff; margin-right: 15px;">Категория</a>


        @auth
            @if(in_array(Auth::user()->role?->name, ['journalist', 'admin']))
                <a href="{{ route('journalist') }}" style="color: #fff; margin-right: 15px;">Журналист</a>
            @endif

            @if(Auth::user()->role?->name === 'admin')
                <a href="{{ route('admin') }}" style="color: #fff; margin-right: 15px;">Админ</a>
            @endif

            <span style="margin-left: 20px;">Привет, {{ Auth::user()->name }}!</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #ff6b6b; cursor: pointer;">Выйти</button>
            </form>
        @else
            <a href="{{ route('login') }}" style="color: #fff; margin-left: 20px;">Вход</a>
            <a href="{{ route('register') }}" style="color: #fff; margin-left: 15px;">Регистрация</a>
        @endauth
    </nav>
</header>