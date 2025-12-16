<x-layouts.app>
    <main class="flex-grow">
        <section class="bg-slate-900 text-white py-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-blue-600/10"></div>
            <div class="container mx-auto px-4 relative z-10 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
                <p class="text-lg text-slate-300 max-w-2xl mx-auto">Have a question about products, orders, or partnerships? We are here to help.</p>
            </div>
        </section>

        <section class="py-16 bg-slate-50">
            <div class="container mx-auto px-4 grid lg:grid-cols-2 gap-12">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">Send a Message</h2>
                    <p class="text-slate-600 mb-6">Drop us a note and our support team will get back to you within one business day.</p>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1" for="name">Name</label>
                            <input id="name" type="text" class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Jane Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1" for="email">Email</label>
                            <input id="email" type="email" class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="you@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1" for="topic">Topic</label>
                            <select id="topic" class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>General inquiry</option>
                                <option>Order support</option>
                                <option>Returns & refunds</option>
                                <option>Partnerships</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1" for="message">Message</label>
                            <textarea id="message" rows="5" class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="How can we help?"></textarea>
                        </div>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 font-semibold transition-colors">
                            Send Message
                        </button>
                    </form>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex gap-4 items-start">
                        <div class="h-10 w-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">1</div>
                        <div>
                            <h3 class="font-bold text-slate-900">Email Support</h3>
                            <p class="text-slate-600">support@otex.com</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex gap-4 items-start">
                        <div class="h-10 w-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">2</div>
                        <div>
                            <h3 class="font-bold text-slate-900">Phone</h3>
                            <p class="text-slate-600">+1 (555) 123-4567</p>
                            <p class="text-slate-500 text-sm">Mon - Fri, 9am - 6pm EST</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex gap-4 items-start">
                        <div class="h-10 w-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">3</div>
                        <div>
                            <h3 class="font-bold text-slate-900">Warehouse & HQ</h3>
                            <p class="text-slate-600">123 Performance Drive<br>Detroit, MI 48201</p>
                        </div>
                    </div>
                    <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6">
                        <h3 class="font-bold text-slate-900 mb-2">Need quick answers?</h3>
                        <p class="text-slate-600 mb-4">Visit our FAQ or reach out on live chat for faster help.</p>
                        <div class="flex gap-3">
                            <a href="/faq" class="inline-flex items-center justify-center rounded-full bg-white border border-blue-200 text-blue-700 px-4 py-2 font-medium hover:bg-blue-100 transition-colors">View FAQ</a>
                            <a href="/contact#chat" class="inline-flex items-center justify-center rounded-full bg-blue-600 text-white px-4 py-2 font-medium hover:bg-blue-700 transition-colors">Start Chat</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.app>
