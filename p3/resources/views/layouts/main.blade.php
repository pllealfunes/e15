<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'Hobbyist Blog')</title>
    <meta charset='utf-8'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href='/css/styles.css' type='text/css' rel='stylesheet'>

    @yield('head')
</head>

<body>

    <header>
        <h1>Hobbyist</h1>
        <nav>
            <ul>
                <li><a href='/'>Home</a></li>
                @if (!Auth::user())
                    <li><a href='/login' test='login-link'>Login</a></li>
                @else
                    <li><a href='/posts/create' test='newpost-link'>New Post</a></li>
                    <form method='POST' id='logout' action='/logout'>
                        {{ csrf_field() }}

                        {{-- Codeception can’t invoke our JavaScript so instead of a link thta acts as a submit button, we'll use a button that's styled like a link to submit this form.
                        <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a> --}}

                        <button type='submit' class='button-link' test='logout-button'>
                            Logout
                        </button>
                    </form>
                @endif
                </li>
            </ul>
        </nav>
    </header>

    <section id='main'>
        @yield('content')
    </section>

    <footer>
        &copy; Made with love by Paula LF SP 2022
    </footer>

</body>

</html>
