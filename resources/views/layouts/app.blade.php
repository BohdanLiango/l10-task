<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{--<!-- Include Tailwind CSS -->--}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-8">

    @if(session()->has('success'))
        {{--<!-- Flash Message (Success) -->--}}
        <div class="bg-green-200 border-l-4 border-green-600 text-green-800 px-4 py-3 mb-4 rounded" role="alert">
            <p class="font-bold">Success:</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @yield('content')

</div>
</body>
</html>
