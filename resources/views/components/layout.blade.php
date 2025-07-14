<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>IT Expo</title>
</head>
<body class="min-h-screen flex flex-col bg-radial-[at_75%_25%] from-primary-900 via-primary-800 to-primary-700 to-90% text-primary-100">
    <x-navbar />
    
    <main class="container mx-auto mt-4 font-poppins flex-grow">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>