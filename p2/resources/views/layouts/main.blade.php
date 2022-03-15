<!doctype html>
<html lang='en'>

<head>
    <title>Hobbyist</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='/public/css/styles.css' type='text/css' rel='stylesheet'>

    @yield('head')
</head>

<body class="min-vh-100 bg-light">

    <header>
        <h1 class="text-center">Hobbyist<h1>
    </header>

    <section class="d-flex flex-column justify-content-center align-items-center py-5">
        @yield('content')
    </section>

    <footer class="text-center py-4 mt-auto">
        <p class="my-1 fs-5">Made with ❤️ by Paula LF 2022</p>
    </footer>

</body>

</html>
