<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>H O M E</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,400;1,100;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body class="antialiased font-plex italic">
    <div class="min-h-screen bg-gradient-to-bl from-paige-50 via-paige-100 to-paige-200">
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center text-paige-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/>
                            </svg>
                            <h1 class="ml-2 leading-tight">
                                <span class="text-paige-700 text-2xl filter drop-shadow-lg  decoration-clone bg-clip-text text-transparent bg-gradient-to-tl from-paige-800 to-paige-600">
                                    Dashboard
                                </span>
                            </h1>
                            <span class="text-paige-700 flex 2xl:items-end pb-2 h-full text-sm ml-2">127.0.0.1 sweet home</span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="py-10">
            <header>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"></div>
            </header>
            <main>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="px-4 py-8 sm:px-0">
                        <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach($directories as $dir)
                                <x-site-item :dir="$dir"/>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
