<section class="container mx-auto px-4 py-16">
    <div class="flex items-center gap-3 mb-8">
        <div class="p-3 bg-blue-100 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-blue-600">
                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                <polyline points="16 7 22 7 22 13"></polyline>
            </svg>
        </div>
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Trending Now</h2>
            <p class="text-slate-500">Items that are getting a lot of attention this week</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col">
                <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="/product/{{ $product['id'] }}">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute top-3 right-3 bg-blue-600/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                        {{ $product['category'] }}
                    </div>
                    @if(isset($product['badge']))
                        <div class="absolute top-3 left-3 bg-amber-500/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                            {{ $product['badge'] }}
                        </div>
                    @endif
                </a>
                <div class="p-5 flex flex-col flex-1">
                    <a class="hover:text-blue-600 transition-colors" href="/product/{{ $product['id'] }}">
                        <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">{{ $product['name'] }}</h3>
                    </a>
                    <p class="text-slate-600 text-sm mb-4 line-clamp-2 flex-grow">{{ $product['description'] }}</p>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-bold text-blue-600">${{ number_format($product['price'], 2) }}</span>
                        <button class="inline-flex items-center justify-center text-sm font-medium h-9 bg-blue-600 hover:bg-blue-700 text-white transition-all duration-300 rounded-full px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <circle cx="8" cy="21" r="1"></circle>
                                    <circle cx="19" cy="21" r="1"></circle>
                                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                                </svg>
                            Add
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

