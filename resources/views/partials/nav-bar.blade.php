
<header class="sticky top-0 z-50 transition-all duration-300 border-b border-white/20 bg-white/50 backdrop-blur-lg supports-[backdrop-filter]:bg-white/40">
        <!-- Main Header -->
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between gap-4 lg:gap-8">
                <!-- Mobile Menu Button -->
                <button id="mobileMenuButton" class="lg:hidden p-2 hover:bg-black/5 rounded-md transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-slate-700">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                </button>

                <!-- Logo -->
                <a href="/" class="flex items-center gap-2 cursor-pointer">
                    <div class="bg-gradient-to-tr from-blue-600/90 to-blue-400/90 backdrop-blur-sm p-2 rounded-xl shadow-lg shadow-blue-500/20 ring-1 ring-white/30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-white">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <path d="M9 17h6"></path>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-700 to-blue-500 bg-clip-text text-transparent leading-none filter drop-shadow-sm">Otex</h1>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest font-semibold leading-none mt-0.5">Automotive</p>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-slate-700">
                    <a class="hover:text-blue-600 transition-colors relative group py-2 text-blue-600 active" href="{{ route('home') }}">Home
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform transition-transform origin-left duration-200 scale-x-0 group-hover:scale-x-100"></span>
                        
                    </a>
                    
                    <!-- Shop Dropdown -->
                    <div class="dropdown relative">
                        <a class="hover:text-blue-600 transition-colors relative group py-2 flex items-center cursor-pointer">
                            Shop
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3 ml-1">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform transition-transform origin-left duration-200 scale-x-0 group-hover:scale-x-100"></span>
                        </a>
                        <div class="dropdown-content mt-2 bg-white rounded-xl shadow-2xl border border-gray-100 p-4 min-w-[280px]">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-2">Interior</h4>
                                    <ul class="space-y-2 text-sm text-slate-600">
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Seat Covers</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Floor Mats</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Steering Wheels</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Dash Kits</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-2">Exterior</h4>
                                    <ul class="space-y-2 text-sm text-slate-600">
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Body Kits</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Spoilers</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Lighting</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Wheels</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <a href="/shop" class="text-blue-600 hover:text-blue-700 font-medium text-sm">View All Categories →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Dropdown -->
                    <div class="dropdown relative">
                        <a class="hover:text-blue-600 transition-colors relative group py-2 flex items-center cursor-pointer">
                            Categories
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3 ml-1">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform transition-transform origin-left duration-200 scale-x-0 group-hover:scale-x-100"></span>
                        </a>
                        <div class="dropdown-content mt-2 bg-white rounded-xl shadow-2xl border border-gray-100 p-4 min-w-[280px]">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-2">Performance</h4>
                                    <ul class="space-y-2 text-sm text-slate-600">
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Exhaust Systems</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Suspension</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Brake Systems</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Engine Parts</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-2">Tech & Gadgets</h4>
                                    <ul class="space-y-2 text-sm text-slate-600">
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Dash Cams</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">GPS Systems</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Phone Mounts</a></li>
                                        <li><a href="#" class="hover:text-blue-600 transition-colors">Bluetooth Kits</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <a href="/categories" class="text-blue-600 hover:text-blue-700 font-medium text-sm">View All Products →</a>
                            </div>
                        </div>
                    </div>

                    <a class="hover:text-blue-600 transition-colors relative group py-2" href="/about">About Us
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform transition-transform origin-left duration-200 scale-x-100"></span>
                    </a>
                    <a class="hover:text-blue-600 transition-colors relative group py-2" href="/contact">Contact
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 transform transition-transform origin-left duration-200 scale-x-0 group-hover:scale-x-100"></span>
                    </a>
                </nav>

                <!-- Search Bar -->
                <div class="hidden md:flex flex-1 max-w-md relative group">
                    <form class="w-full relative">
                        <input type="text" class="flex h-10 border px-3 py-2 text-sm ring-offset-white file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full pl-4 pr-10 bg-white/50 border-slate-200/60 focus:bg-white/80 transition-all rounded-full focus:ring-2 focus:ring-blue-500/20 backdrop-blur-sm shadow-sm" placeholder="Search for parts..." />
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- User Actions -->
                <div class="flex items-center gap-2 sm:gap-4">
                    <button class="md:hidden p-2 hover:bg-black/5 rounded-full text-slate-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </button>
                    
                    <!-- User Dropdown -->
                    <div class="dropdown relative">
                        <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:text-accent-foreground h-10 w-10 rounded-full hover:bg-black/5 relative group transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-slate-600 group-hover:text-blue-600 transition-colors">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </button>
                        <div class="dropdown-content mt-2 bg-white rounded-xl shadow-2xl border border-gray-100 p-4 min-w-[200px] right-0">
                            <div class="space-y-3">
                                <h4 class="font-bold text-slate-800 mb-2">My Account</h4>
                                <a href="/profile" class="block text-sm text-slate-600 hover:text-blue-600 transition-colors">Profile</a>
                                <a href="/orders" class="block text-sm text-slate-600 hover:text-blue-600 transition-colors">Orders</a>
                                <a href="/wishlist" class="block text-sm text-slate-600 hover:text-blue-600 transition-colors">Wishlist</a>
                                <div class="pt-3 border-t border-gray-100">
                                    <a href="/login" class="block text-sm text-blue-600 hover:text-blue-700 font-medium">Sign In</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart -->
                    <button id="cartButton" class="inline-flex items-center justify-center text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 w-10 relative bg-slate-900/90 hover:bg-blue-600 text-white rounded-full transition-all duration-300 shadow-lg hover:shadow-blue-500/30 backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                            <circle cx="8" cy="21" r="1"></circle>
                            <circle cx="19" cy="21" r="1"></circle>
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobileMenu" class="lg:hidden mt-4 hidden">
                <div class="space-y-2 border-t border-gray-100 pt-4">
                    <a href="/" class="block py-2 text-slate-700 hover:text-blue-600 transition-colors font-medium">Home</a>
                    
                    <!-- Mobile Shop Dropdown -->
                    <div class="mobile-dropdown">
                        <button class="mobile-dropdown-toggle flex items-center justify-between w-full py-2 text-slate-700 hover:text-blue-600 transition-colors font-medium">
                            Shop
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="mobile-dropdown-content pl-4 mt-2 space-y-2 border-l border-gray-200">
                            <a href="/shop/interior" class="block py-1 text-slate-600 hover:text-blue-600 transition-colors">Interior</a>
                            <a href="/shop/exterior" class="block py-1 text-slate-600 hover:text-blue-600 transition-colors">Exterior</a>
                            <a href="/shop/performance" class="block py-1 text-slate-600 hover:text-blue-600 transition-colors">Performance</a>
                            <a href="/shop/electronics" class="block py-1 text-slate-600 hover:text-blue-600 transition-colors">Electronics</a>
                        </div>
                    </div>

                    <!-- Mobile Categories Dropdown -->
                    <div class="mobile-dropdown">
                        <button class="mobile-dropdown-toggle flex items-center justify-between w-full py-2 text-slate-700 hover:text-blue-600 transition-colors font-medium">
                            Categories
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="mobile-dropdown-content pl-4 mt-2 space-y-2 border-l border-gray-200">
                            <a href="/categories/seat-covers" class="block py-1 text-slate-600 hover:text-blue-600 transition-colors">Seat Covers</a>
                            <a href="/categories/floor-mats" class="block py-1 text-slate-600 hover:text-blue-600 transition-colors">Floor Mats</a>
                            <a href="/categories/lighting" class="block py-1 text-slate-600 hover:text-blue-600 transition-colors">Lighting</a>
                            <a href="/categories/dash-cams" class="block py-1 text-slate-600 hover:text-blue-600 transition-colors">Dash Cams</a>
                        </div>
                    </div>

                    <a href="/about" class="block py-2 text-blue-600 font-medium">About Us</a>
                    <a href="/contact" class="block py-2 text-slate-700 hover:text-blue-600 transition-colors font-medium">Contact</a>
                </div>
            </div>
        </div>
    </header>

    @livewire('cart-sidebar')