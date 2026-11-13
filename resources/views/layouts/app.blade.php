<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новостной сайт</title>
        <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body { 
            font-family: Arial, sans-serif; 
            background: #f9f9f9; 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh;
        }
        .container { 
            max-width: 1000px; 
            margin: 20px auto; 
            padding: 20px; 
            background: #fff; 
            border: 1px solid #ddd; 
            flex: 1; /* Это заставляет контент растягиваться и прижимать футер вниз */
            width: 100%;
            box-sizing: border-box;
        }
        .card { border-bottom: 1px solid #eee; padding: 10px 0; }
        input, textarea, select { width: 100%; padding: 8px; margin: 5px 0 15px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #0056b3; color: white; border: none; cursor: pointer; }
        .btn-danger { background: #dc3545; }
        .btn-warning { background: #ffc107; color: #000; }
    </style>
</head>
<body>

    @include('components.header')

    <main class="container">
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>