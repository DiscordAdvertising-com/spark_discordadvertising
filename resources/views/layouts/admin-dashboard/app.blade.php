<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }


        .custom-scrollbar::-webkit-scrollbar {
            width: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #3D3E45;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #FA4C6B;
            border-radius: 25px;
        }
        
    </style>

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
                        'mb': '#25272C',
                        // Dashboard Secondaire Background
                        'sb': '#303138',
                        // Dashboard Border
                        'b': '#3D3E45',
                        'br': '#3D3E45',
                        // Dashboard Border
                        'accent': '#FA4C6B',

                    },
                    screens: {

                        '3xl': '2100px',
                    },
                },
            },
            plugins: [],
        }

    </script>

    @livewireStyles

</head>

<body class="md:h-screen w-full bg-mb font-sans">

    @yield('content')
    
</body>

@livewireScripts

</html>