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
                                <div class="flex items-center justify-between mb-2">
                                    <label class="block text-sm font-medium text-slate-700" for="cardNumber">Card Number</label>
                                    <span id="cardBrandDisplay" class="text-xs font-semibold text-slate-500">Card type</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div id="cardBrandIcon" class="w-14 h-9 rounded-md shadow-sm shrink-0 overflow-hidden">
                                        <svg viewBox="0 0 36 24" aria-hidden="true" class="w-full h-full">
                                            <rect width="36" height="24" rx="4" fill="#e2e8f0"></rect>
                                        </svg>
                                    </div>
                                    <input id="cardNumber" type="text" class="flex-1 rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="1234 5678 9012 3456" maxlength="19" inputmode="numeric" autocomplete="cc-number">
                                </div>
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
                    <h2 class="text-xl font-bold text-slate-900">Order Summary</h2>
                    <div class="space-y-2">
                        <p class="text-sm font-semibold text-slate-800">Do you have a discount code?</p>
                        <div class="flex gap-2">
                            <input type="text" placeholder="SAVE20" class="flex-1 rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <button class="rounded-lg px-4 py-2 bg-slate-900 text-white text-sm font-semibold hover:bg-slate-800 transition">Apply</button>
                        </div>
                        <p class="text-xs text-slate-500">Enter your code to apply available discounts.</p>
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

