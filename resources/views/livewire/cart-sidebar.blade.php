<div id="cartSidebar" class="fixed right-0 top-0 h-full w-full max-w-md bg-white shadow-2xl z-50 flex flex-col transform transition-transform duration-300 {{ $isOpen ? 'translate-x-0' : 'translate-x-full' }}">
    <!-- Header -->
    <div  class="p-6 border-b border-slate-200 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-blue-600">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                <path d="M3 6h18"></path>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            Shopping Cart
        </h2>
        <button wire:click="close" class="h-10 w-10 hover:bg-slate-100 rounded-md flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Cart Items -->
    <div class="flex-1 overflow-y-auto p-6">
        <div class="space-y-4">
            @foreach($cart as $index => $item)
                <div class="bg-slate-50 rounded-lg p-4 flex gap-4">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded-md">
                    <div class="flex-1">
                        <h3 class="font-semibold text-slate-800 mb-1">{{ $item['name'] }}</h3>
                        <p class="text-blue-600 font-bold mb-2">${{ number_format($item['price'], 2) }}</p>
                        <div class="flex items-center gap-2">
                            <button wire:click="decrement({{ $index }})" class="h-8 w-8 border rounded-md flex items-center justify-center hover:bg-blue-100">
                                -
                            </button>
                            <span class="w-8 text-center font-semibold">{{ $item['quantity'] }}</span>
                            <button wire:click="increment({{ $index }})" class="h-8 w-8 border rounded-md flex items-center justify-center hover:bg-blue-100">
                                +
                            </button>
                        </div>
                    </div>
                    <button wire:click="removeItem({{ $index }})" class="h-10 w-10 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-md flex items-center justify-center">
                        🗑
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <div class="border-t border-slate-200 p-6 space-y-4">
        <div class="flex items-center justify-between text-lg">
            <span class="font-semibold text-slate-700">Subtotal:</span>
            <span class="font-bold text-2xl text-blue-600">${{ number_format($this->subtotal, 2) }}</span>
        </div>
        <button class="w-full h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-lg font-medium">
            Proceed to Checkout
        </button>
    </div>
</div>