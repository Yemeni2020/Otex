<x-layouts.app>
    <main class="bg-slate-50 min-h-screen">
        <section class="bg-slate-900 text-white py-14">
            <div class="container mx-auto px-4">
                <h1 class="text-3xl md:text-4xl font-bold mb-2">Products</h1>
                <p class="text-slate-200">A quick demo catalog of our best automotive essentials.</p>
            </div>
        </section>

        <section class="container mx-auto px-4 py-12 space-y-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <div>
                    <p class="text-sm uppercase tracking-[0.2em] text-blue-600 font-semibold">Demo collection</p>
                    <h2 class="text-2xl font-bold text-slate-900">Featured products</h2>
                </div>
                <div class="flex items-center gap-3 text-sm text-slate-500">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100">Interior</span>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100">Exterior</span>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100">Electronics</span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([
                    [
                        'id' => 1,
                        'name' => 'Premium Leather Seat Covers',
                        'price' => 189.99,
                        'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=800&q=80',
                        'category' => 'Interior',
                        'badge' => 'Best Seller',
                    ],
                    [
                        'id' => 2,
                        'name' => 'All-Weather Floor Mats Pro',
                        'price' => 49.99,
                        'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?w=800&q=80',
                        'category' => 'Interior',
                        'badge' => 'Top Rated',
                    ],
                    [
                        'id' => 3,
                        'name' => 'MagSafe Dashboard Mount',
                        'price' => 29.99,
                        'image' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=800&q=80',
                        'category' => 'Electronics',
                        'badge' => 'New',
                    ],
                    [
                        'id' => 4,
                        'name' => 'Smart Trunk Organizer',
                        'price' => 34.99,
                        'image' => 'https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?w=800&q=80',
                        'category' => 'Storage',
                        'badge' => null,
                    ],
                    [
                        'id' => 5,
                        'name' => 'Ceramic Coating Spray',
                        'price' => 24.99,
                        'image' => 'https://images.unsplash.com/photo-1601362840469-51e4d8d58785?w=800&q=80',
                        'category' => 'Car Care',
                        'badge' => null,
                    ],
                    [
                        'id' => 6,
                        'name' => 'Digital Tire Pressure Gauge',
                        'price' => 15.99,
                        'image' => 'https://images.unsplash.com/photo-1595167440058-20412e87c53d?w=800&q=80',
                        'category' => 'Tools',
                        'badge' => null,
                    ],
                ] as $product)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition hover:shadow-2xl h-full flex flex-col">
                        <a class="block relative overflow-hidden h-60 bg-slate-100 group" href="/shop/{{ $product['id'] }}">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute top-3 right-3 bg-blue-600/90 backdrop-blur text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">{{ $product['category'] }}</div>
                            @if(!empty($product['badge']))
                                <div class="absolute top-3 left-3 bg-amber-500/90 backdrop-blur text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">{{ $product['badge'] }}</div>
                            @endif
                        </a>
                        <div class="p-5 flex flex-col flex-1">
                            <a class="hover:text-blue-600 transition-colors" href="/shop/{{ $product['id'] }}">
                                <h3 class="text-lg font-bold text-slate-900 mb-2 line-clamp-1">{{ $product['name'] }}</h3>
                            </a>
                            <p class="text-slate-600 text-sm mb-4 line-clamp-2 flex-grow">High quality, ready to ship, and perfect for your next upgrade.</p>
                            <div class="flex items-center justify-between mt-auto">
                                <span class="text-xl font-bold text-blue-600">${{ number_format($product['price'], 2) }}</span>
                                <a href="/shop/{{ $product['id'] }}" class="inline-flex items-center justify-center text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-full px-4 py-2 transition">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</x-layouts.app>
