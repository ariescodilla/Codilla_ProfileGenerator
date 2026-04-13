<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Generator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-purple-600 via-blue-500 to-indigo-600 min-h-screen text-white">

    <div class="max-w-5xl mx-auto p-6">
        {{ $slot }}
    </div>

</body>
</html>