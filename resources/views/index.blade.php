<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Punk Beer's beer</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="flex justify-between items-center bg-gray-200 p-4">
        <div class="w-full max-w-md mx-auto">
            <form method="POST" action="{{ route('search') }}">
                @csrf
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search" class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Search Beers ..." required>
                    <button type="submit" class="absolute inset-y-0 right-0 px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg">Search</button>
                </div>
            </form>
        </div>
        <div>
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                <a href="{{ route('logout') }}">Log out</a>
            </button>
        </div>
    </nav>
    <div class="flex justify-center items-center">
        <div class="beer-container">
            <div class="search-results flex justify-center">
                @if(isset($beers))
                    @if(empty($beers))
                        <div class="flex justify-center items-center mt-20">
                            <div class="bg-white rounded-lg shadow-md p-8 w-1/2 text-center">
                                <h2 class="text-3xl font-bold text-red-500 mb-4">Not Found</h2>
                                <p class="text-gray-600">Sorry, we couldn't find any beers matching that name.</p>
                            </div>
                        </div>
                    @else
                        @foreach ($beers as $beer)
                            <div class="bg-white rounded-lg shadow-md p-6 mb-4 w-1/3 mx-4" >
                                @isset($beer['imageUrl'])
                                    <img src="{{ $beer['imageUrl'] }}" alt="Beer Image" class="mb-4 w-full md:w-1/6 mx-auto">
                                @endisset
                                <h2 class="text-xl font-semibold mb-2">{{ $beer['name'] }}</h2>
                                <p class="text-gray-600 mb-2"><span class="font-bold">Tagline:</span> {{ $beer['tagline'] }}</p>
                                <p class="text-gray-700 mb-2"><span class="font-bold">Description:</span> {{ $beer['description'] }}</p>
                                <p class="text-gray-700 mb-2"><span class="font-bold">ABV:</span> {{ $beer['abv'] }}</p>
                                <p class="text-gray-700 mb-2"><span class="font-bold">IBU:</span> {{ $beer['ibu'] }}</p>
                                <p class="text-gray-700 mb-2"><span class="font-bold">Food Pairing</span></p>
                                <ul>
                                    @foreach ($beer['foodPairing'] as $foodPairing)
                                        <li><p>{{ $foodPairing }}</p></li>
                                    @endforeach
                                </ul>
                                <p class="text-gray-700 mb-2"><span class="font-bold">Ingredients</span></p>
                                @foreach ($beer['ingredients'] as $ingredient)
                                    <p>{{ $ingredient }}</p>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                @endif
                @if(isset($error))
                    <div class="flex justify-center items-center mt-20">
                        <div class="bg-white rounded-lg shadow-md p-8 w-1/2 text-center">
                            <h2 class="text-3xl font-bold text-red-500 mb-4">Error</h2>
                            <p class="text-gray-600">There was an error fetching data ..</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
