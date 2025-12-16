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
<body class="bg-gray-100 text-gray-900 min-h-screen">

   
    @include('partials.top-bar')
    {{-- <livewire:navbar/> --}}
    @include('partials.nav-bar')
    {{-- @include('partials.hero') --}}

    <main class="bg-white expansion-alids-init">
        {{ $slot }}
    </main>


    @include('partials.footer')

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
        alert(event.detail.message);
    });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>
</html>
