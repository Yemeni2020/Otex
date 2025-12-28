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
        window.tailwind = window.tailwind || {};
        window.tailwind.config = window.tailwind.config || {};
        window.tailwind.config.darkMode = 'class';
    </script>
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen expansion-alids-init">
    <div id="pageLoader" class="fixed inset-0 z-[9999] flex min-h-screen items-center justify-center bg-[#f5f9ff]">
        <div class="flex flex-col items-center gap-6">
            <div class="relative h-16 w-16">
                <div class="absolute inset-0 rounded-full border-2 border-blue-200"></div>
                <div class="absolute inset-0 rounded-full border-2 border-blue-500 border-t-transparent animate-spin">
                </div>
                <div class="absolute inset-4 rounded-full bg-white shadow-[0_12px_30px_rgba(59,130,246,0.25)]"></div>
            </div>
            <div class="text-xs uppercase tracking-[0.35em] text-blue-400">Loading garage</div>
        </div>
    </div>

    @include('partials.top-bar')
    
    <x-navbar />
    <main class="bg-white expansion-alids-init" style="padding-top: var(--header-stack-height, 0px);">
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    @include('partials.footer')

    <!-- WhatsApp (mobile) -->
    <a href="https://wa.me/966000000000" aria-label="Chat on WhatsApp"
        class="fixed bottom-27 right-4 z-40 inline-flex h-12 w-12 items-center justify-center rounded-full bg-emerald-500 text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-emerald-600 active:translate-y-0 sm:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32" fill="currentColor"
            aria-hidden="true">
            <path
                d="M27.281 4.65c-2.994-3-6.975-4.65-11.219-4.65-8.738 0-15.85 7.112-15.85 15.856 0 2.794 0.731 5.525 2.119 7.925l-2.25 8.219 8.406-2.206c2.319 1.262 4.925 1.931 7.575 1.931h0.006c8.738 0 15.856-7.113 15.856-15.856 0-4.238-1.65-8.219-4.644-11.219zM16.069 29.050v0c-2.369 0-4.688-0.637-6.713-1.837l-0.481-0.288-4.987 1.306 1.331-4.863-0.313-0.5c-1.325-2.094-2.019-4.519-2.019-7.012 0-7.269 5.912-13.181 13.188-13.181 3.519 0 6.831 1.375 9.319 3.862 2.488 2.494 3.856 5.8 3.856 9.325-0.006 7.275-5.919 13.188-13.181 13.188zM23.294 19.175c-0.394-0.2-2.344-1.156-2.706-1.288s-0.625-0.2-0.894 0.2c-0.262 0.394-1.025 1.288-1.256 1.556-0.231 0.262-0.462 0.3-0.856 0.1s-1.675-0.619-3.188-1.969c-1.175-1.050-1.975-2.35-2.206-2.744s-0.025-0.613 0.175-0.806c0.181-0.175 0.394-0.463 0.594-0.694s0.262-0.394 0.394-0.662c0.131-0.262 0.069-0.494-0.031-0.694s-0.894-2.15-1.219-2.944c-0.319-0.775-0.65-0.669-0.894-0.681-0.231-0.012-0.494-0.012-0.756-0.012s-0.694 0.1-1.056 0.494c-0.363 0.394-1.387 1.356-1.387 3.306s1.419 3.831 1.619 4.1c0.2 0.262 2.794 4.269 6.769 5.981 0.944 0.406 1.681 0.65 2.256 0.837 0.95 0.3 1.813 0.256 2.494 0.156 0.762-0.113 2.344-0.956 2.675-1.881s0.331-1.719 0.231-1.881c-0.094-0.175-0.356-0.275-0.756-0.475z">
            </path>
        </svg>
    </a>

    <!-- Scroll to top -->
    <button id="scrollToTop" aria-label="Scroll to top"
        class="scroll-to-top fixed bottom-6 right-4 z-40 !hidden lg:!block transition-opacity duration-300 opacity-0"
        type="button">
        <svg class="progress-circle svg-content" width="56" height="56" viewBox="-1 -1 102 102">
            <path id="scrollToTopPath" d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                class="stroke-[3] stroke-blue-500 fill-white drop-shadow"
                style="stroke-dasharray: 307.919; stroke-dashoffset: 307.919; transition: stroke-dashoffset 0.5s ease;">
            </path>
            <polyline points="50 28 35 45 42 45 42 70 58 70 58 45 65 45 50 28"
                class="fill-blue-500/10 stroke-blue-600 stroke-[3] rounded-sm"></polyline>
        </svg>
    </button>

    <!-- Notifications region -->
    <div role="region" aria-label="Notifications (F8)" tabindex="-1" style="pointer-events: none;">
        <ol id="toastRegion" tabindex="-1"
            class="fixed top-0 z-[100] flex max-h-screen w-full flex-col-reverse p-4 sm:bottom-0 sm:right-0 sm:top-auto sm:flex-col md:max-w-[420px]">
        </ol>
    </div>

    @livewireScripts
    @stack('scripts')
    
    <script>
        const toggle = document.getElementById('toggle');
        const html = document.documentElement;

        if (toggle && window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            html.classList.add('dark');
            toggle.checked = true;
        }

        if (toggle) {
            toggle.addEventListener('change', function() {
                if (this.checked) {
                    html.classList.add('dark');
                } else {
                    html.classList.remove('dark');
                }
            });
        }
    </script>
    <script>
        // Simple Livewire-aware infinite scroll helper.
        document.addEventListener('livewire:init', () => {
            const attach = () => {
                document.querySelectorAll('[data-infinite-scroll]').forEach((section) => {
                    const sentinel = section.querySelector('[data-infinite-scroll-sentinel]');
                    if (!sentinel || sentinel.dataset.infiniteWatching) return;

                    const componentEl = section.closest('[wire\\:id]');
                    if (!componentEl) return;

                    const componentId = componentEl.getAttribute('wire:id');
                    const livewireInstance = () => window.Livewire?.find(componentId);

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                livewireInstance()?.call('loadMore');
                            }
                        });
                    }, {
                        rootMargin: '320px'
                    });

                    sentinel.dataset.infiniteWatching = '1';
                    sentinel._infiniteObserver = observer;
                    observer.observe(sentinel);
                });
            };

            attach();

            // Re-attach after DOM mutations (Livewire morphs).
            const mo = new MutationObserver(() => attach());
            mo.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>

</html>
