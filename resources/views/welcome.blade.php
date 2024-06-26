<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My ToDos</title>

        <!-- TAilwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Icons -->
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <style>
            .bg{
                position: absolute;
                height: 100%;
                width: 100%;
                background: url("/assets/img/bg1.jpg") no-repeat;
                background-size: cover;
                filter: blur(5px);
                z-index: -1;
            }
        </style>

    </head>
    <body class="antialiased">
        <div class="bg"></div>
        <div id="app">
            <todo />
        </div>
    </body>
</html>
