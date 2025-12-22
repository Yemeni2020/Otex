{{-- @extends('layouts.app')

@section('content')
    <livewire:best-sellers />
@endsection --}}

{{-- <div class="space-y-16"> --}}
    <!-- New Arrivals Section -->


    <!-- Best Sellers Section -->
    {{-- <livewire:best-sellers /> --}}
{{-- </div> --}}



{{-- <livewire:new-arrivals />
<livewire:best-sellers />

<script>
    window.addEventListener('notify', event => {
        alert(event.detail.message);
    });
</script> --}}



<div>
    @include('partials.hero')

    <section class="bg-gray-50 py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold text-blue-600">Categories</p>
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">Shop by Category</h2>
                    <p class="mt-1 text-sm text-slate-500">Browse curated collections that fit how you work and live.</p>
                </div>
                <a href="#" class="hidden text-sm font-semibold text-blue-600 hover:text-blue-500 sm:inline-flex sm:items-center sm:gap-1">
                    Browse all categories
                    <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                @foreach($categories as $category)
                    <a href="{{ $category['href'] }}" class="group relative block overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg" aria-label="Browse {{ $category['label'] }}">
                        <div class="relative aspect-[4/5]">
                            <img src="{{ $category['image'] }}" alt="{{ $category['label'] }} collection" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t {{ $category['accent'] }} to-transparent"></div>
                            <div class="absolute inset-x-4 bottom-4 flex items-center justify-between">
                                <span class="text-lg font-semibold text-white drop-shadow-sm">{{ $category['label'] }}</span>
                                <span class="inline-flex size-9 items-center justify-center rounded-full border border-white/30 bg-white/20 text-white backdrop-blur transition group-hover:translate-x-1">
                                    →
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8 text-center sm:hidden">
                <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-500">
                    Browse all categories
                    <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>

    <livewire:new-arrivals />
    <livewire:best-sellers />
    
    <livewire:trending-now />

    <section class="container mx-auto px-4 py-16">
        <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-12">
            <div>
                <h2 id="trending-heading" class="text-3xl font-bold text-slate-900 mb-2">Trending products</h2>
                <p class="text-slate-500">Fresh picks customers are loving this week.</p>
            </div>
            <a href="#" class="text-blue-600 font-medium hover:text-blue-700 flex items-center gap-1 group transition-colors">
                See everything
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <li class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col relative group">
                <div class="absolute inset-0 z-20 flex items-center justify-center gap-2 opacity-0 pointer-events-none transition-opacity duration-300 group-hover:opacity-100">
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Add to wishlist" data-wishlist="1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Quick preview" data-preview="1" onclick="const dialog = document.getElementById('home-product-preview'); if (dialog) { dialog.showModal ? dialog.showModal() : dialog.setAttribute('open', 'open'); }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="#">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/home-page-02-product-01.jpg" alt="Black machined steel pen with hexagonal grip and small white logo at top." class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </a>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-slate-500 text-sm">Black</p>
                    <a class="hover:text-blue-600 transition-colors" href="#">
                        <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">Machined Pen</h3>
                    </a>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-bold text-blue-600"><x-currency amount="35" /></span>
                        <button class="inline-flex items-center justify-center text-sm font-medium h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                            </svg>
                            Add
                        </button>
                    </div>
                    <h4 class="sr-only">Available colors</h4>
                    <ul role="list" class="mt-4 flex items-center gap-2">
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #111827">
                            <span class="sr-only">Black</span>
                        </li>
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #fde68a">
                            <span class="sr-only">Brass</span>
                        </li>
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #e5e7eb">
                            <span class="sr-only">Chrome</span>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col relative group">
                <div class="absolute inset-0 z-20 flex items-center justify-center gap-2 opacity-0 pointer-events-none transition-opacity duration-300 group-hover:opacity-100">
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Add to wishlist" data-wishlist="2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Quick preview" data-preview="2" onclick="const dialog = document.getElementById('home-product-preview'); if (dialog) { dialog.showModal ? dialog.showModal() : dialog.setAttribute('open', 'open'); }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="#">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/home-page-02-product-02.jpg" alt="Black porcelain mug with modern square handle and natural clay accents on rim and bottom." class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </a>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-slate-500 text-sm">Matte Black</p>
                    <a class="hover:text-blue-600 transition-colors" href="#">
                        <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">Earthen Mug</h3>
                    </a>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-bold text-blue-600"><x-currency amount="28" /></span>
                        <button class="inline-flex items-center justify-center text-sm font-medium h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                            </svg>
                            Add
                        </button>
                    </div>
                    <h4 class="sr-only">Available colors</h4>
                    <ul role="list" class="mt-4 flex items-center gap-2">
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #4b5563">
                            <span class="sr-only">Matte Black</span>
                        </li>
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #fef3c7">
                            <span class="sr-only">Natural</span>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col relative group">
                <div class="absolute inset-0 z-20 flex items-center justify-center gap-2 opacity-0 pointer-events-none transition-opacity duration-300 group-hover:opacity-100">
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Add to wishlist" data-wishlist="3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Quick preview" data-preview="3" onclick="const dialog = document.getElementById('home-product-preview'); if (dialog) { dialog.showModal ? dialog.showModal() : dialog.setAttribute('open', 'open'); }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="#">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/home-page-02-product-03.jpg" alt="Natural leather journal with brass disc binding and three paper refill sets." class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </a>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-slate-500 text-sm">Natural</p>
                    <a class="hover:text-blue-600 transition-colors" href="#">
                        <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">Leatherbound Daily Journal Set</h3>
                    </a>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-bold text-blue-600"><x-currency amount="50" /></span>
                        <button class="inline-flex items-center justify-center text-sm font-medium h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                            </svg>
                            Add
                        </button>
                    </div>
                    <h4 class="sr-only">Available colors</h4>
                    <ul role="list" class="mt-4 flex items-center gap-2">
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #fef3c7">
                            <span class="sr-only">Natural</span>
                        </li>
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #1f2937">
                            <span class="sr-only">Black</span>
                        </li>
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #7c2d12">
                            <span class="sr-only">Brown</span>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col relative group">
                <div class="absolute inset-0 z-20 flex items-center justify-center gap-2 opacity-0 pointer-events-none transition-opacity duration-300 group-hover:opacity-100">
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Add to wishlist" data-wishlist="4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>
                    <button type="button" class="pointer-events-auto p-2 rounded-full bg-white/90 backdrop-blur border border-slate-200 text-slate-700 shadow hover:bg-white" aria-label="Quick preview" data-preview="4" onclick="const dialog = document.getElementById('home-product-preview'); if (dialog) { dialog.showModal ? dialog.showModal() : dialog.setAttribute('open', 'open'); }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="#">
                    <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/home-page-02-product-04.jpg" alt="Black leather journal with brass disc binding." class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </a>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-slate-500 text-sm">Black</p>
                    <a class="hover:text-blue-600 transition-colors" href="#">
                        <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">Leatherbound Daily Journal</h3>
                    </a>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-bold text-blue-600"><x-currency amount="50" /></span>
                        <button class="inline-flex items-center justify-center text-sm font-medium h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                            </svg>
                            Add
                        </button>
                    </div>
                    <h4 class="sr-only">Available colors</h4>
                    <ul role="list" class="mt-4 flex items-center gap-2">
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #111827">
                            <span class="sr-only">Black</span>
                        </li>
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #7c2d12">
                            <span class="sr-only">Brown</span>
                        </li>
                        <li class="h-4 w-4 rounded-full ring-1 ring-slate-300" style="background-color: #fef3c7">
                            <span class="sr-only">Natural</span>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </section>

    <dialog id="home-product-preview" class="fixed inset-0 z-50 m-0 h-full w-full overflow-y-auto bg-transparent p-4 backdrop:bg-black/60 backdrop:backdrop-blur-sm">
        <div class="flex min-h-full items-center justify-center">
            <div class="relative w-full max-w-4xl overflow-hidden rounded-3xl bg-white shadow-2xl">
                <button type="button" class="absolute right-4 top-4 inline-flex size-10 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-500 transition hover:bg-slate-50 hover:text-slate-700" onclick="const dialog = document.getElementById('home-product-preview'); if (dialog) { dialog.close ? dialog.close() : dialog.removeAttribute('open'); }">
                    <span class="sr-only">Close</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-5">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>

                <div class="grid gap-8 p-6 md:p-8 lg:grid-cols-[1fr,1.1fr]">
                    <div class="space-y-4">
                        <div class="overflow-hidden rounded-2xl bg-slate-100">
                            <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800&q=80" alt="Backseat Tablet Organizer" class="h-full w-full object-cover">
                        </div>
                        <div class="flex flex-wrap gap-2 text-xs font-semibold uppercase tracking-wide text-slate-500">
                            <span class="rounded-full bg-amber-100 px-3 py-1 text-amber-700">Best Seller</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-slate-600">Category: Storage</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-slate-600">Color: Black</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-slate-600">Size: Standard</span>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="space-y-2">
                            <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">Backseat Tablet Organizer</h2>
                            <p class="text-xl font-semibold text-blue-600">$29.99</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="flex items-center text-amber-400">
                                <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-4"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-4"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-4"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-4"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-4 text-slate-200"><path d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-sm text-slate-500">3.9 out of 5</span>
                            <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-500">See all reviews</a>
                        </div>

                        <p class="text-slate-600">Perfect for road trips with kids. Holds tablets up to 11 inches, drinks, snacks, and toys. Durable waterproof fabric.</p>

                        <div class="flex flex-wrap gap-3">
                            <button type="button" class="inline-flex h-12 items-center justify-center rounded-full bg-blue-600 px-6 text-sm font-semibold text-white shadow-lg shadow-blue-600/30 transition hover:bg-blue-500">Add to bag</button>
                            <a href="/shop/8" class="inline-flex h-12 items-center justify-center rounded-full border border-slate-200 px-6 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">View full details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
</div>
