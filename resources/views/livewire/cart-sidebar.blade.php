<div>
    <!-- Backdrop -->
    <div id="cartBackdrop" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 hidden" {{-- wire:click="$emit('closeCart')" --}}></div>

    <!-- Cart Sidebar -->
    <div id="cartSidebar"
        class="fixed right-0 top-0 h-full w-full max-w-md bg-white shadow-2xl z-50 flex flex-col transform translate-x-full transition-transform duration-300">

        <!-- Header -->
        <div class="p-6 border-b border-slate-200 flex items-center justify-between">
            <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-2" data-edit-disabled="true"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shopping-bag w-6 h-6 text-blue-600">
                    <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                    <path d="M3 6h18"></path>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>Shopping Cart</h2><button
                class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:text-accent-foreground h-10 w-10 hover:bg-slate-100"
                data-edit-disabled="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-x w-5 h-5">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg></button>
        </div>

        <!-- Cart Items -->
        <div class="flex-1 overflow-y-auto p-6">
            <div class="space-y-4">
                <div class="bg-slate-50 rounded-lg p-4 flex gap-4" style="opacity: 1; transform: none;"><img
                        src="https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?w=800&amp;q=80"
                        alt="Smart Trunk Organizer" class="w-20 h-20 object-cover rounded-md" data-edit-disabled="true">
                    <div class="flex-1">
                        <h3 class="font-semibold text-slate-800 mb-1" data-edit-disabled="true">Smart Trunk Organizer
                        </h3>
                        <p class="text-blue-600 font-bold mb-2" data-edit-disabled="true">$34.99</p>
                        <div class="flex items-center gap-2"><button
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 w-8"
                                data-edit-disabled="true"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-minus w-3 h-3">
                                    <path d="M5 12h14"></path>
                                </svg></button><span class="w-8 text-center font-semibold"
                                data-edit-disabled="true">1</span><button
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-8 w-8"
                                data-edit-disabled="true"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-plus w-3 h-3">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg></button></div>
                    </div><button
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 w-10 text-red-500 hover:text-red-700 hover:bg-red-50"
                        data-edit-disabled="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 w-4 h-4">
                            <path d="M3 6h18"></path>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                            <line x1="10" x2="10" y1="11" y2="17"></line>
                            <line x1="14" x2="14" y1="11" y2="17"></line>
                        </svg></button>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="border-t border-slate-200 p-6 space-y-4">
            <div class="flex items-center justify-between text-lg">
                <span class="font-semibold text-slate-700">Subtotal:</span>
                <span class="font-bold text-2xl text-blue-600">$34.99</span>
            </div>
            <button class="w-full h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-lg font-medium">
                Proceed to Checkout
            </button>
        </div>
    </div>

</div>
