<section class="container mx-auto px-4 py-16" data-infinite-scroll>
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
        @foreach($this->visibleProducts as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col relative group" wire:key="trending-{{ $product['id'] }}">
                <div class="absolute inset-0 z-20 flex items-center justify-center gap-2 opacity-0 pointer-events-none transition-opacity duration-300 group-hover:opacity-100">
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Add to wishlist" data-wishlist="{{ $product['id'] }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Quick preview" data-preview="{{ $product['id'] }}" onclick="const dialog = document.getElementById('home-product-preview'); if (dialog) { dialog.showModal ? dialog.showModal() : dialog.setAttribute('open', 'open'); }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
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
                        <span class="text-xl font-bold text-blue-600"><x-currency :amount="number_format($product['price'], 2)" /></span>
                        <x-button type="button" size="sm" variant="solid" class="rounded-full px-4" data-add-to-cart>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2" data-cart-icon>
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden w-4 h-4 mr-2 text-emerald-500" data-check-icon>
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Add
                        </x-button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if($this->hasMore)
        <div data-infinite-scroll-sentinel class="flex items-center justify-center gap-2 py-6 text-sm text-slate-500">
            <span class="h-4 w-4 animate-spin rounded-full border-2 border-slate-300 border-t-blue-500"></span>
            <span>Loading more...</span>
        </div>
    @endif
</section>
