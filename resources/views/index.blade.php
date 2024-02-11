<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Punk Beer's beer</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="flex justify-end w-full px-4">
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                <a href="{{ route('logout') }}">Log out</a>
            </button>
        </div>
    </body>
</html>
