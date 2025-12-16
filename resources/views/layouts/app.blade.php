<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Otex</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <style>
        
    </style>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen expansion-alids-init">

   
    @include('partials.top-bar')
    {{-- <livewire:navbar/> --}}
    @include('partials.nav-bar')
    {{-- @include('partials.hero') --}}

    <main class="bg-white expansion-alids-init">
        {{ $slot }}
    </main>


    @include('partials.footer')

    <!-- Notifications region -->
    <div role="region" aria-label="Notifications (F8)" tabindex="-1" style="pointer-events: none;">
        <ol id="toastRegion" tabindex="-1" class="fixed top-0 z-[100] flex max-h-screen w-full flex-col-reverse p-4 sm:bottom-0 sm:right-0 sm:top-auto sm:flex-col md:max-w-[420px]"></ol>
    </div>

    @livewireScripts
    @stack('scripts')
    <script>
    (() => {
        const cartButton = document.getElementById('cartButton');
        const cartSidebar = document.getElementById('cartSidebar');
        const cartBackdrop = document.getElementById('cartBackdrop');
        const closeCart = document.getElementById('closeCart');

        // Let Livewire handle toggling if available.
        if (cartButton) {
            cartButton.addEventListener('click', (e) => {
                e.preventDefault();
                if (window.Livewire) {
                    window.Livewire.dispatch('open-cart');
                }
            }, { passive: true });
        }

        // If elements aren't present, bail for the DOM toggle helpers.
        if (!cartSidebar || !closeCart) return;

        const open = () => {
            cartSidebar.classList.remove('translate-x-full');
            if (cartBackdrop) cartBackdrop.classList.remove('hidden');
        };
        const close = () => {
            cartSidebar.classList.add('translate-x-full');
            if (cartBackdrop) cartBackdrop.classList.add('hidden');
        };

        closeCart.addEventListener('click', close, { passive: true });
        if (cartBackdrop) {
            cartBackdrop.addEventListener('click', close, { passive: true });
        }
    })();

    window.addEventListener('notify', event => {
        const list = document.getElementById('toastRegion');
        if (!list) return;

        const message = event.detail?.message || 'Notification';
        const item = document.createElement('li');
        item.className = 'pointer-events-auto mb-3 rounded-lg shadow-lg border border-blue-100 bg-gradient-to-r from-blue-50 to-indigo-50 text-slate-800 overflow-hidden';

        const body = document.createElement('div');
        body.className = 'flex items-start gap-3 px-4 py-3';
        body.innerHTML = `
            <div class="mt-0.5 h-2 w-2 rounded-full bg-blue-500"></div>
            <div class="flex-1 text-sm font-medium text-slate-800">${message}</div>
            <button type="button" aria-label="Close notification" class="text-slate-500 hover:text-slate-700">✕</button>
        `;

        const bar = document.createElement('div');
        bar.className = 'h-1 bg-blue-500 w-full';
        bar.style.transition = 'width 3s linear';

        item.appendChild(body);
        item.appendChild(bar);
        list.appendChild(item);

        requestAnimationFrame(() => {
            bar.style.width = '0%';
        });

        const remove = () => {
            item.classList.add('opacity-0', 'transition', 'duration-300');
            setTimeout(() => item.remove(), 300);
        };

        body.querySelector('button').addEventListener('click', remove, { once: true });
        setTimeout(remove, 3000);
    });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>
</html>
