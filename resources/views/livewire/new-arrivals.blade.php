{{-- {{-- <div>
    <section class="container mx-auto px-4 py-16">
        <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-12">
            <div>
                <h2 class="text-3xl font-bold text-slate-900 mb-2">New Arrivals</h2>
                <p class="text-slate-500">Check out our latest premium accessories</p>
            </div>
            <a href="#" class="text-blue-600 font-medium hover:text-blue-700 flex items-center gap-1 group transition-colors">
                View All
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id=" ">
        @foreach($products as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col">
                <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="{{ $product['link'] }}">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                    <div class="absolute top-3 right-3 bg-blue-600/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                        {{ $product['category'] }}
                    </div>

                    @if($product['tag'])
                        <div class="absolute top-3 left-3 bg-amber-500/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                            {{ $product['tag'] }}
                        </div>
                    @endif
                </a>
                <div class="p-5 flex flex-col flex-1">
                    <a class="hover:text-blue-600 transition-colors" href="{{ $product['link'] }}">
                        <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">{{ $product['name'] }}</h3>
                    </a>
                    <p class="text-slate-600 text-sm mb-4 line-clamp-2 flex-grow">
                        <!-- Optional description if you add in the array -->
                    </p>
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-xl font-bold text-blue-600"><x-currency :amount="number_format($product['price'], 2)" /></span>
                        <button
                            wire:click="$dispatch('add-to-cart', {
                                id: 1,
                                name: 'Premium Leather Seat Covers',
                                price: 189.99,
                                image: 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=800&q=80'
                            })"
                            class="inline-flex items-center justify-center text-sm font-medium h-9 bg-blue-600 hover:bg-blue-700 rounded-full px-4 text-white">

                            <!-- ICON KEPT -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
</div> --}}

<!-- ========== NEW ARRIVALS ========== -->
    {{-- <section class="container mx-auto px-4 py-16">
        <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-12">
            <div>
                <h2 class="text-3xl font-bold text-slate-900 mb-2">New Arrivals</h2>
                <p class="text-slate-500">Check out our latest premium accessories</p>
            </div>
            <a href="#" class="text-blue-600 font-medium hover:text-blue-700 flex items-center gap-1 group transition-colors">
                View All
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="newArrivalsGrid">
            <!-- Products will be loaded here via JavaScript -->
        </div>
    </section>

    

    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        document.getElementById('mobileMenuButton').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        });

        // Mobile Dropdown Toggles
        document.querySelectorAll('.mobile-dropdown-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const dropdown = this.parentElement;
                dropdown.classList.toggle('active');
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                    dropdown.style.display = 'none';
                });
            }
        });

        // Sample product data
        const products = [
            {
                id: 1,
                name: "Premium Leather Seat Covers",
                description: "Transform your car interior with our premium leather seat covers. Designed for durability and maximum comfort.",
                price: 189.99,
                image: "https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=800&q=80",
                category: "Interior",
                badge: "Best Seller"
            },
            {
                id: 2,
                name: "All-Weather Floor Mats Pro",
                description: "Heavy-duty protection for your vehicle floor. Deep channels trap water, mud, and debris.",
                price: 49.99,
                image: "https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?w=800&q=80",
                category: "Interior",
                badge: "Best Seller"
            },
            {
                id: 3,
                name: "Smart Trunk Organizer",
                description: "Keep your trunk clutter-free. Collapsible design with multiple compartments.",
                price: 34.99,
                image: "https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?w=800&q=80",
                category: "Storage"
            },
            {
                id: 4,
                name: "MagSafe Dashboard Mount",
                description: "Secure magnetic phone mount with 360-degree rotation. Industrial-strength suction cup.",
                price: 29.99,
                image: "https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=800&q=80",
                category: "Electronics",
                badge: "Best Seller"
            },
            {
                id: 5,
                name: "RGB Ambient Lighting Kit",
                description: "App-controlled LED interior lights with music sync mode. Choose from 16 million colors.",
                price: 39.99,
                image: "https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=800&q=80",
                category: "Electronics"
            },
            {
                id: 6,
                name: "HEPA Car Air Purifier",
                description: "Eliminate odors, smoke, and allergens. Portable design fits in cup holder.",
                price: 59.99,
                image: "https://images.unsplash.com/photo-1556656793-08538906a9f8?w=800&q=80",
                category: "Electronics"
            },
            {
                id: 7,
                name: "Backseat Tablet Organizer",
                description: "Perfect for road trips with kids. Holds tablets up to 11 inches.",
                price: 29.99,
                image: "https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800&q=80",
                category: "Storage",
                badge: "Best Seller"
            }
        ];

        // Function to create product card
        function createProductCard(product) {
            return `
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col">
                    <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="/product/${product.id}">
                        <img src="${product.image}" alt="${product.name}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-3 right-3 bg-blue-600/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm hover:animate-ping ">
                            ${product.category}
                        </div>
                        ${product.badge ? `
                        <div class="absolute top-3 left-3 bg-amber-500/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                            ${product.badge}
                        </div>` : ''}
                    </a>
                    <div class="p-5 flex flex-col flex-1">
                        <a class="hover:text-blue-600 transition-colors" href="/product/${product.id}">
                            <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">${product.name}</h3>
                        </a>
                        <p class="text-slate-600 text-sm mb-4 line-clamp-2 flex-grow">${product.description}</p>
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-xl font-bold text-blue-600 inline-flex items-center gap-1"><img src="/img/Saudi_Riyal_Symbol-2_2.svg" alt="Saudi Riyal" class="h-4 w-auto"> ${product.price.toFixed(2)}</span>
                            <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-primary-foreground h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4 add-to-cart" data-id="${product.id}">
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
            `;
        }

        // Load products on page load
        document.addEventListener('DOMContentLoaded', function() {
            // New Arrivals (first 4 products)
            const newArrivalsGrid = document.getElementById('newArrivalsGrid');
            if (newArrivalsGrid) {
                newArrivalsGrid.innerHTML = products.slice(0, 4).map(createProductCard).join('');
            }

            // Best Sellers (filtered)
            const bestSellersGrid = document.getElementById('bestSellersGrid');
            if (bestSellersGrid) {
                const bestSellers = products.filter(p => p.badge === "Best Seller");
                bestSellersGrid.innerHTML = bestSellers.map(createProductCard).join('');
            }

            // Add to cart functionality
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    const product = products.find(p => p.id == productId);
                    
                    alert(`Added ${product.name} to cart!`);
                    
                    // You would typically send this to your cart system
                    console.log(`Added product ${productId} to cart`);
                });
            });

            // Initialize dropdowns
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.addEventListener('mouseenter', function() {
                    const content = this.querySelector('.dropdown-content');
                    if (content) {
                        content.style.display = 'block';
                    }
                });
                
                dropdown.addEventListener('mouseleave', function() {
                    const content = this.querySelector('.dropdown-content');
                    if (content) {
                        content.style.display = 'none';
                    }
                });
            });
        });

        // Newsletter form submission
        const newsletterForm = document.querySelector('footer form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input[type="email"]').value;
                alert(`Thank you for subscribing with ${email}!`);
                this.reset();
            });
        }
    </script> --}}
    {{-- <section class="container mx-auto px-4 py-16">
    <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-12">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 mb-2">New Arrivals</h2>
            <p class="text-slate-500">Check out our latest premium accessories</p>
        </div>
        <a href="#" class="text-blue-600 font-medium hover:text-blue-700 flex items-center gap-1 group transition-colors">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                <path d="M5 12h14"></path>
                <path d="m12 5 7 7-7 7"></path>
            </svg>
        </a>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Example Product Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col">
            <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="/product/1">
                <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=800&q=80" alt="Premium Leather Seat Covers" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute top-3 right-3 bg-blue-600/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                    Interior
                </div>
                <div class="absolute top-3 left-3 bg-amber-500/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                    Best Seller
                </div>
            </a>
            <div class="p-5 flex flex-col flex-1">
                <a class="hover:text-blue-600 transition-colors" href="/product/1">
                    <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">Premium Leather Seat Covers</h3>
                </a>
                <p class="text-slate-600 text-sm mb-4 line-clamp-2 flex-grow">Transform your car interior with our premium leather seat covers. Designed for durability and maximum comfort.</p>
                <div class="flex items-center justify-between mt-auto">
                    <span class="text-xl font-bold text-blue-600"><x-currency amount="189.99" /></span>
                    <button class="inline-flex items-center justify-center text-sm font-medium h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4 add-to-cart" data-id="1">
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
        <!-- Repeat other products here -->
    </div>
</section> --}}
{{-- <section class="container mx-auto px-4 py-16">
    <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-12">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 mb-2">New Arrivals</h2>
            <p class="text-slate-500">Check out our latest premium accessories</p>
        </div>
        <a href="#" class="text-blue-600 font-medium hover:text-blue-700 flex items-center gap-1 group transition-colors">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                <path d="M5 12h14"></path>
                <path d="m12 5 7 7-7 7"></path>
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
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
                        <span class="text-xl font-bold text-blue-600"><x-currency :amount="number_format($product['price'], 2)" /></span>
                        <button wire:click="addToCart('addToCart', {{ $product['id'] }})" class="inline-flex items-center justify-center text-sm font-medium h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4">
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
 --}}
 <section class="container mx-auto px-4 py-16">
    <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-12">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 mb-2">New Arrivals</h2>
            <p class="text-slate-500">Check out our latest premium accessories</p>
        </div>
        <a href="#" class="text-blue-600 font-medium hover:text-blue-700 flex items-center gap-1 group transition-colors">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                <path d="M5 12h14"></path>
                <path d="m12 5 7 7-7 7"></path>
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col relative group">
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
                        <button wire:click="addToCart({{ $product['id'] }})" class="inline-flex items-center hover:text-white justify-center text-sm font-medium h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4">
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
