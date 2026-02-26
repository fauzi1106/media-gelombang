<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Media Pembelajaran')</title>

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="{{ asset('css/style_gelombang.css') }}">
    <!-- JS GLOBAL -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>


</head>

<body>

    <!-- TOP BAR USER -->
    <div class="topbar">
        <div class="topbar-right">

            @auth
                <span class="user-name">
                    👤 {{ auth()->user()->name }}
                </span>

                <form action="{{ url('/logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </div>

    @yield('content')
    @yield('scripts')

    


</body>

</html>