@push('scripts')
<script>
(() => {
    const cardNumber = document.getElementById('cardNumber');
    const brandDisplay = document.getElementById('cardBrandDisplay');
    const cardBrandIcon = document.getElementById('cardBrandIcon');
    if (!cardNumber || !brandDisplay) return;

    const brands = [
        { name: 'Visa', regex: /^4/ },
        { name: 'Mastercard', regex: /^(5[1-5]|2[2-7])/ },
        { name: 'Amex', regex: /^3[47]/ },
        { name: 'Discover', regex: /^6(?:011|5)/ },
    ];

    const brandSvgs = {
        Visa: `<svg width="780px" height="780px" viewBox="0 -140 780 780" xmlns="http://www.w3.org/2000/svg"><rect width="780" height="500" fill="#0E4595"/><path d="m293.2 348.73l33.361-195.76h53.36l-33.385 195.76h-53.336zm246.11-191.54c-10.57-3.966-27.137-8.222-47.822-8.222-52.725 0-89.865 26.55-90.18 64.603-0.299 28.13 26.514 43.822 46.752 53.186 20.771 9.595 27.752 15.714 27.654 24.283-0.131 13.121-16.586 19.116-31.922 19.116-21.357 0-32.703-2.967-50.227-10.276l-6.876-3.11-7.489 43.823c12.463 5.464 35.51 10.198 59.438 10.443 56.09 0 92.5-26.246 92.916-66.882 0.199-22.269-14.016-39.216-44.801-53.188-18.65-9.055-30.072-15.099-29.951-24.268 0-8.137 9.668-16.839 30.557-16.839 17.449-0.27 30.09 3.535 39.938 7.5l4.781 2.26 7.232-42.429m137.31-4.223h-41.232c-12.773 0-22.332 3.487-27.941 16.234l-79.244 179.4h56.031s9.16-24.123 11.232-29.418c6.125 0 60.555 0.084 68.338 0.084 1.596 6.853 6.49 29.334 6.49 29.334h49.514l-43.188-195.64zm-65.418 126.41c4.412-11.279 21.26-54.723 21.26-54.723-0.316 0.522 4.379-11.334 7.074-18.684l3.605 16.879s10.219 46.729 12.354 56.528h-44.293zm-363.3-126.41l-52.24 133.5-5.567-27.13c-9.725-31.273-40.025-65.155-73.898-82.118l47.766 171.2 56.456-0.064 84.004-195.39h-56.521" fill="#fff"/><path d="m146.92 152.96h-86.041l-0.681 4.073c66.938 16.204 111.23 55.363 129.62 102.41l-18.71-89.96c-3.23-12.395-12.597-16.094-24.186-16.527" fill="#F2AE14"/></svg>`,
        Mastercard: `<svg viewBox="0 -54.25 482.51 482.51" xmlns="http://www.w3.org/2000/svg"><g><path d="M220.13,421.67V396.82c0-9.53-5.8-15.74-15.32-15.74-5,0-10.35,1.66-14.08,7-2.9-4.56-7-7-13.25-7a14.07,14.07,0,0,0-12,5.8v-5h-7.87v39.76h7.87V398.89c0-7,4.14-10.35,9.94-10.35s9.11,3.73,9.11,10.35v22.78h7.87V398.89c0-7,4.14-10.35,9.94-10.35s9.11,3.73,9.11,10.35v22.78Zm129.22-39.35h-14.5v-12H327v12h-8.28v7H327V408c0,9.11,3.31,14.5,13.25,14.5A23.17,23.17,0,0,0,351,419.6l-2.49-7a13.63,13.63,0,0,1-7.46,2.07c-4.14,0-6.21-2.49-6.21-6.63V389h14.5v-6.63Zm73.72-1.24a12.39,12.39,0,0,0-10.77,5.8v-5h-7.87v39.76h7.87V399.31c0-6.63,3.31-10.77,8.7-10.77a24.24,24.24,0,0,1,5.38.83l2.49-7.46a28,28,0,0,0-5.8-.83Zm-111.41,4.14c-4.14-2.9-9.94-4.14-16.15-4.14-9.94,0-16.15,4.56-16.15,12.43,0,6.63,4.56,10.35,13.25,11.6l4.14.41c4.56.83,7.46,2.49,7.46,4.56,0,2.9-3.31,5-9.53,5a21.84,21.84,0,0,1-13.25-4.14l-4.14,6.21c5.8,4.14,12.84,5,17,5,11.6,0,17.81-5.38,17.81-12.84,0-7-5-10.35-13.67-11.6l-4.14-.41c-3.73-.41-7-1.66-7-4.14,0-2.9,3.31-5,7.87-5,5,0,9.94,2.07,12.43,3.31Zm120.11,16.57c0,12,7.87,20.71,20.71,20.71,5.8,0,9.94-1.24,14.08-4.56l-4.14-6.21a16.74,16.74,0,0,1-10.35,3.73c-7,0-12.43-5.38-12.43-13.25S445,389,452.07,389a16.74,16.74,0,0,1,10.35,3.73l4.14-6.21c-4.14-3.31-8.28-4.56-14.08-4.56-12.43-.83-20.71,7.87-20.71,19.88h0Zm-55.5-20.71c-11.6,0-19.47,8.28-19.47,20.71s8.28,20.71,20.29,20.71a25.33,25.33,0,0,0,16.15-5.38l-4.14-5.8a19.79,19.79,0,0,1-11.6,4.14c-5.38,0-11.18-3.31-12-10.35h29.41v-3.31c0-12.43-7.46-20.71-18.64-20.71h0Zm-.41,7.46c5.8,0,9.94,3.73,10.35,9.94H364.68c1.24-5.8,5-9.94,11.18-9.94ZM268.59,401.79V381.91h-7.87v5c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25-7.87.41-12.43-5.8-12.43-13.25Zm306.08-20.71a12.39,12.39,0,0,0-10.77,5.8v-5h-7.87v39.76H532V399.31c0-6.63,3.31-10.77,8.7-10.77a24.24,24.24,0,0,1,5.38.83l2.49-7.46a28,28,0,0,0-5.8-.83Zm-30.65,20.71V381.91h-7.87v5c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25-7.87.41-12.43-5.8-12.43-13.25Zm111.83,0V366.17h-7.87v20.71c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25C564.73,415.46,560.17,409.25,560.17,401.79Z"/><g><rect x="169.81" y="31.89" width="143.72" height="234.42" fill="#ff5f00"/><path d="M317.05,197.6A149.5,149.5,0,0,1,373.79,80.39a149.1,149.1,0,1,0,0,234.42A149.5,149.5,0,0,1,317.05,197.6Z" fill="#eb001b"/><path d="M615.26,197.6a148.95,148.95,0,0,1-241,117.21,149.43,149.43,0,0,0,0-234.42,148.95,148.95,0,0,1,241,117.21Z" fill="#f79e1b"/></g></g></svg>`,
        Amex: `<svg viewBox="0 0 291.764 291.764" xmlns="http://www.w3.org/2000/svg"><g><path fill="#E4E7E7" d="M18.235,41.029h255.294c10.066,0,18.235,8.16,18.235,18.235V232.5c0,10.066-8.169,18.235-18.235,18.235H18.235C8.169,250.735,0,242.566,0,232.5V59.265C0,49.19,8.169,41.029,18.235,41.029z"/><path fill="#324D5B" d="M58.681,77.491H36.452v72.978h22.11c11.734,0,20.223-2.617,27.663-8.425c8.826-6.893,14.069-17.296,14.069-28.037C100.294,92.462,83.189,77.491,58.681,77.491z M75.148,127.756c-3.948,3.064-9.026,4.376-17.105,4.376h-3.346V95.808h3.346c8.078,0,12.965,1.231,17.105,4.431c4.322,3.301,6.902,8.406,6.902,13.676C82.05,119.186,79.469,124.483,75.148,127.756z M109.43,150.459h18.108V77.363H109.43V150.459z M168.649,105.619c-9.254-3.027-11.971-5.042-11.971-8.799c0-4.395,4.851-7.768,11.488-7.768c4.623,0,8.406,1.678,12.446,5.662l8.042-9.327c-6.638-5.142-14.561-7.768-23.214-7.768c-13.95,0-24.618,8.598-24.618,20.022c0,9.665,4.969,14.588,19.421,19.202c6.036,1.887,9.109,3.136,10.649,3.994c3.082,1.787,4.632,4.285,4.632,7.221c0,5.68-5.106,9.865-11.971,9.865c-7.34,0-13.257-3.237-16.813-9.327l-9.929,8.516c7.075,9.218,15.609,13.33,27.335,13.33c15.983,0,27.225-9.455,27.225-22.986C191.37,116.341,186.173,111.308,168.649,105.619z M218.878,113.87c0-11.361,9.163-20.323,20.825-20.323c5.908,0,10.412,1.951,15.573,6.647l-0.009-18.436c-6.081-3.009-11.105-4.258-17.077-4.258c-21.025,0-37.875,16.193-37.875,36.452c0,20.496,16.439,36.361,37.565,36.361c5.972,0,11.096-1.14,17.387-4.057l0.009-18.445c-4.978,4.623-9.364,6.483-15.008,6.483C227.759,134.294,218.878,125.851,218.878,113.87z"/><path fill="#F4B459" d="M273.529,250.735c10.066,0,18.235-8.169,18.235-18.235v-72.941l-164.118,91.176L273.529,250.735L273.529,250.735z"/></g></svg>`,
        Discover: `<svg viewBox="0 0 36 24" xmlns="http://www.w3.org/2000/svg"><rect width="36" height="24" rx="4" fill="#FF6000"/><text x="8" y="14" font-size="6" fill="#fff" font-family="Arial" font-weight="bold">DISC</text></svg>`,
        Default: `<svg viewBox="0 0 36 24" xmlns="http://www.w3.org/2000/svg"><rect width="36" height="24" rx="4" fill="#e2e8f0"/></svg>`
    };

    const formatNumber = (value) => value.replace(/\D/g, '').slice(0, 19).replace(/(.{4})/g, '$1 ').trim();

    cardNumber.addEventListener('input', (e) => {
        const formatted = formatNumber(e.target.value);
        e.target.value = formatted;
        const digits = formatted.replace(/\s+/g, '');
        const brand = brands.find(b => b.regex.test(digits));
        brandDisplay.textContent = brand ? brand.name : 'Card type';
        if (cardBrandIcon) {
            const svg = brand ? brandSvgs[brand.name] : brandSvgs.Default;
            cardBrandIcon.innerHTML = svg;
        }
    });
})();
</script>
@endpush
