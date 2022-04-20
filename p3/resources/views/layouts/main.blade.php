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
        <nav>
            <ul>
                <li><a href='/'>Home</a></li>
                <li><a href='/books'>All Books</a></li>
                <li><a href='/list'>Your list</a></li>
                <li><a href='/contact'>Contact</a></li>
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
