<div class="min-h-screen bg-slate-50 py-12">
    <div class="container mx-auto px-4">
        <nav class="flex text-sm text-slate-500 mb-8">
            <a class="hover:text-blue-600" href="/">Home</a>
            <span class="mx-2">/</span>
            <a class="hover:text-blue-600" href="/shop">Shop</a>
            <span class="mx-2">/</span>
            <span class="text-slate-900 font-medium">{{ $product['name'] }}</span>
        </nav>

        <div class="grid lg:grid-cols-2 gap-12 mb-16">
            <div class="space-y-4">
                <div class="relative aspect-square bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm">
                    <img id="pd-main-image" src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover transition duration-300">
                    <button type="button" class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-slate-700 rounded-full h-10 w-10 shadow" data-slider-prev>
                        ‹
                    </button>
                    <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-slate-700 rounded-full h-10 w-10 shadow" data-slider-next>
                        ›
                    </button>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($product['thumbnails'] as $idx => $thumb)
                        <button class="aspect-square rounded-xl overflow-hidden border-2 transition-colors {{ $idx === 0 ? 'border-blue-600' : 'border-transparent' }}" data-thumb data-index="{{ $idx }}">
                            <img src="{{ $thumb }}" alt="Thumbnail" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="space-y-8">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2.5 py-0.5 rounded-full uppercase tracking-wide">{{ $product['category'] ?? 'Interior' }}</span>
                        @if(!empty($product['badge']))
                            <span class="bg-amber-100 text-amber-700 text-xs font-bold px-2.5 py-0.5 rounded-full uppercase tracking-wide">{{ $product['badge'] }}</span>
                        @endif
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-3">{{ $product['name'] }}</h1>
                    <div class="flex items-center gap-4">
                        <div class="flex text-yellow-400 text-sm">
                            @php
                                $filled = floor($product['rating']);
                                $max = 5;
                            @endphp
                            @for ($i = 0; $i < $max; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star w-4 h-4 {{ $i < $filled ? 'fill-current' : 'text-slate-300' }}">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                            @endfor
                        </div>
                        <span class="text-slate-500 text-sm">{{ $product['reviews'] }} Reviews</span>
                    </div>
                </div>

                <div class="flex items-end gap-4 border-b border-slate-100 pb-8">
                    <span class="text-4xl font-bold text-blue-600">${{ number_format($product['price'], 2) }}</span>
                    <span class="text-slate-400 line-through mb-1.5">${{ number_format($product['old_price'], 2) }}</span>
                </div>

                <div class="prose prose-slate text-slate-600">
                    <p>{{ $product['description'] }}</p>
                    <ul class="space-y-2 list-none pl-0 mt-4">
                        @foreach ($product['features'] as $feature)
                            <li class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-5 h-5 text-green-500">
                                    <path d="M20 6 9 17l-5-5"></path>
                                </svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <div class="flex items-center border border-slate-200 rounded-full w-max">
                        <button wire:click="decrement" class="p-3 hover:text-blue-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus w-4 h-4">
                                <path d="M5 12h14"></path>
                            </svg>
                        </button>
                        <span class="w-12 text-center font-bold">{{ $quantity }}</span>
                        <button wire:click="increment" class="p-3 hover:text-blue-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                        </button>
                    </div>
                    <button class="inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-primary-foreground h-11 px-8 flex-1 rounded-full bg-blue-600 hover:bg-blue-700 text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart w-5 h-5 mr-2">
                            <circle cx="8" cy="21" r="1"></circle>
                            <circle cx="19" cy="21" r="1"></circle>
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                        </svg>
                        Add to Cart
                    </button>
                    <button class="inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 px-5 rounded-full border border-slate-200 text-slate-700 hover:border-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                            <path d="M19 14c0 4-7 8-7 8s-7-4-7-8a7 7 0 1 1 14 0Z"></path>
                        </svg>
                        Add to Wishlist
                    </button>
                </div>

                <div class="grid grid-cols-3 gap-4 pt-4">
                    <div class="flex flex-col items-center text-center gap-2">
                        <div class="p-3 bg-slate-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck w-6 h-6 text-slate-600">
                                <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                                <path d="M15 18H9"></path>
                                <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                                <circle cx="17" cy="18" r="2"></circle>
                                <circle cx="7" cy="18" r="2"></circle>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-slate-600">Free Shipping</span>
                    </div>
                    <div class="flex flex-col items-center text-center gap-2">
                        <div class="p-3 bg-slate-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check w-6 h-6 text-slate-600">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-slate-600">1 Year Warranty</span>
                    </div>
                    <div class="flex flex-col items-center text-center gap-2">
                        <div class="p-3 bg-slate-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-ccw w-6 h-6 text-slate-600">
                                <path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                <path d="M3 3v5h5"></path>
                                <path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"></path>
                                <path d="M16 16h5v5"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-slate-600">30 Day Returns</span>
                    </div>
                </div>

                <!-- Tabs for description/reviews -->
                <div class="pt-8">
                    <div class="flex gap-6 border-b border-slate-200">
                        <button class="py-3 text-sm font-semibold text-slate-900 border-b-2 border-blue-600" data-tab-button="description">Description</button>
                        <button class="py-3 text-sm font-semibold text-slate-500 hover:text-slate-800" data-tab-button="reviews">Reviews</button>
                    </div>
                    <div class="pt-6">
                        <div data-tab-panel="description">
                            <p class="text-slate-700 leading-relaxed">Heavy-duty protection for your vehicle floor. Deep channels trap water, mud, and debris. Custom fit for most sedans and SUVs.</p>
                            <ul class="mt-4 space-y-2 text-slate-600">
                                @foreach ($product['features'] as $feature)
                                    <li class="flex gap-2 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500">
                                            <path d="M20 6 9 17l-5-5"></path>
                                        </svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div data-tab-panel="reviews" class="hidden">
                            @php
                                $reviews = [
                                    ['name' => 'Alex M.', 'rating' => 5, 'text' => 'Fits my SUV perfectly, great quality.'],
                                    ['name' => 'Sarah K.', 'rating' => 4, 'text' => 'Fast shipping and solid build.'],
                                ];
                            @endphp
                            <div class="space-y-4">
                                @foreach ($reviews as $review)
                                    <div class="border border-slate-100 rounded-xl p-4">
                                        <div class="flex items-center justify-between">
                                            <div class="font-semibold text-slate-900">{{ $review['name'] }}</div>
                                            <div class="flex text-yellow-400">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="{{ $i < $review['rating'] ? '' : 'text-slate-300' }}"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="text-slate-700 mt-2">{{ $review['text'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-200 pt-16">
            <h2 class="text-2xl font-bold text-slate-900 mb-8">You Might Also Like</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ([
                    [
                        'name' => 'Premium Leather Seat Covers',
                        'price' => 189.99,
                        'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=800&q=80',
                        'category' => 'Interior',
                        'badge' => 'Best Seller'
                    ],
                    [
                        'name' => 'Ergonomic Steering Wheel Cover',
                        'price' => 19.99,
                        'image' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=800&q=80',
                        'category' => 'Interior',
                        'badge' => null
                    ],
                    [
                        'name' => 'MagSafe Dashboard Mount',
                        'price' => 29.99,
                        'image' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=800&q=80',
                        'category' => 'Electronics',
                        'badge' => 'Best Seller'
                    ],
                    [
                        'name' => 'Smart Trunk Organizer',
                        'price' => 34.99,
                        'image' => 'https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?w=800&q=80',
                        'category' => 'Storage',
                        'badge' => null
                    ],
                ] as $related)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col">
                        <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="/shop/1">
                            <img src="{{ $related['image'] }}" alt="{{ $related['name'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute top-3 right-3 bg-blue-600/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">{{ $related['category'] }}</div>
                            @if(!empty($related['badge']))
                                <div class="absolute top-3 left-3 bg-amber-500/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">{{ $related['badge'] }}</div>
                            @endif
                        </a>
                        <div class="p-5 flex flex-col flex-1">
                            <a class="hover:text-blue-600 transition-colors" href="/shop/1">
                                <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">{{ $related['name'] }}</h3>
                            </a>
                            <p class="text-slate-600 text-sm mb-4 line-clamp-2 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <div class="flex items-center justify-between mt-auto">
                                <span class="text-xl font-bold text-blue-600">${{ number_format($related['price'], 2) }}</span>
                                <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-primary-foreground h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart w-4 h-4 mr-2">
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
        </div>
    </div>
</div>

@push('scripts')
<script>
(function initProductDetail() {
    const run = () => {
        const mainImage = document.getElementById('pd-main-image');
        if (!mainImage || mainImage.dataset.initialized === 'true') return;
        mainImage.dataset.initialized = 'true';

        // Slider
        const thumbs = Array.from(document.querySelectorAll('[data-thumb]'));
        let current = 0;
        const show = (idx) => {
            if (!thumbs.length) return;
            current = (idx + thumbs.length) % thumbs.length;
            const img = thumbs[current].querySelector('img').src;
            mainImage.src = img;
            thumbs.forEach((t,i) => t.classList.toggle('border-blue-600', i === current));
            thumbs.forEach((t,i) => t.classList.toggle('border-transparent', i !== current));
        };
        thumbs.forEach((btn, idx) => btn.addEventListener('click', () => show(idx)));
        document.querySelector('[data-slider-prev]')?.addEventListener('click', () => show(current - 1));
        document.querySelector('[data-slider-next]')?.addEventListener('click', () => show(current + 1));

        // Tabs
        const tabButtons = document.querySelectorAll('[data-tab-button]');
        const tabPanels = document.querySelectorAll('[data-tab-panel]');
        tabButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const target = btn.getAttribute('data-tab-button');
                tabButtons.forEach(b => b.classList.toggle('text-slate-900 border-b-2 border-blue-600', b === btn));
                tabButtons.forEach(b => b.classList.toggle('text-slate-500', b !== btn));
                tabPanels.forEach(panel => {
                    panel.classList.toggle('hidden', panel.getAttribute('data-tab-panel') !== target);
                });
            });
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', run);
    } else {
        run();
    }

    window.addEventListener('livewire:navigated', run);
})();
</script>
@endpush
