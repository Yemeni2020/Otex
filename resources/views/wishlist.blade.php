<x-layouts.app>
    <main class="flex-grow bg-slate-50">
        <section class="bg-slate-900 text-white py-16">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-2">Wishlist</h1>
                <p class="text-slate-300">Save your favorites for later.</p>
            </div>
        </section>

        <section class="container mx-auto px-4 py-12">
            <x-cards cols="3">
                @foreach ([
                    ['name' => 'Premium Leather Seat Covers', 'price' => 189.99, 'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=800&q=80', 'category' => 'Interior'],
                    ['name' => 'RGB Ambient Lighting Kit', 'price' => 39.99, 'image' => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=800&q=80', 'category' => 'Electronics'],
                    ['name' => 'Smart Trunk Organizer', 'price' => 34.99, 'image' => 'https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?w=800&q=80', 'category' => 'Storage'],
                ] as $product)
                    <x-card class="overflow-hidden flex flex-col">
                        <div class="relative h-48 bg-slate-100">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover">
                            <span class="absolute top-3 right-3 bg-blue-600/90 text-white text-xs px-3 py-1 rounded-full">{{ $product['category'] }}</span>
                        </div>
                        <div class="p-4 flex flex-col flex-1">
                            <h3 class="font-semibold text-slate-900 mb-1">{{ $product['name'] }}</h3>
                            <p class="text-blue-600 font-bold mb-4"><x-currency :amount="number_format($product['price'], 2)" /></p>
                            <div class="mt-auto flex gap-2">
                                <x-button type="button" size="sm" variant="solid" class="flex-1 rounded-full">Add to Cart</x-button>
                                <x-button type="button" size="sm" variant="outline" class="rounded-full">Remove</x-button>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </x-cards>
        </section>
    </main>
</x-layouts.app>
