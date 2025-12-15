<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    const cartButton = document.getElementById('cartButton'); // add id="cartButton" to your cart icon button
    const cartSidebar = document.getElementById('cartSidebar');
    const cartBackdrop = document.getElementById('cartBackdrop');
    const closeCart = document.getElementById('closeCart');

    // Open cart
    cartButton.addEventListener('click', () => {
        cartSidebar.classList.remove('translate-x-full');
        cartBackdrop.classList.remove('hidden');
    });

    // Close cart
    closeCart.addEventListener('click', () => {
        cartSidebar.classList.add('translate-x-full');
        cartBackdrop.classList.add('hidden');
    });

    // Close cart when clicking on backdrop
    cartBackdrop.addEventListener('click', () => {
        cartSidebar.classList.add('translate-x-full');
        cartBackdrop.classList.add('hidden');
    });
    window.addEventListener('notify', event => {
    alert(event.detail.message);
});
</script>
<script>
const sortButton = document.getElementById('sortButton');
const sortMenu = document.getElementById('sortMenu');
const productsContainer = document.getElementById('products');

sortButton.addEventListener('click', () => {
    sortMenu.classList.toggle('hidden');
});

sortMenu.addEventListener('click', (e) => {
    if (!e.target.dataset.sort) return;

    const products = Array.from(productsContainer.children);
    const sortType = e.target.dataset.sort;

    products.sort((a, b) => {
        if (sortType === 'price-asc') {
            return a.dataset.price - b.dataset.price;
        }

        if (sortType === 'price-desc') {
            return b.dataset.price - a.dataset.price;
        }

        if (sortType === 'name-asc') {
            return a.dataset.name.localeCompare(b.dataset.name);
        }
    });

    products.forEach(product => productsContainer.appendChild(product));
    sortMenu.classList.add('hidden');
});

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    if (!sortButton.contains(e.target) && !sortMenu.contains(e.target)) {
        sortMenu.classList.add('hidden');
    }
});

</script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>


</body>
</html>