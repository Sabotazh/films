<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ivan Sabat">
    <title>Иван Сабат тестовое задание</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>

<div class="container">
    <header class="border-bottom lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1"></div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{ route('start_page') }}">Тестовое
                    задание для фреймворка Laravel</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center"></div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-3 border-bottom">
        <nav class="nav nav-underline justify-content-between">
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('genres.index') }}">Жанры</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('films.index') }}">Фильмы</a>
            <a class="nav-item nav-link link-body-emphasis" href="#"></a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('genres.create') }}">Добавить жанр</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('films.create') }}">Добавить фильм</a>
        </nav>
    </div>
</div>

<main class="container">
    @yield('content')
</main>

<footer class="py-5 text-center text-body-secondary bg-body-tertiary">
    <p>Тестовое задание выполнил <a href="https://github.com/Sabotazh" target="_blank">Иван Сабат</a>.</p>
    <p class="mb-0">
        <?= date('Y') ?>
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
