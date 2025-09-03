<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>ToDo App</title>
</head>

<body class="antialiased bg-gray-100 min-h-screen flex flex-col">
    @include('layouts.header')

    <div class="w-full  flex-1">
        @yield('content')
    </div>

    @include('components.toast')
</body>

</html>
