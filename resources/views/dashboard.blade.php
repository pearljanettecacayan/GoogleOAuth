<x-app-layout>
<x-slot name="header">
    <div class="bg-gradient-to-r from-purple-500 to-blue-400 p-4 rounded-lg shadow">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </div>
</x-slot>


    <div class="py-2 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <!-- Welcome Banner -->
            <div class="bg-purple-600 text-white p-6 rounded-lg font-bold text-center shadow-md">
                {{ __("Welcome to BookByte!") }}
            </div>

            <div x-data="{ 
        currentImage: 0, 
        images: ['/images/1.png', '/images/book3.png', '/images/book4.png'],
        autoSlide() {
            setInterval(() => {
                this.currentImage = (this.currentImage + 1) % this.images.length;
            }, 3000); // Change image every 3 seconds
        }
    }" 
    x-init="autoSlide()" 
    class="mt-6 relative">
    
    <!-- Carousel Images -->
    <div class="w-full h-60 overflow-hidden rounded-lg shadow-md">
        <img :src="images[currentImage]" class="w-full h-full object-cover" />
    </div>

</div>


            <!-- Search Section -->
            <div class="mt-6">
                <h2 class="text-2xl font-semibold text-center text-purple-800">
                    What book do you want to search today?
                </h2>
                <div class="mt-4 flex justify-center">
                    <input 
                        type="text" 
                        placeholder="Search by title..." 
                        class="w-2/3 sm:w-1/2 p-3 rounded-full border border-purple-900 shadow focus:outline-none focus:ring-2 focus:ring-purple-400"
                    >
                </div>
            </div>

            <!-- Genres Section -->
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800">Book Genres</h3>
                <div class="flex flex-wrap mt-4 justify-center gap-4">
                    @foreach (['Fiction', 'Education', 'Fantasy', 'Adventure', 'Thriller'] as $genre)
                        <button 
                            class="px-4 py-2 rounded-lg bg-gradient-to-r from-purple-500 to-blue-400 text-white font-medium shadow hover:scale-105 transform transition-transform">
                            {{ $genre }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Books Section -->
            <div class="mt-6">
    <h3 class="text-xl font-semibold text-gray-800">Search Results</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
        @foreach ([
            ['title' => 'Computers Made Easy', 'author' => 'Jim Bernstein', 'image' => asset('images/img2.png')],
            ['title' => 'Escape Velocity', 'author' => 'Doc Norton', 'image' => asset('images/img3.png')],
            ['title' => 'Computers Made Easy', 'author' => 'Jim Bernstein', 'image' => asset('images/img4.png')],
            ['title' => 'Make Moves or Make Excuses', 'author' => 'Damian Prosalendis', 'image' => asset('images/img5.png')],
        ] as $book)
            <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full">
                <img src="{{ $book['image'] }}" class="w-full h-64 object-cover">
                <div class="p-4 flex flex-col flex-grow">
                    <h4 class="text-lg font-semibold">{{ $book['title'] }}</h4>
                    <p class="text-gray-600 mb-4">{{ $book['author'] }}</p>
                    <div class="mt-auto flex justify-between">
                        <button class="px-4 py-2 rounded-lg bg-purple-500 text-white shadow hover:bg-purple-600">
                            Read
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

        </div>
    </div>
</x-app-layout>
