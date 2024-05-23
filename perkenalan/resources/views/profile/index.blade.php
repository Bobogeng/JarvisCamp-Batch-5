<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center text-center h-screen">
    <main class="bg-white flex flex-col items-center justify-center shadow-md rounded-lg p-8 w-full sm:w-fit sm:max-w-3xl h-full sm:h-fit mx-auto animate-fadeIn">
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/' . $image) }}" alt="Profile Image" class="w-32 h-32 rounded-full mb-4">
            <div class="text-3xl font-bold mb-2">{{ $name }}</div>
            <div class="text-gray-600">{{ $bio }}</div>
        </div>
    </main>
</body>
</html>
