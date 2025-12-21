@push('head')
    <script>
        // Safety for snippets expecting a global tailwind config object.
        window.tailwind = window.tailwind || {};
        window.tailwind.config = window.tailwind.config || {};
    </script>
@endpush
<x-layouts.app>
    <div class="bg-white">
        <!-- Mobile filter dialog -->
        <el-dialog>
            <dialog id="mobile-filters" class="overflow-hidden backdrop:bg-transparent lg:hidden">
                <el-dialog-backdrop class="fixed inset-0 bg-black/25 transition-opacity duration-300 ease-linear data-closed:opacity-0"></el-dialog-backdrop>

                <div tabindex="0" class="fixed inset-0 flex focus:outline-none">
                    <el-dialog-panel class="relative ml-auto flex size-full max-w-xs transform flex-col overflow-y-auto bg-white pt-4 pb-6 shadow-xl transition duration-300 ease-in-out data-closed:translate-x-full">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                            <button type="button" command="close" commandfor="mobile-filters" class="relative -mr-2 flex size-10 items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:outline-hidden">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Close menu</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                                    <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>

                        <!-- Filters -->
                        <form class="mt-4 border-t border-gray-200">
                            <h3 class="sr-only">Categories</h3>
                            <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                                <li>
                                    <a href="#" class="block px-2 py-3">Totes</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Backpacks</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Travel Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Hip Bags</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-3">Laptop Sleeves</a>
                                </li>
                            </ul>


                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <button type="button" command="--toggle" commandfor="filter-section-mobile-color" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500">
                                        <span class="font-medium text-gray-900">Color</span>
                                        <span class="ml-6 flex items-center">
                                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 in-aria-expanded:hidden">
                                                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 not-in-aria-expanded:hidden">
                                                <path d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z" clip-rule="evenodd" fill-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <el-disclosure id="filter-section-mobile-color" hidden class="block pt-6">
                                    <div class="space-y-6">
                                        @foreach ([['Black','black'],['Gray','gray'],['Multicolor','multicolor'],['Clear','clear']] as [$label,$value])
                                            <div class="flex gap-3">
                                                <div class="flex h-5 shrink-0 items-center">
                                                    <div class="group grid size-4 grid-cols-1">
                                                        <input id="filter-mobile-color-{{ $value }}" type="checkbox" name="color[]" value="{{ $value }}" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <label for="filter-mobile-color-{{ $value }}" class="min-w-0 flex-1 text-gray-500">{{ $label }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </el-disclosure>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <button type="button" command="--toggle" commandfor="filter-section-mobile-category" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500">
                                        <span class="font-medium text-gray-900">Category</span>
                                        <span class="ml-6 flex items-center">
                                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 in-aria-expanded:hidden">
                                                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 not-in-aria-expanded:hidden">
                                                <path d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z" clip-rule="evenodd" fill-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <el-disclosure id="filter-section-mobile-category" hidden class="block pt-6">
                                    <div class="space-y-6">
                                        @foreach ([['Interior','interior'],['Storage','storage'],['Electronics','electronics'],['Car Care','car care'],['Tools','tools']] as [$label,$value])
                                            <div class="flex gap-3">
                                                <div class="flex h-5 shrink-0 items-center">
                                                    <div class="group grid size-4 grid-cols-1">
                                                        <input id="filter-mobile-category-{{ $value }}" type="checkbox" name="category[]" value="{{ $value }}" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                            <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <label for="filter-mobile-category-{{ $value }}" class="min-w-0 flex-1 text-gray-500">{{ $label }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </el-disclosure>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-6">
                                <h3 class="-mx-2 -my-3 flow-root">
                                    <button type="button" command="--toggle" commandfor="filter-section-mobile-size" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500">
                                        <span class="font-medium text-gray-900">Size</span>
                                        <span class="ml-6 flex items-center">
                                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 in-aria-expanded:hidden">
                                                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                            </svg>
                                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 not-in-aria-expanded:hidden">
                                                <path d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z" clip-rule="evenodd" fill-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </h3>
                                <el-disclosure id="filter-section-mobile-size" hidden class="block pt-6">
                                    <div class="space-y-6">
                                        <div class="flex gap-3">
                                            <div class="flex h-5 shrink-0 items-center">
                                                <div class="group grid size-4 grid-cols-1">
                                                    <input id="filter-mobile-size-0" type="checkbox" name="size[]" value="2l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                    <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                        <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                        <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-0" class="min-w-0 flex-1 text-gray-500">2L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex h-5 shrink-0 items-center">
                                                <div class="group grid size-4 grid-cols-1">
                                                    <input id="filter-mobile-size-1" type="checkbox" name="size[]" value="6l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                    <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                        <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                        <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-1" class="min-w-0 flex-1 text-gray-500">6L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex h-5 shrink-0 items-center">
                                                <div class="group grid size-4 grid-cols-1">
                                                    <input id="filter-mobile-size-2" type="checkbox" name="size[]" value="12l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                    <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                        <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                        <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-2" class="min-w-0 flex-1 text-gray-500">12L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex h-5 shrink-0 items-center">
                                                <div class="group grid size-4 grid-cols-1">
                                                    <input id="filter-mobile-size-3" type="checkbox" name="size[]" value="18l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                    <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                        <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                        <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-3" class="min-w-0 flex-1 text-gray-500">18L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex h-5 shrink-0 items-center">
                                                <div class="group grid size-4 grid-cols-1">
                                                    <input id="filter-mobile-size-4" type="checkbox" name="size[]" value="20l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                    <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                        <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                        <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-4" class="min-w-0 flex-1 text-gray-500">20L</label>
                                        </div>
                                        <div class="flex gap-3">
                                            <div class="flex h-5 shrink-0 items-center">
                                                <div class="group grid size-4 grid-cols-1">
                                                    <input id="filter-mobile-size-5" type="checkbox" name="size[]" value="40l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                    <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                        <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                        <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <label for="filter-mobile-size-5" class="min-w-0 flex-1 text-gray-500">40L</label>
                                        </div>
                                    </div>
                                </el-disclosure>
                            </div>
                        </form>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>


        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-200 pt-24 pb-6">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900">New Arrivals</h1>

                <div class="flex items-center">
                    <el-dropdown class="relative inline-block text-left">
                        <button class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                            Sort
                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500">
                                <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </button>

                        <el-menu anchor="bottom end" popover class="w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] focus:outline-hidden data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                            <div class="py-1">
                                <a href="#" data-sort="popular" class="block px-4 py-2 text-sm font-medium text-gray-900 focus:bg-gray-100 focus:outline-hidden">Most Popular</a>
                                <a href="#" data-sort="rating" class="block px-4 py-2 text-sm text-gray-500 focus:bg-gray-100 focus:outline-hidden">Best Rating</a>
                                <a href="#" data-sort="newest" class="block px-4 py-2 text-sm text-gray-500 focus:bg-gray-100 focus:outline-hidden">Newest</a>
                                <a href="#" data-sort="price-asc" class="block px-4 py-2 text-sm text-gray-500 focus:bg-gray-100 focus:outline-hidden">Price: Low to High</a>
                                <a href="#" data-sort="price-desc" class="block px-4 py-2 text-sm text-gray-500 focus:bg-gray-100 focus:outline-hidden">Price: High to Low</a>
                            </div>
                        </el-menu>
                    </el-dropdown>

                    <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                        <span class="sr-only">View grid</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5">
                            <path d="M4.25 2A2.25 2.25 0 0 0 2 4.25v2.5A2.25 2.25 0 0 0 4.25 9h2.5A2.25 2.25 0 0 0 9 6.75v-2.5A2.25 2.25 0 0 0 6.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 2 13.25v2.5A2.25 2.25 0 0 0 4.25 18h2.5A2.25 2.25 0 0 0 9 15.75v-2.5A2.25 2.25 0 0 0 6.75 11h-2.5Zm9-9A2.25 2.25 0 0 0 11 4.25v2.5A2.25 2.25 0 0 0 13.25 9h2.5A2.25 2.25 0 0 0 18 6.75v-2.5A2.25 2.25 0 0 0 15.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 11 13.25v2.5A2.25 2.25 0 0 0 13.25 18h2.5A2.25 2.25 0 0 0 18 15.75v-2.5A2.25 2.25 0 0 0 15.75 11h-2.5Z" clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                    </button>
                    <button type="button" command="show-modal" commandfor="mobile-filters" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5">
                            <path d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 0 1 .628.74v2.288a2.25 2.25 0 0 1-.659 1.59l-4.682 4.683a2.25 2.25 0 0 0-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 0 1 8 18.25v-5.757a2.25 2.25 0 0 0-.659-1.591L2.659 6.22A2.25 2.25 0 0 1 2 4.629V2.34a.75.75 0 0 1 .628-.74Z" clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                    <!-- Filters -->
                    <form class="hidden lg:block">
                        <h3 class="sr-only">Categories</h3>
                        <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                            <li>
                                <a href="#">Totes</a>
                            </li>
                            <li>
                                <a href="#">Backpacks</a>
                            </li>
                            <li>
                                <a href="#">Travel Bags</a>
                            </li>
                            <li>
                                <a href="#">Hip Bags</a>
                            </li>
                            <li>
                                <a href="#">Laptop Sleeves</a>
                            </li>
                        </ul>

                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                                <button type="button" command="--toggle" commandfor="filter-section-color" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                                    <span class="font-medium text-gray-900">Color</span>
                                    <span class="ml-6 flex items-center">
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 in-aria-expanded:hidden">
                                            <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                        </svg>
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 not-in-aria-expanded:hidden">
                                            <path d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z" clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <el-disclosure id="filter-section-color" hidden class="block pt-6">
                                <div class="space-y-4">
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-color-0" type="checkbox" name="color[]" value="white" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-color-0" class="text-sm text-gray-600">White</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-color-1" type="checkbox" name="color[]" value="beige" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-color-1" class="text-sm text-gray-600">Beige</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-color-2" type="checkbox" name="color[]" value="blue" checked class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-color-2" class="text-sm text-gray-600">Blue</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-color-3" type="checkbox" name="color[]" value="brown" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-color-3" class="text-sm text-gray-600">Brown</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-color-4" type="checkbox" name="color[]" value="green" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-color-4" class="text-sm text-gray-600">Green</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-color-5" type="checkbox" name="color[]" value="purple" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-color-5" class="text-sm text-gray-600">Purple</label>
                                    </div>
                                </div>
                            </el-disclosure>
                        </div>

                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                                <button type="button" command="--toggle" commandfor="filter-section-category" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                                    <span class="font-medium text-gray-900">Category</span>
                                    <span class="ml-6 flex items-center">
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 in-aria-expanded:hidden">
                                            <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                        </svg>
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 not-in-aria-expanded:hidden">
                                            <path d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z" clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <el-disclosure id="filter-section-category" hidden class="block pt-6">
                                <div class="space-y-4">
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-category-0" type="checkbox" name="category[]" value="new-arrivals" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-category-0" class="text-sm text-gray-600">New Arrivals</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-category-1" type="checkbox" name="category[]" value="sale" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-category-1" class="text-sm text-gray-600">Sale</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-category-2" type="checkbox" name="category[]" value="travel" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-category-2" class="text-sm text-gray-600">Travel</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-category-3" type="checkbox" name="category[]" value="organization" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-category-3" class="text-sm text-gray-600">Organization</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-category-4" type="checkbox" name="category[]" value="accessories" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-category-4" class="text-sm text-gray-600">Accessories</label>
                                    </div>
                                </div>
                            </el-disclosure>
                        </div>
                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                                <button type="button" command="--toggle" commandfor="filter-section-size" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                                    <span class="font-medium text-gray-900">Size</span>
                                    <span class="ml-6 flex items-center">
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 in-aria-expanded:hidden">
                                            <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                        </svg>
                                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5 not-in-aria-expanded:hidden">
                                            <path d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z" clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <el-disclosure id="filter-section-size" hidden class="block pt-6">
                                <div class="space-y-4">
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-size-0" type="checkbox" name="size[]" value="2l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-size-0" class="text-sm text-gray-600">2L</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-size-1" type="checkbox" name="size[]" value="6l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-size-1" class="text-sm text-gray-600">6L</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-size-2" type="checkbox" name="size[]" value="12l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-size-2" class="text-sm text-gray-600">12L</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-size-3" type="checkbox" name="size[]" value="18l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-size-3" class="text-sm text-gray-600">18L</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-size-4" type="checkbox" name="size[]" value="20l" class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-size-4" class="text-sm text-gray-600">20L</label>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input id="filter-size-5" type="checkbox" name="size[]" value="40l" checked class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label for="filter-size-5" class="text-sm text-gray-600">40L</label>
                                    </div>
                                </div>
                            </el-disclosure>
                        </div>
                    </form>

                    <!-- Product grid -->
                    <div class="lg:col-span-3">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" data-product-grid>
                            @php
                                $products = [
                                    [
                                        'id' => 1,
                                        'name' => 'Premium Leather Seat Covers',
                                        'description' => 'Transform your car interior with our premium leather seat covers. Designed for durability and maximum comfort, these covers are breathable, water-resistant, and easy to clean.',
                                        'price' => 189.99,
                                        'image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=800&q=80',
                                        'category' => 'Interior',
                                        'color' => 'black',
                                        'size' => 'standard',
                                        'badge' => 'Best Seller',
                                    ],
                                    [
                                        'id' => 2,
                                        'name' => 'All-Weather Floor Mats Pro',
                                        'description' => 'Heavy-duty protection for your vehicle floor. Deep channels trap water, mud, and debris. Custom fit for most sedans and SUVs.',
                                        'price' => 49.99,
                                        'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?w=800&q=80',
                                        'category' => 'Interior',
                                        'color' => 'black',
                                        'size' => 'standard',
                                        'badge' => 'Best Seller',
                                    ],
                                    [
                                        'id' => 3,
                                        'name' => 'Smart Trunk Organizer',
                                        'description' => 'Keep your trunk clutter-free. Collapsible design with multiple compartments, sturdy handles, and non-slip bottom strips.',
                                        'price' => 34.99,
                                        'image' => 'https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?w=800&q=80',
                                        'category' => 'Storage',
                                        'color' => 'gray',
                                        'size' => 'standard',
                                        'badge' => null,
                                    ],
                                    [
                                        'id' => 4,
                                        'name' => 'MagSafe Dashboard Mount',
                                        'description' => 'Secure magnetic phone mount with 360-degree rotation. Industrial-strength suction cup adheres to dashboard or windshield.',
                                        'price' => 29.99,
                                        'image' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=800&q=80',
                                        'category' => 'Electronics',
                                        'color' => 'black',
                                        'size' => 'small',
                                        'badge' => 'Best Seller',
                                    ],
                                    [
                                        'id' => 5,
                                        'name' => 'RGB Ambient Lighting Kit',
                                        'description' => 'App-controlled LED interior lights with music sync mode. Choose from 16 million colors to match your mood.',
                                        'price' => 39.99,
                                        'image' => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=800&q=80',
                                        'category' => 'Electronics',
                                        'color' => 'multicolor',
                                        'size' => 'standard',
                                        'badge' => null,
                                    ],
                                    [
                                        'id' => 6,
                                        'name' => 'Ergonomic Steering Wheel Cover',
                                        'description' => 'Enhanced grip and comfort. Protects your steering wheel from wear and tear while keeping your hands warm in winter and cool in summer.',
                                        'price' => 19.99,
                                        'image' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=800&q=80',
                                        'category' => 'Interior',
                                        'color' => 'black',
                                        'size' => 'standard',
                                        'badge' => null,
                                    ],
                                    [
                                        'id' => 7,
                                        'name' => 'HEPA Car Air Purifier',
                                        'description' => 'Eliminate odors, smoke, and allergens. Portable design fits in cup holder. USB powered with quiet operation.',
                                        'price' => 59.99,
                                        'image' => 'https://images.unsplash.com/photo-1556656793-08538906a9f8?w=800&q=80',
                                        'category' => 'Electronics',
                                        'color' => 'white',
                                        'size' => 'small',
                                        'badge' => null,
                                    ],
                                    [
                                        'id' => 8,
                                        'name' => 'Backseat Tablet Organizer',
                                        'description' => 'Perfect for road trips with kids. Holds tablets up to 11 inches, drinks, snacks, and toys. Durable waterproof fabric.',
                                        'price' => 29.99,
                                        'image' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800&q=80',
                                        'category' => 'Storage',
                                        'color' => 'black',
                                        'size' => 'standard',
                                        'badge' => 'Best Seller',
                                    ],
                                    [
                                        'id' => 9,
                                        'name' => 'Ceramic Coating Spray',
                                        'description' => 'Professional grade ceramic coating for high gloss shine and hydrophobic protection.',
                                        'price' => 24.99,
                                        'image' => 'https://images.unsplash.com/photo-1601362840469-51e4d8d58785?w=800&q=80',
                                        'category' => 'Car Care',
                                        'color' => 'clear',
                                        'size' => 'small',
                                        'badge' => 'Best Seller',
                                    ],
                                    [
                                        'id' => 10,
                                        'name' => 'Digital Tire Pressure Gauge',
                                        'description' => 'Accurate readings with backlit LCD display. Essential safety tool for every vehicle.',
                                        'price' => 15.99,
                                        'image' => 'https://images.unsplash.com/photo-1595167440058-20412e87c53d?w=800&q=80',
                                        'category' => 'Tools',
                                        'color' => 'black',
                                        'size' => 'small',
                                        'badge' => null,
                                    ],
                                ];
                            @endphp

                            @foreach ($products as $product)
                                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl h-full flex flex-col"
                                    data-product-card
                                    data-loaded="true"
                                    data-name="{{ $product['name'] }}"
                                    data-price="{{ $product['price'] }}"
                                    data-category="{{ strtolower($product['category']) }}"
                                    data-color="{{ strtolower($product['color'] ?? '') }}"
                                    data-size="{{ strtolower($product['size'] ?? '') }}">
                                    <a class="block relative overflow-hidden h-64 bg-slate-100 group" href="/shop/{{ $product['id'] }}">
                                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        <div class="absolute top-3 right-3 bg-blue-600/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">{{ $product['category'] }}</div>
                                        @if(!empty($product['badge']))
                                            <div class="absolute top-3 left-3 bg-amber-500/90 backdrop-blur-md text-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">{{ $product['badge'] }}</div>
                                        @endif
                                    </a>
                                    <div class="p-5 flex flex-col flex-1">
                                        <a class="hover:text-blue-600 transition-colors" href="/shop/{{ $product['id'] }}">
                                            <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">{{ $product['name'] }}</h3>
                                        </a>
                                        <p class="text-slate-600 text-sm mb-4 line-clamp-2 flex-grow">{{ $product['description'] }}</p>
                                        <div class="flex items-center justify-between mt-auto">
                                            <span class="text-xl font-bold text-blue-600"><x-currency :amount="number_format($product['price'], 2)" /></span>
                                            <button class="inline-flex items-center justify-center text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-primary-foreground h-9 bg-blue-600 hover:bg-blue-700 transition-all duration-300 rounded-full px-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart w-4 h-4 mr-2">
                                                    <circle cx="8" cy="21" r="1"></circle>
                                                    <circle cx="19" cy="21" r="1"></circle>
                                                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                                                </svg>
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="product-sentinel" class="h-10"></div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</x-layouts.app>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const cards = Array.from(document.querySelectorAll('[data-product-card]'));
    const grid = document.querySelector('[data-product-grid]') || document.querySelector('.lg\\:col-span-3 > .grid');
    if (!grid || !cards.length) return;

    const mapCategory = (val) => ({
        'new-arrivals': 'interior',
        'sale': 'storage',
        'travel': 'electronics',
        'organization': 'car care',
        'accessories': 'tools',
    }[val] || val);
    const mapColor = (val) => ({
        'white': 'black',
        'beige': 'gray',
        'blue': 'multicolor',
        'brown': 'clear',
        'green': 'black',
        'purple': 'multicolor',
    }[val] || val);
    const mapSize = (val) => ({
        '2l': 'small',
        '6l': 'small',
        '12l': 'standard',
        '18l': 'standard',
        '20l': 'standard',
        '40l': 'standard',
    }[val] || val);

    const getChecked = (name, mapper = (v) => v) => Array.from(document.querySelectorAll(`input[name="${name}[]"]:checked`)).map(i => mapper(i.value.toLowerCase()));

    const applyFilters = () => {
        const categories = getChecked('category', mapCategory);
        const colors = getChecked('color', mapColor);
        const sizes = getChecked('size', mapSize);

        cards.forEach(card => {
            const matchCategory = !categories.length || categories.includes(card.dataset.category);
            const matchColor = !colors.length || colors.includes(card.dataset.color);
            const matchSize = !sizes.length || sizes.includes(card.dataset.size);
            card.style.display = (matchCategory && matchColor && matchSize) ? '' : 'none';
        });
    };

    const applySort = (sort) => {
        const visibleCards = cards.filter(c => c.style.display !== 'none');
        const sorter = {
            'price-asc': (a,b) => parseFloat(a.dataset.price) - parseFloat(b.dataset.price),
            'price-desc': (a,b) => parseFloat(b.dataset.price) - parseFloat(a.dataset.price),
            'name-asc': (a,b) => a.dataset.name.localeCompare(b.dataset.name),
        }[sort];
        if (!sorter) return;
        visibleCards.sort(sorter).forEach(card => grid.appendChild(card));
    };

    document.querySelectorAll('input[name="category[]"], input[name="color[]"], input[name="size[]"]').forEach(input => {
        input.addEventListener('change', applyFilters, { passive: true });
    });

    document.querySelectorAll('[data-sort]').forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const sort = link.dataset.sort;
            if (sort === 'newest' || sort === 'popular' || sort === 'rating') return; // not implemented
            applySort(sort);
        });
    });

    applyFilters();

    // Products are already rendered; keep the sentinel only if you want lazy-load effects later.
});
</script>
@endpush
