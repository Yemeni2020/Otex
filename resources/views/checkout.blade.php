<x-layouts.app>
    @push('head')
        <style>
            :root {
                --primary: #2563eb;
                --line: #e2e8f0;
                --warn: #fde68a;
                --shadow: 0 18px 40px -24px rgba(15, 23, 42, 0.35);
            }
            .dark {
                --primary: #38bdf8;
                --line: #1f2937;
                --warn: #fcd34d;
                --shadow: 0 18px 40px -24px rgba(0, 0, 0, 0.6);
            }
        </style>
    @endpush

    <div id="applePayAlert" class="bg-[color:var(--warn)] text-slate-900">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between gap-3 text-xs">
            <button class="opacity-70 hover:opacity-100" aria-label="close" type="button" data-dismiss-alert>×</button>
            <div class="flex-1 text-center">
                Apple Pay is available only in Safari. Please open this checkout in Safari to pay.
            </div>
            <button id="copyCheckoutLink" class="inline-flex items-center gap-2 rounded-md border border-black/20 bg-black/10 px-3 py-1.5 hover:bg-black/15" type="button">
                Copy link
                <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.7">
                    <path d="M9 9h10v10H9z"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                </svg>
            </button>
        </div>
    </div>

    <main class="py-12 bg-gradient-to-b from-slate-50 via-white to-slate-50">
        <div class="container mx-auto px-4 space-y-5">
            <!-- Store header -->
            <x-card class="p-6 border-slate-200/70 bg-white/90 backdrop-blur">
                <div class="flex items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <a class="grid h-14 w-14 place-items-center rounded-xl border border-[color:var(--line)] bg-white overflow-hidden shadow-sm" href="#">
                            <img class="h-full w-full object-contain" src="{{ asset('img/logo_avatar.svg') }}" alt="logo">
                        </a>
                        <div>
                            <h1 class="text-lg font-bold leading-6 text-slate-900">Osama Osama</h1>
                            <div class="mt-1 text-xs text-slate-500">
                                <a class="hover:text-slate-700" href="cart.html">Cart</a>
                                <span class="mx-2">/</span>
                                <span class="text-slate-700">Checkout</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid h-14 w-14 place-items-center rounded-xl border border-[color:var(--line)] bg-white shadow-sm">
                        <svg viewBox="0 0 24 24" class="h-10 w-10 text-[color:var(--primary)]" fill="currentColor">
                            <path d="M12 2a10 10 0 1 0 7.07 17.07l-2.12-2.12A7 7 0 1 1 19 12h-7v3h10A10 10 0 0 0 12 2z"/>
                        </svg>
                    </div>
                </div>
            </x-card>

            <!-- Totals + coupon -->
            <x-card class="mt-5 border-slate-200/70 bg-white/90 backdrop-blur">
                <div class="p-6 flex items-center justify-between">
                    <div class="text-xl font-extrabold text-slate-900">113.45 <span class="text-slate-400">SAR</span></div>
                    <div class="text-xl font-bold text-slate-900">Order total</div>
                </div>

                <div class="px-6 pb-6">
                    <div class="mb-2 text-sm text-[color:var(--primary)]">Have a discount code?</div>

                    <div class="flex gap-2">
                        <x-input placeholder="Enter coupon code" class="rounded-lg px-4 py-3 text-sm bg-white/90" />
                        <x-button type="button" size="md" variant="solid" class="rounded-lg px-5">Apply</x-button>
                    </div>

                    <div class="mt-4 flex justify-center">
                        <button id="openOrderDetails"
                            class="rounded-full border border-[color:var(--line)] bg-white px-5 py-2 text-xs text-slate-600 shadow-sm hover:bg-slate-50" type="button">
                            Order details
                        </button>
                    </div>
                </div>
            </x-card>

            <!-- Main accordion card -->
            <x-card class="mt-5 border-slate-200/70 bg-white/90 backdrop-blur">
                <!-- Shipping Address header -->
                <button class="w-full p-6 flex items-center justify-between" type="button">
                    <div class="flex items-center gap-2 text-slate-700">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M12 22s7-4.4 7-11a7 7 0 0 0-14 0c0 6.6 7 11 7 11z"/>
                            <circle cx="12" cy="11" r="2.5"/>
                        </svg>
                    </div>
                    <div class="text-lg font-bold text-slate-900">Shipping address</div>
                </button>

                <div class="px-6 pb-6">
                    <div class="text-xs text-slate-500 mb-4">
                        Commodo Magnam Facil - Saudi Arabia - Dammam - Al Khalidiyah North - Saad Bin Saud
                    </div>

                    <div class="rounded-xl border border-[color:var(--line)]">
                        <div class="flex items-center justify-between px-4 py-3 bg-slate-50">
                            <div class="text-sm font-bold text-slate-700">Saved addresses</div>
                            <svg viewBox="0 0 24 24" class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="m6 15 6-6 6 6"/>
                            </svg>
                        </div>

                        <div class="px-4 py-3">
                            <label class="flex items-start justify-between gap-3">
                                <div class="flex items-start gap-3">
                                    <input type="radio" checked class="mt-1 accent-[color:var(--primary)]">
                                    <span class="text-sm text-slate-700">
                                        Saudi Arabia - Dammam - Al Khalidiyah North - Saad Bin Saud
                                    </span>
                                </div>

                                <div class="flex items-center gap-3">
                                    <button class="text-slate-500 hover:text-slate-800" aria-label="edit" type="button">
                                        <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.7">
                                            <path d="M12 20h9"/>
                                            <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/>
                                        </svg>
                                    </button>
                                    <button class="text-red-500 hover:text-red-600" aria-label="delete" type="button">
                                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.7">
                                            <path d="M3 6h18"/>
                                            <path d="M8 6V4h8v2"/>
                                            <path d="M19 6l-1 16H6L5 6"/>
                                            <path d="M10 11v6M14 11v6"/>
                                        </svg>
                                    </button>
                                </div>
                            </label>

                            <button class="mt-4 w-full rounded-lg border border-[color:var(--line)] bg-white px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50" type="button">
                                Add new address
                            </button>

                            <label class="mt-4 flex items-start gap-3 text-sm text-slate-700">
                                <input type="checkbox" class="mt-1 accent-[color:var(--primary)]">
                                <span>
                                    Someone else will receive the order?
                                    <span class="block text-xs text-slate-400 mt-1">
                                        If someone else will receive your order, the carrier will contact them on delivery.
                                    </span>
                                </span>
                            </label>

                            <x-button type="button" size="lg" variant="solid" class="mt-5 w-full rounded-lg text-sm font-extrabold">Confirm address</x-button>
                        </div>
                    </div>

                    <!-- SHIPPING COMPANIES (click to open) -->
                    <div class="mt-6 border-t border-[color:var(--line)] pt-5">
                        <button id="toggleShipping" class="w-full flex items-start justify-between gap-3" type="button">
                            <div class="text-xs text-slate-500">SMSA | Express shipping, 2-3 business days</div>
                            <div class="flex items-center gap-2 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="none" class="text-slate-800">
                                    <circle cx="17" cy="18" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <circle cx="7" cy="18" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path d="M5 17.9724C3.90328 17.9178 3.2191 17.7546 2.73223 17.2678C2.24536 16.7809 2.08222 16.0967 2.02755 15M9 18H15M19 17.9724C20.0967 17.9178 20.7809 17.7546 21.2678 17.2678C22 16.5355 22 15.357 22 13V11H17.3C16.5555 11 16.1832 11 15.882 10.9021C15.2731 10.7043 14.7957 10.2269 14.5979 9.61803C14.5 9.31677 14.5 8.94451 14.5 8.2C14.5 7.08323 14.5 6.52485 14.3532 6.07295C14.0564 5.15964 13.3404 4.44358 12.4271 4.14683C11.9752 4 11.4168 4 10.3 4H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2 8H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2 11H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.5 6H16.3212C17.7766 6 18.5042 6 19.0964 6.35371C19.6886 6.70742 20.0336 7.34811 20.7236 8.6295L22 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span>Shipping carrier</span>
                            </div>
                        </button>

                        <!-- shipping panel -->
                        <div id="shippingPanel" class="hidden mt-4 rounded-xl border border-[color:var(--line)] p-4">
                            <ul class="space-y-3">
                                <li class="rounded-md border border-[color:var(--line)] px-4 py-3 hover:bg-slate-50">
                                    <label class="flex items-center justify-between gap-3 cursor-pointer">
                                        <div class="flex items-center gap-3">
                                            <input type="radio" name="ship" checked class="accent-[color:var(--primary)]">
                                            <img class="h-8 w-8" src="https://cdn.assets.salla.network/prod/stores/images/shipping_logo.svg" alt="SMSA">
                                            <div class="flex flex-col">
                                                <span class="text-sm font-semibold">SMSA | Express shipping</span>
                                                <span class="text-xs text-slate-500">2-3 business days</span>
                                            </div>
                                        </div>
                                        <div class="text-sm font-bold">12 <span class="text-slate-400">SAR</span></div>
                                    </label>
                                </li>
                            </ul>

                            <x-button type="button" size="lg" variant="solid" class="mt-4 w-full rounded-lg text-sm font-extrabold">
                                Confirm carrier
                            </x-button>
                        </div>
                    </div>

                    <!-- PAYMENT (click to open) -->
                    <div class="mt-6 border pt-5">
                        <button id="togglePayment" class="w-full flex items-start justify-between gap-3" type="button">
                            <div class="text-xs text-slate-500">Mada</div>
                            <div class="flex items-center gap-2 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="none" class="text-slate-800">
                                    <path d="M14.4998 12.001C14.4998 13.3817 13.3805 14.501 11.9998 14.501C10.6191 14.501 9.49982 13.3817 9.49982 12.001C9.49982 10.6203 10.6191 9.50098 11.9998 9.50098C13.3805 9.50098 14.4998 10.6203 14.4998 12.001Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16 5.00098C18.4794 5.00098 20.1903 5.38518 21.1329 5.6773C21.6756 5.84549 22 6.35987 22 6.92803V16.6833C22 17.7984 20.7719 18.6374 19.6762 18.4305C18.7361 18.253 17.5107 18.1104 16 18.1104C11.2491 18.1104 10.1096 19.9161 3.1448 18.3802C2.47265 18.232 2 17.6275 2 16.9392V6.92214C2 5.94628 2.92079 5.23464 3.87798 5.42458C10.1967 6.67844 11.4209 5.00098 16 5.00098Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2 9.00098C3.95133 9.00098 5.70483 7.40605 5.92901 5.75514M18.5005 5.50098C18.5005 7.54062 20.2655 9.46997 22 9.46997M22 15.001C20.1009 15.001 18.2601 16.3112 18.102 18.0993M6.00049 18.4971C6.00049 16.2879 4.20963 14.4971 2.00049 14.4971" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span>Payment</span>
                            </div>
                        </button>

                        <!-- payment panel -->
                        <div id="paymentPanel" class="hidden mt-4 rounded-xl border border-[color:var(--line)] p-4">
                            <!-- payment options row -->
                            <div class="flex flex-wrap gap-3">
                                <button class="h-12 w-12 rounded-full border border-[color:var(--line)] bg-white grid place-items-center ring-2 ring-[color:var(--primary)]/30 " type="button">
                                    <img class="h-7" src="https://cdn.assets.salla.network/prod/stores/vendor/checkout/images/icons/pay-option-mada.svg" alt="mada">
                                </button>
                                <button class="h-12 w-12 rounded-full border border-[color:var(--line)] bg-white grid place-items-center hover:bg-slate-50 " type="button">
                                    <img class="h-7" src="https://cdn.assets.salla.network/prod/stores/vendor/checkout/images/icons/pay-option-credit-2.svg" alt="credit">
                                </button>
                                <button class="h-12 w-12 rounded-full border border-[color:var(--line)] bg-white grid place-items-center hover:bg-slate-50 " type="button">
                                    <img class="h-7" src="https://cdn.assets.salla.network/prod/stores/vendor/checkout/images/icons/pay-option-tabby_en.png?v=0.0.1" alt="tabby">
                                </button>
                                <button class="h-12 w-16 rounded-full border border-[color:var(--line)] bg-white grid place-items-center hover:bg-slate-50 px-2 " type="button">
                                    <img class="h-6" src="https://cdn.assets.salla.network/prod/stores/vendor/checkout/images/icons/tamara/ar-tamara-label.svg" alt="tamara">
                                </button>
                                <button class="h-12 rounded-full border border-[color:var(--line)] bg-white px-4 text-sm font-semibold hover:bg-slate-50 " type="button">
                                    Bank transfer
                                </button>
                                <button class="h-12 rounded-full border border-[color:var(--line)] bg-white px-4 text-sm font-semibold hover:bg-slate-50 relative" type="button">
                                    Cash on delivery
                                    <span class="absolute -left-2 -top-2 rounded-full bg-sky-100 text-sky-700 text-[11px] px-2 py-0.5 border border-sky-200">+10 SAR</span>
                                </button>
                            </div>

                            <!-- card form -->
                            <div class="mt-5 grid gap-4 md:grid-cols-6">
                                <div class="md:col-span-3">
                                    <label class="text-sm font-semibold">Card number</label>
                                    <div class="mt-2 relative">
                                        <x-input placeholder="Card number" class="rounded-lg px-4 py-3 text-sm bg-white/90" />
                                        <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">💳</span>
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <label class="text-sm font-semibold">Expiry date</label>
                                    <div class="mt-2 flex gap-2">
                                        <x-input placeholder="Month" class="rounded-lg px-4 py-3 text-sm bg-white/90" />
                                        <x-input placeholder="Year" class="rounded-lg px-4 py-3 text-sm bg-white/90" />
                                    </div>
                                </div>

                                <div class="md:col-span-1">
                                    <label class="text-sm font-semibold">CVC</label>
                                    <x-input placeholder="CVC" class="mt-2 rounded-lg px-4 py-3 text-sm bg-white/90" />
                                </div>
                            </div>

                            <x-button type="button" size="lg" variant="solid" class="mt-5 w-full rounded-lg text-sm font-extrabold">
                                Confirm payment
                            </x-button>
                        </div>
                    </div>
                </div>
            </x-card>

            <!-- bottom text -->
            <div class="mt-10 text-center text-sm text-slate-500 leading-7">
                Every order gives back.<br>
                We donate a portion of your order to the Rukn Al-Hiwar charity.
            </div>
        </div>
    </main>

    <!-- ===================== ORDER DETAILS DRAWER ===================== -->
    <div id="drawerOverlay" class="fixed inset-0 z-50 hidden">
        <!-- backdrop -->
        <div class="absolute inset-0 bg-black/40" data-close-drawer></div>

        <!-- drawer -->
        <aside id="drawer"
            class="absolute left-0 top-0 h-full w-full max-w-md bg-white shadow-[var(--shadow)]
                translate-x-[-100%] transition-transform duration-300 bg-white">
            <div class="cart-drawer-cont h-full flex flex-col">
                <div class="cart-drawer__header flex items-center justify-between border-b border-[color:var(--line)] px-5 py-4">
                    <h3 class="cart-drawer__title text-base font-extrabold">Order details</h3>
                    <button id="closeDrawer" class="cart-drawer__close text-slate-500 hover:text-slate-900" aria-label="close" type="button">
                        ×
                    </button>
                </div>

                <div class="cart-drawer__content flex-1 overflow-hidden">
                    <div class="cart-drawer__items h-full">
                        <div class="cart-drawer__scroll-content h-full overflow-auto p-5 space-y-4">
                            <!-- item -->
                            <div class="cart-item flex gap-3">
                                <div class="cart-item__image relative h-14 w-14 overflow-hidden rounded-xl border border-[color:var(--line)] bg-white">
                                    <img class="h-full w-full object-cover" src="https://cdn.salla.sa/zvEDg/XxtyuVHPUfp7nGe7xyUPmfiUGqEqbSEzXGgDrabr.png" alt="Smart Vlog Kit 4-in-1">
                                    <div class="cart-item__quantity-badge absolute -right-2 -top-2 grid h-6 w-6 place-items-center rounded-full bg-[color:var(--primary)] text-xs font-bold text-white">1</div>
                                </div>
                                <div class="cart-item__details flex-1">
                                    <div class="cart-item__info">
                                        <h4 class="cart-item__name text-sm font-semibold leading-6">
                                            Smart Vlog Kit 4-in-1
                                        </h4>
                                        <div class="cart-item__meta text-xs text-slate-400 mt-1">
                                            <span class="cart-item__specs"></span>
                                        </div>
                                    </div>
                                    <div class="cart-item__bottom mt-2">
                                        <div class="cart-item__price text-sm font-bold">
                                            56.35 <small class="cart-item__currency text-slate-400">SAR</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- item -->
                            <div class="cart-item flex gap-3">
                                <div class="cart-item__image relative h-14 w-14 overflow-hidden rounded-xl border border-[color:var(--line)] bg-white">
                                    <img class="h-full w-full object-cover" src="https://cdn.salla.sa/zvEDg/Wto2h6hhbNNWCqh7OsM0gZqPC5I157wqFmlpW5Qp.png" alt="Home Sensor (TUYA)">
                                    <div class="cart-item__quantity-badge absolute -right-2 -top-2 grid h-6 w-6 place-items-center rounded-full bg-[color:var(--primary)] text-xs font-bold text-white">1</div>
                                </div>
                                <div class="cart-item__details flex-1">
                                    <div class="cart-item__info">
                                        <h4 class="carMt-item__name text-sm font-semibold leading-6">
                                            Home Sensor (TUYA)
                                        </h4>
                                    </div>
                                    <div class="cart-item__bottom mt-2">
                                        <div class="cart-item__price text-sm font-bold">
                                            43.30 <small class="cart-item__currency text-slate-400">SAR</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- footer summary -->
                <div class="border-t border-[color:var(--line)] p-5 space-y-4">
                    <div class="flex items-center justify-between text-lg">
                        <span class="font-semibold text-slate-700">Subtotal</span>
                        <span class="font-bold text-2xl text-blue-600">113.45 <span class="text-slate-400">SAR</span></span>
                    </div>
                    <x-button type="button" size="lg" variant="solid" class="w-full rounded-md">Continue checkout</x-button>
                </div>
            </div>
        </aside>
    </div>

    @push('scripts')
        <script>
            const overlay = document.getElementById('drawerOverlay');
            const drawer = document.getElementById('drawer');
            const openBtn = document.getElementById('openOrderDetails');
            const closeBtn = document.getElementById('closeDrawer');
            const alertBox = document.getElementById('applePayAlert');
            const copyBtn = document.getElementById('copyCheckoutLink');

            function openDrawer() {
                if (!overlay || !drawer) return;
                overlay.classList.remove('hidden');
                requestAnimationFrame(() => drawer.classList.remove('translate-x-[-100%]'));
                document.body.style.overflow = 'hidden';
            }
            function closeDrawer() {
                if (!overlay || !drawer) return;
                drawer.classList.add('translate-x-[-100%]');
                setTimeout(() => overlay.classList.add('hidden'), 250);
                document.body.style.overflow = '';
            }

            openBtn?.addEventListener('click', openDrawer);
            closeBtn?.addEventListener('click', closeDrawer);
            overlay?.addEventListener('click', (e) => {
                if (e.target.hasAttribute('data-close-drawer')) closeDrawer();
            });

            alertBox?.addEventListener('click', (e) => {
                if (e.target && e.target.hasAttribute('data-dismiss-alert')) {
                    alertBox.classList.add('hidden');
                }
            });

            copyBtn?.addEventListener('click', async () => {
                const url = window.location.href;
                try {
                    await navigator.clipboard.writeText(url);
                } catch (err) {
                    const temp = document.createElement('input');
                    temp.value = url;
                    document.body.appendChild(temp);
                    temp.select();
                    document.execCommand('copy');
                    temp.remove();
                }
            });

            const shippingBtn = document.getElementById('toggleShipping');
            const shippingPanel = document.getElementById('shippingPanel');
            const payBtn = document.getElementById('togglePayment');
            const payPanel = document.getElementById('paymentPanel');

            shippingBtn?.addEventListener('click', () => {
                shippingPanel?.classList.toggle('hidden');
            });
            payBtn?.addEventListener('click', () => {
                payPanel?.classList.toggle('hidden');
            });
        </script>
    @endpush
</x-layouts.app>
