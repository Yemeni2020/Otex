<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otex</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <script>
      tailwind.config = {
        darkMode: 'class', // or 'media' or 'class'
      }
    </script>
    <style>
        :root { color-scheme: light; }
        .dark { color-scheme: dark; }
        .mobile-menu-transition {
            transition: opacity 180ms ease, transform 180ms ease;
        }
        .mobile-menu-open {
            opacity: 1 !important;
            transform: translateY(0) !important;
            pointer-events: auto !important;
        }
        .dark body { background-color: #0f172a; color: #e2e8f0; }
        .dark header { background-color: rgba(15, 23, 42, 0.8); color: #e2e8f0; }
        .dark nav a { color: #e2e8f0; }
        .dark .bg-white { background-color: #0f172a !important; }
        .dark .bg-gray-50,
        .dark .bg-slate-50 { background-color: #0b1428 !important; }
        .dark .text-gray-900,
        .dark .text-slate-900,
        .dark .text-slate-800 { color: #e2e8f0 !important; }
        .dark .text-gray-800,
        .dark .text-slate-700,
        .dark .text-slate-600,
        .dark .text-slate-500 { color: #cbd5e1 !important; }
        .dark .text-gray-700,
        .dark .text-gray-600 { color: #cbd5e1 !important; }
        .dark .border-gray-200 { border-color: #1e293b !important; }
        .dark .border-slate-100,
        .dark .border-slate-200 { border-color: #1e293b !important; }
        .dark .shadow-lg,
        .dark .shadow-xl { box-shadow: 0 10px 30px rgba(0,0,0,0.45) !important; }
        .toggle-checkbox:checked + .toggle-label { background: linear-gradient(90deg, #2563eb, #60a5fa); }
        .toggle-checkbox:checked { right: 0; border-color: #fff; }
        .toggle-checkbox { transition: all 0.3s ease; }
        .toggle-label { transition: background-color 0.3s ease; }
    </style>
    
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen expansion-alids-init dark:bg-slate-900">

   
    @include('partials.top-bar')
    {{-- <livewire:navbar/> --}}
    @include('partials.nav-bar')
    

    <main class="bg-white expansion-alids-init">
        {{ $slot }}
    </main>


    @include('partials.footer')

    <!-- Scroll to top -->
    <button id="scrollToTop" aria-label="Scroll to top" class="scroll-to-top fixed bottom-6 right-4 z-40 hidden transition-opacity duration-300 opacity-0" type="button">
        <svg class="progress-circle svg-content" width="56" height="56" viewBox="-1 -1 102 102">
            <path id="scrollToTopPath" d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" 
                  class="stroke-[3] stroke-blue-500 fill-white drop-shadow"
                  style="stroke-dasharray: 307.919; stroke-dashoffset: 307.919; transition: stroke-dashoffset 0.5s ease;"></path>
             <polyline points="50 28 35 45 42 45 42 70 58 70 58 45 65 45 50 28" class="fill-blue-500/10 stroke-blue-600 stroke-[3] rounded-sm"></polyline>
          </svg>
    </button>

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
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('mobileMenuIconOpen');
        const iconClose = document.getElementById('mobileMenuIconClose');
        const mobileSearchButton = document.getElementById('mobileSearchButton');
        const mobileSearchBar = document.getElementById('mobileSearchBar');
        const themeToggle = document.getElementById('toggle');
        const themeToggleButton = document.getElementById('themeToggleButton');
        const themeIconSun = document.getElementById('themeIconSun');
        const themeIconMoon = document.getElementById('themeIconMoon');
        const root = document.documentElement;

        const applyTheme = (theme) => {
            if (theme === 'dark') {
                root.classList.add('dark');
                if (themeToggle) themeToggle.checked = true;
                if (themeIconSun && themeIconMoon) {
                    themeIconSun.classList.add('hidden');
                    themeIconMoon.classList.remove('hidden');
                }
            } else {
                root.classList.remove('dark');
                if (themeToggle) themeToggle.checked = false;
                if (themeIconSun && themeIconMoon) {
                    themeIconSun.classList.remove('hidden');
                    themeIconMoon.classList.add('hidden');
                }
            }
        };
        const storedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        applyTheme(storedTheme || (prefersDark ? 'dark' : 'light'));
        if (themeToggle) {
            themeToggle.addEventListener('change', (e) => {
                const next = e.target.checked ? 'dark' : 'light';
                localStorage.setItem('theme', next);
                applyTheme(next);
            });
        }
        if (themeToggleButton) {
            themeToggleButton.addEventListener('click', () => {
                const next = root.classList.contains('dark') ? 'light' : 'dark';
                localStorage.setItem('theme', next);
                applyTheme(next);
            });
        }

        // Let Livewire handle toggling if available.
        if (cartButton) {
            cartButton.addEventListener('click', (e) => {
                e.preventDefault();
                if (window.Livewire) {
                    window.Livewire.dispatch('open-cart');
                }
            }, { passive: true });
        }

        // Cart toggles (guarded so other UI still works if cart not on the page)
        if (cartSidebar && closeCart) {
            const close = () => {
                cartSidebar.classList.add('translate-x-full');
                if (cartBackdrop) cartBackdrop.classList.add('hidden');
            };

            closeCart.addEventListener('click', close, { passive: true });
            if (cartBackdrop) {
                cartBackdrop.addEventListener('click', close, { passive: true });
            }
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

        // Scroll-to-top progress
        const scrollBtn = document.getElementById('scrollToTop');
        const scrollPath = document.getElementById('scrollToTopPath');
        if (scrollBtn && scrollPath) {
            const pathLength = scrollPath.getTotalLength();
            scrollPath.style.strokeDasharray = `${pathLength} ${pathLength}`;
            scrollPath.style.strokeDashoffset = pathLength;

            const updateProgress = () => {
                const scroll = window.pageYOffset;
                const height = document.documentElement.scrollHeight - window.innerHeight;
                const progress = pathLength - (scroll * pathLength / height);
                scrollPath.style.strokeDashoffset = progress;
                const show = scroll > 200;
                scrollBtn.classList.toggle('hidden', !show);
                scrollBtn.classList.toggle('opacity-0', !show);
            };

            updateProgress();
            window.addEventListener('scroll', updateProgress, { passive: true });
            scrollBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
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
            <button type="button" aria-label="Close notification" class="text-slate-500 hover:text-slate-700">?</button>
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
    <script>
        const toggle = document.getElementById('toggle');
    const html = document.documentElement;

    if(window.matchMedia && window.matchMedia('(perfers-color-scheme: dark)').matches){
        html.classList('dark');
        toggle.checked = true;
    }
    toggle.addEventListener('change', function(){
        if(this.checked){
            html.classList.add('dark');
        }else{
            html.classList.remove('dark');
        }
    });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>
</html>
