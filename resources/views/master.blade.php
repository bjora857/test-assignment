<!doctype html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
{{--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">--}}
    <link media="all" type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<div id="app">
    <div class="links border-b-2 border-grey border-solid py-4 w-full">
        <a href="/view1">Create Employee</a>
        <a href="/view2">Company</a>
        <a href="/view3">Unemployed</a>
    </div>
    <div class="container mx-auto px-8 mt-8">
        @yield('content')
    </div>
</div>

<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
