<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Discord Advertisment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    <meta name="csrf_token" value="{{ csrf_token() }}"/>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        input:checked~.dot {
            transform: translateX(100%);
            background-color: #48bb78;
        }

        /* Toggle B */
        input:checked~.dot {
            transform: translateX(100%);
            background-color: #48bb78;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #3D3E45;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #6773E5;
            border-radius: 25px;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            color: rgb(229 231 235);
            right: 0;
            position: absolute;
            display: flex;
            padding-right: 0.75rem
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
        content: [
            "./resources/**/*.blade.php",
            "./resources/**/*.js",
            "./resources/**/*.vue",
            "./node_modules/flowbite/**/*.js",
        ], 
        theme: {
            extend: {
            colors: {
                // Dashboard Main Background
                'dmb': '#25272C',
                // Dashboard Secondaire Background
                'dsb': '#303138',
                // Dashboard Border
                'db': '#3D3E45',
                // Dashboard Border
                'accent': '#6773E5',
                // Dashboard input
                'input': '#3D3E45',

            }
            },
        },
        plugins: [],
    }
    </script>
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles

</head>

<body class="h-screen w-full bg-dmb font-sans overflow-x-hidden custom-scrollbar">
    <div class="w-[1240px] min-h-screen mx-auto pb-40">
        @include('layouts.nav')
        @yield('content')
    </div>
        @include('layouts.footer')
    @livewireScripts
</body>


</html>