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
                
                    <div class="flex items-end gap-4 border-b border-slate-100 pb-6">
                        <span class="text-4xl font-bold text-blue-600"><x-currency :amount="number_format($product['price'], 2)" /></span>
                        <span class="text-slate-400 line-through mb-1.5"><x-currency :amount="number_format($product['old_price'], 2)" /></span>
                    </div>

                    <form class="space-y-8">
                        <div>
                            <h2 class="text-sm font-semibold text-slate-800">Color</h2>
                            <fieldset aria-label="Choose a color" class="mt-4">
                                <div class="flex items-center ">
                                    <label class="inline-flex items-center justify-center rounded-full border border-slate-200 p-1 cursor-pointer hover:border-blue-500 transition">
                                        <input type="radio" name="color" value="black" checked class="sr-only peer">
                                        <span class="h-8 w-8 rounded-full bg-slate-900 peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:ring-offset-2 peer-checked:ring-offset-white sm:h-10 sm:w-10"></span>
                                        <span class="sr-only">Black</span>
                                    </label>
                                    <label class="inline-flex items-center justify-center rounded-full border border-slate-200 p-1 cursor-pointer hover:border-blue-500 transition">
                                        <input type="radio" name="color" value="heather-grey" class="sr-only peer">
                                        <span class="h-8 w-8 rounded-full bg-slate-300 peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:ring-offset-2 peer-checked:ring-offset-white sm:h-10 sm:w-10"></span>
                                        <span class="sr-only">Heather Grey</span>
                                    </label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h2 class="text-sm font-semibold text-slate-800">Size</h2>
                                <a href="#" class="text-sm font-semibold text-blue-600 hover:underline">See sizing chart</a>
                            </div>
                            <fieldset aria-label="Choose a size">
                                <div class="grid grid-cols-4 sm:grid-cols-6 gap-2">
                                    @foreach (['XXS', 'XS', 'S', 'M', 'L', 'XL'] as $idx => $size)
                                        @php($disabled = $size === 'XL')
                                        <label class="relative flex items-center justify-center rounded-xl border text-sm font-semibold py-2.5 cursor-pointer sm:text-base sm:py-3.5 {{ $disabled ? 'opacity-50 cursor-not-allowed bg-slate-100 border-slate-200' : 'border-slate-200 hover:border-blue-500 hover:text-blue-700' }}">
                                            <input type="radio" name="size" value="{{ strtolower($size) }}" {{ $size === 'S' ? 'checked' : '' }} {{ $disabled ? 'disabled' : '' }} class="sr-only peer">
                                            <span class="peer-checked:text-blue-700 peer-checked:border-blue-500">{{ $size }}</span>
                                            <span class="absolute inset-0 rounded-xl ring-2 ring-blue-500 ring-offset-2 ring-offset-white opacity-0 peer-checked:opacity-100 pointer-events-none transition"></span>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>

                        <div class="flex   gap-2 ">
                            <div class="flex w-full items-center justify-between border border-slate-200 rounded-full w-max">
                                <button type="button" wire:click="decrement" class="p-2 hover:text-blue-600 transition-colors sm:p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus w-4 h-4">
                                        <path d="M5 12h14"></path>
                                    </svg>
                                </button>
                                <span class="w-12 text-center font-bold">{{ $quantity }}</span>
                                <button type="button" wire:click="increment" class="p-2 hover:text-blue-600 transition-colors sm:p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                </button>
                            </div>
                            <x-button type="submit" size="lg" variant="solid" class=" rounded-full px-6  sm:flex-1 sm:px-8">
                                Add to cart
                            </x-button>
                        </div>

                    </form>

                    <div class="space-y-10">
                        <div class="space-y-3">
                            <h2 class="text-lg font-semibold text-slate-900">Description</h2>
                            <div class="space-y-3 text-slate-700 leading-relaxed">
                                <p>The Basic tee is an honest new take on a classic. The tee uses super soft, pre-shrunk cotton for true comfort and a dependable fit. They are hand cut and sewn locally, with a special dye technique that gives each tee it's own look.</p>
                                <p>Looking to stock your closet? The Basic tee also comes in a 3-pack or 5-pack at a bundle discount.</p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <h2 class="text-lg font-semibold text-slate-900">Fabric &amp; Care</h2>
                            <ul class="space-y-2 text-slate-700 list-disc pl-5">
                                <li>Only the best materials</li>
                                <li>Ethically and locally made</li>
                                <li>Pre-washed and pre-shrunk</li>
                                <li>Machine wash cold with similar colors</li>
                            </ul>
                        </div>

                        <section aria-labelledby="policies-heading" class="space-y-4">
                            <h2 id="policies-heading" class="text-lg font-semibold text-slate-900">Our Policies</h2>
                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="flex gap-3 rounded-xl border border-slate-200 p-4 bg-slate-50">
                                    <div class="shrink-0 text-blue-600">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="w-6 h-6">
                                            <path d="m6.115 5.19.319 1.913A6 6 0 0 0 8.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 0 0 2.288-4.042 1.087 1.087 0 0 0-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 0 1-.98-.314l-.295-.295a1.125 1.125 0 0 1 0-1.591l.13-.132a1.125 1.125 0 0 1 1.3-.21l.603.302a.809.809 0 0 0 1.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 0 0 1.528-1.732l.146-.292M6.115 5.19A9 9 0 1 0 17.18 4.64M6.115 5.19A8.965 8.965 0 0 1 12 3c1.929 0 3.716.607 5.18 1.64" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-semibold text-slate-900">International delivery</dt>
                                        <dd class="text-sm text-slate-600">Get your order in 2 years</dd>
                                    </div>
                                </div>
                                <div class="flex gap-3 rounded-xl border border-slate-200 p-4 bg-slate-50">
                                    <div class="shrink-0 text-blue-600">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="w-6 h-6">
                                            <path d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-semibold text-slate-900">Loyalty rewards</dt>
                                        <dd class="text-sm text-slate-600">Don't look at other tees</dd>
                                    </div>
                                </div>
                            </dl>
                        </section>
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
                                <span class="text-xl font-bold text-blue-600"><x-currency :amount="number_format($related['price'], 2)" /></span>
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
