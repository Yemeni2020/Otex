<x-layouts.app>
    <main class="flex-grow bg-slate-50">
        <section class="bg-slate-900 text-white py-16">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-2">My Profile</h1>
                <p class="text-slate-300">Manage your personal info and preferences.</p>
            </div>
        </section>

        <section class="container mx-auto px-4 py-12">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h2 class="text-xl font-bold text-slate-900 mb-4">Account Details</h2>
                        <form class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">First Name</label>
                                <input type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="John">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Last Name</label>
                                <input type="text" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Doe">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                                <input type="email" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="you@example.com">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-1">Phone</label>
                                <input type="tel" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="+1 (555) 123-4567">
                            </div>
                            <div class="md:col-span-2">
                                <button class="inline-flex items-center justify-center rounded-full bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 font-semibold transition-colors">Save Changes</button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h2 class="text-xl font-bold text-slate-900 mb-4">Security</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Current Password</label>
                                <input type="password" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">New Password</label>
                                    <input type="password" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Confirm Password</label>
                                    <input type="password" class="w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                            <button class="inline-flex items-center justify-center rounded-full bg-slate-900 hover:bg-blue-700 text-white px-5 py-3 font-semibold transition-colors">Update Password</button>
                        </form>
                    </div>
                </div>

                <aside class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-4">
                    <h3 class="text-lg font-bold text-slate-900">Quick Links</h3>
                    <div class="space-y-3 text-sm">
                        <a class="flex items-center justify-between text-slate-700 hover:text-blue-600" href="/orders">
                            Orders <span aria-hidden="true">→</span>
                        </a>
                        <a class="flex items-center justify-between text-slate-700 hover:text-blue-600" href="/wishlist">
                            Wishlist <span aria-hidden="true">→</span>
                        </a>
                        <a class="flex items-center justify-between text-slate-700 hover:text-blue-600" href="/profile">
                            Profile Settings <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </aside>
            </div>
        </section>
    </main>
</x-layouts.app>
