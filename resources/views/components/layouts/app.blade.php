<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otex</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <style>
        
    </style>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen">

    
    @include('partials.top-bar')
    {{-- <livewire:navbar/> --}}
    @include('partials.nav-bar')
    

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
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('mobileMenuIconOpen');
        const iconClose = document.getElementById('mobileMenuIconClose');
        const mobileSearchButton = document.getElementById('mobileSearchButton');
        const mobileSearchBar = document.getElementById('mobileSearchBar');

        if (cartButton && window.Livewire) {
            cartButton.addEventListener('click', (e) => {
                e.preventDefault();
                window.Livewire.dispatch('open-cart');
            }, { passive: true });
        }

        if (cartSidebar && closeCart) {
            const close = () => {
                cartSidebar.classList.add('translate-x-full');
                if (cartBackdrop) cartBackdrop.classList.add('hidden');
            };
            closeCart.addEventListener('click', close, { passive: true });
            if (cartBackdrop) cartBackdrop.addEventListener('click', close, { passive: true });
        }

        if (mobileMenuButton && mobileMenu) {
            const openMenu = () => {
                mobileMenu.classList.remove('hidden');
                requestAnimationFrame(() => {
                    mobileMenu.classList.add('mobile-menu-open');
                    mobileMenu.classList.remove('pointer-events-none');
                });
                if (iconOpen && iconClose) {
                    iconOpen.classList.add('hidden');
                    iconClose.classList.remove('hidden');
                }
            };
            const closeMenu = () => {
                mobileMenu.classList.remove('mobile-menu-open');
                mobileMenu.classList.add('pointer-events-none');
                setTimeout(() => mobileMenu.classList.add('hidden'), 180);
                if (iconOpen && iconClose) {
                    iconOpen.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                }
            };
            let menuOpen = false;
            mobileMenuButton.addEventListener('click', (e) => {
                e.preventDefault();
                menuOpen ? closeMenu() : openMenu();
                menuOpen = !menuOpen;
            });
        }

        if (mobileSearchButton && mobileSearchBar) {
            const openSearch = () => {
                mobileSearchBar.classList.remove('hidden');
                requestAnimationFrame(() => {
                    mobileSearchBar.classList.add('mobile-menu-open');
                    mobileSearchBar.classList.remove('pointer-events-none');
                });
            };
            const closeSearch = () => {
                mobileSearchBar.classList.remove('mobile-menu-open');
                mobileSearchBar.classList.add('pointer-events-none');
                setTimeout(() => mobileSearchBar.classList.add('hidden'), 180);
            };
            let searchOpen = false;
            mobileSearchButton.addEventListener('click', (e) => {
                e.preventDefault();
                searchOpen ? closeSearch() : openSearch();
                searchOpen = !searchOpen;
            });
        }
    })();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>


</body>
</html>
