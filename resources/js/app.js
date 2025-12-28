import './bootstrap';

window.addEventListener('load', () => {
    const loader = document.getElementById('pageLoader');
    if (!loader) return;
    setTimeout(() => loader.classList.add('hidden'), 800);
});

document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('siteHeader');
    const topbar = document.getElementById('siteTopbar');
    const setHeaderOffset = () => {
        const topbarHeight = topbar && !topbar.classList.contains('topbar-hidden') ? topbar.offsetHeight : 0;
        const headerHeight = header ? header.offsetHeight : 0;
        document.documentElement.style.setProperty('--topbar-height', `${topbarHeight}px`);
        document.documentElement.style.setProperty('--header-stack-height', `${topbarHeight + headerHeight}px`);
    };
    setHeaderOffset();
    window.addEventListener('resize', setHeaderOffset);
    if (topbar) {
        let lastScrollY = window.pageYOffset;
        const handleScroll = () => {
            const currentScrollY = window.pageYOffset;
            const scrollingDown = currentScrollY > lastScrollY;
            if (currentScrollY <= 10) {
                topbar.classList.remove('topbar-hidden');
            } else if (scrollingDown) {
                topbar.classList.add('topbar-hidden');
            } else {
                topbar.classList.remove('topbar-hidden');
            }
            lastScrollY = currentScrollY;
            setHeaderOffset();
        };
        handleScroll();
        window.addEventListener('scroll', handleScroll, { passive: true });
    }

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
    const dirToggleButton = document.getElementById('dirToggleButton');
    const dirIconLtr = document.getElementById('dirIconLtr');
    const dirIconRtl = document.getElementById('dirIconRtl');
    const root = document.documentElement;

    // Theme
    const applyTheme = (theme) => {
        root.dataset.theme = theme;
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
    applyTheme(storedTheme || 'light');
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

    // Direction (LTR/RTL)
    const applyDir = (dir) => {
        root.setAttribute('dir', dir);
        if (dirIconLtr && dirIconRtl) {
            if (dir === 'rtl') {
                dirIconLtr.classList.add('hidden');
                dirIconRtl.classList.remove('hidden');
            } else {
                dirIconLtr.classList.remove('hidden');
                dirIconRtl.classList.add('hidden');
            }
        }
    };
    const storedDir = localStorage.getItem('dir');
    applyDir(storedDir || 'ltr');
    if (dirToggleButton) {
        dirToggleButton.addEventListener('click', () => {
            const next = root.getAttribute('dir') === 'rtl' ? 'ltr' : 'rtl';
            localStorage.setItem('dir', next);
            applyDir(next);
        });
    }

    // Let Livewire handle toggling if available.
    if (cartButton) {
        cartButton.addEventListener(
            'click',
            (e) => {
                e.preventDefault();
                if (window.Livewire) {
                    window.Livewire.dispatch('open-cart');
                }
            },
            { passive: true }
        );
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

    const handleAddToCartFeedback = (event) => {
        const button = event.target.closest('[data-add-to-cart]');
        if (!button) return;
        const cartIcon = button.querySelector('[data-cart-icon]');
        const checkIcon = button.querySelector('[data-check-icon]');
        if (!cartIcon || !checkIcon) return;

        cartIcon.classList.add('hidden');
        checkIcon.classList.remove('hidden');

        if (button._cartFeedbackTimer) {
            clearTimeout(button._cartFeedbackTimer);
        }
        button._cartFeedbackTimer = setTimeout(() => {
            cartIcon.classList.remove('hidden');
            checkIcon.classList.add('hidden');
        }, 1400);
    };

    document.addEventListener('click', handleAddToCartFeedback);

    const handleWishlistToggle = (event) => {
        const button = event.target.closest('[data-wishlist]');
        if (!button) return;

        const icon = button.querySelector('svg');
        const isActive = button.getAttribute('aria-pressed') === 'true';
        const nextActive = !isActive;

        button.setAttribute('aria-pressed', nextActive ? 'true' : 'false');
        button.classList.toggle('text-red-500', nextActive);
        button.classList.toggle('text-slate-700', !nextActive);

        if (icon) {
            icon.classList.toggle('fill-current', nextActive);
        }
    };

    document.addEventListener('click', handleWishlistToggle);

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
            if (window.innerWidth < 640) {
                scrollBtn.classList.add('hidden', 'opacity-0');
                return;
            }
            const scroll = window.pageYOffset;
            const height = document.documentElement.scrollHeight - window.innerHeight;
            const progress = pathLength - (scroll * pathLength) / height;
            scrollPath.style.strokeDashoffset = progress;
            const show = scroll > 200;
            scrollBtn.classList.toggle('hidden', !show);
            scrollBtn.classList.toggle('opacity-0', !show);
        };

        updateProgress();
        window.addEventListener('scroll', updateProgress, { passive: true });
        scrollBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }
});

window.addEventListener('notify', (event) => {
    const list = document.getElementById('toastRegion');
    if (!list) return;

    const message = event.detail?.message || 'Notification';
    const item = document.createElement('li');
    item.className =
        'pointer-events-auto mb-3 rounded-lg shadow-lg border border-blue-100 bg-gradient-to-r from-blue-50 to-indigo-50 text-slate-800 overflow-hidden';

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

// Silence noisy message events (keeps first-party messages working)
const shouldBlockMessageEvent = (event) => {
    if (event?.data?.source === 'react-devtools-content-script') return true;
    if (!event.origin || !window.location?.origin) return true;
    return event.origin !== window.location.origin;
};

window.addEventListener(
    'message',
    (event) => {
        if (shouldBlockMessageEvent(event)) {
            event.stopImmediatePropagation();
        }
    },
    true
);

// Quiet console noise globally (leave warnings/errors intact)
['log', 'info', 'debug'].forEach((fn) => {
    if (typeof console?.[fn] === 'function') {
        console[fn] = () => {};
    }
});
