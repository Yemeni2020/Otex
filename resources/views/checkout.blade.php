<x-layouts.app>
    <main class="flex-grow bg-slate-50">
        <section class="bg-slate-900 text-white py-16">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-2">Checkout</h1>
                <p class="text-slate-300">Securely complete your purchase.</p>
            </div>
        </section>

        <section class="container mx-auto px-4 py-12">
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Billing / Shipping -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h2 class="text-xl font-bold text-slate-900 mb-4">Contact Information</h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="first_name">First Name</label>
                                <input id="first_name" type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="John">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="last_name">Last Name</label>
                                <input id="last_name" type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Doe">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="email">Email</label>
                                <input id="email" type="email" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="you@example.com">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="phone">Phone</label>
                                <div class="flex gap-2">
                                    <select class="rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="+1">+1 (US)</option>
                                        <option value="+44">+44 (UK)</option>
                                        <option value="+61">+61 (AU)</option>
                                        <option value="+971">+971 (UAE)</option>
                                        <option value="+91">+91 (IN)</option>
                                    </select>
                                    <input id="phone" type="tel" class="flex-1 rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="(555) 123-4567">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h2 class="text-xl font-bold text-slate-900 mb-4">Shipping Address</h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="street">Street Address</label>
                                <input id="street" type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="123 Performance Drive">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="city">City</label>
                                <input id="city" type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Detroit">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="state">State</label>
                                <input id="state" type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="MI">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="zip">ZIP</label>
                                <input id="zip" type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="48201">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="country">Country</label>
                                <select id="country" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>United Kingdom</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Payment moved above summary -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h3 class="text-xl font-bold text-slate-800 mb-4">Payment Method</h3>
                        <div class="grid grid-cols-2 gap-2 bg-slate-100 rounded-md p-1 text-slate-500">
                            <button type="button" class="flex items-center justify-center gap-2 rounded-sm px-3 py-2 text-sm font-medium bg-white text-slate-900 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                </svg>

                                Card
                            </button>
                            <button type="button" class="flex items-center justify-center gap-2 rounded-sm px-3 py-2 text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>

                                Online
                            </button>
                        </div>
                        <div class="mt-6 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="cardNumber">Card Number</label>
                                <input id="cardNumber" type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="1234 5678 9012 3456" maxlength="19">
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1" for="expiry">Expiry Date</label>
                                    <input id="expiry" type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="MM/YY" maxlength="5">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1" for="cvc">CVV</label>
                                    <input id="cvc" type="password" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="123" maxlength="4">
                                </div>
                            </div>
                            <button class="inline-flex items-center justify-center rounded-md font-medium bg-green-600 hover:bg-green-700 text-white w-full py-3 text-lg transition-colors">
                                Complete Order - $97.18
                            </button>
                        </div>
                        <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" text-green-600 mt-0.5">
                                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                

                                <div class="text-sm">
                                    <p class="font-semibold text-green-800">Secure Checkout</p>
                                    <p class="text-green-700">Your payment information is encrypted and secure</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <aside class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-6">
                    <h2 class="text-xl font-bold text-slate-900">Order Summary</h2>
                    <div class="space-y-4">
                        @foreach ([
                            ['name' => 'All-Weather Floor Mats Pro', 'price' => 49.99, 'qty' => 1, 'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?w=300&q=80'],
                            ['name' => 'Smart Trunk Organizer', 'price' => 34.99, 'qty' => 1, 'image' => 'https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?w=300&q=80'],
                        ] as $item)
                            <div class="flex gap-3">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 rounded-lg object-cover">
                                <div class="flex-1">
                                    <p class="font-semibold text-slate-800">{{ $item['name'] }}</p>
                                    <p class="text-sm text-slate-500">Qty: {{ $item['qty'] }}</p>
                                </div>
                                <span class="font-bold text-slate-900">${{ number_format($item['price'], 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t border-slate-200 pt-4 space-y-2 text-sm">
                        <div class="flex justify-between text-slate-600">
                            <span>Subtotal</span>
                            <span>$84.98</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Shipping</span>
                            <span>$5.00</span>
                        </div>
                        <div class="flex justify-between text-slate-600">
                            <span>Tax</span>
                            <span>$7.20</span>
                        </div>
                        <div class="flex justify-between font-bold text-slate-900 text-lg">
                            <span>Total</span>
                            <span>$97.18</span>
                        </div>
                    </div>
                    <button class="w-full h-12 rounded-full bg-blue-600 hover:bg-blue-700 text-white font-semibold transition-colors">Place Order</button>
                    <p class="text-xs text-slate-500 text-center">By placing your order, you agree to our Terms and Privacy Policy.</p>
                </aside>
            </div>
        </section>
    </main>
</x-layouts.app>
