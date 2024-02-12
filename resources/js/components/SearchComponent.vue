<template>
    <nav class="bg-gray-200 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex justify-center w-full">
                <div class="relative w-full max-w-xs">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </span>
                    <input type="search" name="search" id="default-search" class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-700 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Beers ..." required v-model="searchQuery" @input="handleSearch" />
                </div>
            </div>
            <button @click="logout" class="absolute right-4 top-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                Log out
            </button>
        </div>
    </nav>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap -m-4 justify-center">
                <template v-if="beers && beers.length > 0">
                    <div v-for="beer in beers" :key="beer.id" class="p-4 md:w-1/2 lg:w-2/5 xl:w-1/3">
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <img v-if="beer.imageUrl" :src="beer.imageUrl" alt="Beer image" class="w-1/4 h-auto mx-auto object-scale-down pt-4">
                            <div class="p-6">
                                <h2 class="title-font text-lg font-medium">{{ beer.name }}</h2>
                                <p class="mt-1"><span class="font-bold">Tagline:</span> {{ beer.tagline }}</p>
                                <p class="mt-1"><span class="font-bold">Description:</span> {{ beer.description }}</p>
                                <p class="mt-1"><span class="font-bold">ABV:</span> {{ beer.abv }}</p>
                                <p class="mt-1"><span class="font-bold">IBU:</span> {{ beer.ibu }}</p>
                                <div class="mt-4">
                                    <span class="font-bold">Food Pairing:</span>
                                    <ul class="list-disc pl-5">
                                        <li v-for="(foodPairing, index) in beer.foodPairing" :key="index">{{ foodPairing }}</li>
                                    </ul>
                                </div>
                                <div class="mt-4">
                                    <span class="font-bold">Ingredients:</span>
                                    <ul class="list-disc pl-5">
                                        <li v-for="(ingredient, index) in beer.ingredients" :key="index">{{ ingredient }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <div class="text-center py-12">
                        <h2 class="text-3xl font-bold text-red-500 mb-4">Not Found</h2>
                        <p class="text-gray-600">Sorry, we couldn't find any beers matching that name.</p>
                    </div>
                </template>
                <template v-if="error">
                    <div class="text-center py-12">
                        <h2 class="text-3xl font-bold text-red-500 mb-4">Error</h2>
                        <p class="text-gray-600">There was an error fetching data.</p>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            searchQuery: '',
            beers: [],
            isLoading: false
        };
    },
    methods: {
        async fetchSearchResults() {
            try {
                if (this.beers) {
                    this.isLoading = true;
                    const response = await axios.get('/api/beers', {
                        params: {
                            search: this.searchQuery
                        }
                    });
                    this.beers = response.data;
                }
            } catch (error) {
                console.error('Error fetching search results:', error);
            } finally {
                this.isLoading = false;
            }
        },
        handleSearch() {
            clearTimeout(this.timer);
            this.timer = setTimeout(() => {
                this.fetchSearchResults();
            }, 300);
        },
        async logout() {
            try {
                await axios.get('/api/logout');
                window.location.pathname = "/";
            } catch (error) {
                console.error('Logout failed:', error);
            }
        }
    },
    watch: {
        searchQuery() {
            this.handleSearch();
        }
    }
};
</script>
