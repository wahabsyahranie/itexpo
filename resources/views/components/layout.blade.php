<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>IT Expo</title>
</head>
<body>
    <x-navbar />
    
    <main class="container mx-auto mt-4">
        {{ $slot }}
    </main>

</body>
</html>