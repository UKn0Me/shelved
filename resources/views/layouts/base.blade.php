<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Shelved.</title>

    @section('styles')
        <link rel="stylesheet" href="/assets/css/dist/normalize.css">
        <link rel="stylesheet" href="/assets/css/dist/unsemantic.css">

        <link rel="stylesheet" href="/assets/css/base.css">

        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans">
        <link rel="stylesheet" href="/assets/css/dist/fontawesome.css">
    @show
</head>
<body>
<header>
    <div class="container">
        <h1 id="logo">
            @unless(Auth::check())
                <a href="/">Shelved.</a>
            @endunless
            @if(Auth::check())
                <a href="/dashboard">Shelved.</a>
            @endif
        </h1>

        <nav>
            <ul>
                @unless(Auth::check())
                    <li>
                        <a href="/login">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/signup">Sign up</a>
                    </li>
                @endunless

                @if(Auth::check())
                    @if(Auth::user()->group_id == 1)
                        <li>
                            <a href="/admin">Admin</a>
                        </li>
                    @endif
                    <li>
                        <a href="/dashboard/bookmarks">Bookmarks</a>
                    </li>
                    <li>
                        <a href="/dashboard/tags">Tags</a>
                    </li>
                    <li>
                        <a href="/dashboard/settings">Hello {{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <a href="/logout">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
<main>
    @yield('content')
</main>
<footer>
    <div class="grid-container container">
        <section class="grid-60 mobile-grid-100">
            <p>Shelved. is licensed under the <a href="https://opensource.org/licenses/MIT">MIT licence</a>, which means
                it's open source and free to play with!</p>
        </section>
        <section class="grid-40 mobile-grid-100">
            <nav>
                <ul>
                    <li><a href="/privacy">Privacy policy</a></li>
                    <li><a href="/terms">Terms of service</a></li>
                </ul>
            </nav>
        </section>
    </div>
</footer>
</body>
</html>
