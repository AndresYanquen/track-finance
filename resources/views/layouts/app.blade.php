<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Categories</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS CDN -->
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto">
        <nav class="bg-white p-4 shadow-md">
            <div class="flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">Laravel</a>
                <div class="space-x-4">
                    <a href="{{ route('categorias.index') }}" class="text-blue-600 hover:text-blue-800">Categories</a>
                </div>
            </div>
        </nav>

        @yield('content') <!-- Content for each page will go here -->
    </div>

</body>
</html>
