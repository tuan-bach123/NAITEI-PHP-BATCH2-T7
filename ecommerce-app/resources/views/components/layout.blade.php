<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soppe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
        <nav class="bg-white dark:bg-gray-800 antialiased">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-8">
                    <div class="shrink-0">
                        <a href="/" class="flex ms-2 md:me-24">
                            <span
                                class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Soppe</span>
                        </a>
                    </div>

                    <ul class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center">
                        <li>
                            <a href="/" title=""
                                class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                                {{__('Home')}}
                            </a>
                        </li>
                        <li class="shrink-0">
                            <a href="#" title=""
                                class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                                {{__('Best Sellers')}}
                            </a>
                        </li>
                        <li class="shrink-0">
                            <a href="#" title=""
                                class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                                {{__('Gift Ideas')}}
                            </a>
                        </li>
                        <li class="shrink-0">
                            <a href="#" title=""
                                class="text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                                {{__('Today\'s Deals')}}
                            </a>
                        </li>
                        <li class="shrink-0">
                            <a href="#" title=""
                                class="text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                                {{__('Sell')}}
                            </a>
                        </li>
                    </ul>
                </div>

                @auth
                    <div class="flex items-center lg:space-x-2">
                        <button id="myCartDropdownButton1" type="button" onclick="sidebarOpen()"
                            class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                            <span class="sr-only">
                                Cart
                            </span>

                            <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                            </svg>
                            <span class="hidden sm:flex">{{__('My Cart')}}</span>
                        </button>

                        <div id="myCartDropdown1"
                            class="hidden z-10 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800">
                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                        iPhone 15</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$599
                                    </p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1
                                    </p>

                                    <button data-tooltip-target="tooltipRemoveItem1a" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem1a" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                        iPad Air</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$499
                                    </p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1
                                    </p>

                                    <button data-tooltip-target="tooltipRemoveItem2a" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem2a" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                        Watch SE</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">
                                        $598</p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 2
                                    </p>

                                    <button data-tooltip-target="tooltipRemoveItem3b" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem3b" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Sony
                                        Playstation 5</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">
                                        $799</p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1
                                    </p>

                                    <button data-tooltip-target="tooltipRemoveItem4b" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem4b" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                        iMac 20"</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">
                                        $8,997</p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 3
                                    </p>

                                    <button data-tooltip-target="tooltipRemoveItem5b" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem5b" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <a href="#" title=""
                                class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                role="button"> Proceed to Checkout </a>
                        </div>


                        <button id="userDropdownButton1" data-dropdown-toggle="userDropdown1" type="button"
                            class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                            <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            {{__('Account')}}
                            <svg class="w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 9-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="userDropdown1"
                            class="hidden z-10 w-56 divide-y divide-gray-100 overflow-hidden overflow-y-auto rounded-lg bg-white antialiased shadow dark:divide-gray-600 dark:bg-gray-700">
                            <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                                <li><a href="/profile" title=""
                                        class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        {{__('My Account')}} </a></li>
                                <li><a href="/order-details" title=""
                                        class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        {{__('My Orders')}} </a></li>
                                <li><a href="#" title=""
                                        class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        {{__('Settings')}} </a></li>
                                <li><a href="#" title=""
                                        class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        {{__('Favourites')}} </a></li>
                                <li><a href="#" title=""
                                        class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        {{__('Delivery Addresses')}} </a></li>
                                <li><a href="#" title=""
                                        class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        {{__('Billing Data')}} </a></li>
                            </ul>

                            <div class="p-2 text-sm font-medium text-gray-900 dark:text-white">
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button
                                        class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"
                                        type="submit">{{__('Sign Out')}}
                                    </button>

                                </form>
                            </div>
                        </div>

                        <div>
                            <x-cart-side-bar />
                        </div>
                @endauth

                    @guest
                        <div
                            class="space-x-6 flex items-center justify-center text-sm font-medium leading-none text-gray-900 dark:text-white">
                            <a class="hover:text-primary-700 dark:hover:text-primary-500" href="/register">Sign Up</a>
                            <a class="hover:text-primary-700 dark:hover:text-primary-500" href="/login">Log In</a>
                        </div>
                    @endguest

                    <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1"
                        aria-controls="ecommerce-navbar-menu-1" aria-expanded="false"
                        class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md dark:hover:bg-gray-700 p-2 text-gray-900 dark:text-white">

                        <span class="sr-only">
                            Open Menu
                        </span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M5 7h14M5 12h14M5 17h14" />
                        </svg>
                    </button>
                </div>
            </div>

            <div id="ecommerce-navbar-menu-1"
                class="bg-gray-50 dark:bg-gray-700 dark:border-gray-600 border border-gray-200 rounded-lg py-3 hidden px-4 mt-4">
                <ul class="text-gray-900 dark:text-white text-sm font-medium dark:text-white space-y-3">
                    <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Home</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Best
                            Sellers</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Gift
                            Ideas</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Games</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Electronics</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Home &
                            Garden</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main>
            {{ $slot }}
        </main>
    </div>

    <footer class="bg-white antialiased dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="border-b border-gray-100 py-6 dark:border-gray-700 md:py-8 lg:py-16">
                <div class="items-start gap-6 md:gap-8 lg:flex 2xl:gap-24">
                    <div class="grid min-w-0 flex-1 grid-cols-2 gap-6 md:gap-8 xl:grid-cols-3">
                        <div>
                            <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Company</h6>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        About </a>
                                </li>

                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        Premium </a>
                                </li>

                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        Blog </a>
                                </li>

                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        Affiliate Program </a>
                                </li>

                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        Get Coupon </a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Order &
                                Purchases</h6>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Order
                                        Status</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Track
                                        Your
                                        Order</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Purchase
                                        History</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Returns
                                        &
                                        Refunds</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Payment
                                        Methods</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Support &
                                Services</h6>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Contact
                                        Support</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">FAQs</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Service
                                        Centers</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Warranty
                                        Information</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Product
                                        Manuals</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Partnerships
                            </h6>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Partner
                                        With Us</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Become
                                        a
                                        Supplier</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Affiliate
                                        Program</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Collaboration
                                        Opportunities</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Sponsorship
                                        Requests</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Payment
                                Options</h6>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Credit
                                        & Debit
                                        Cards</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">PayPal</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Bank
                                        Transfers</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Installment
                                        Plans</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Gift
                                        Cards</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Rewards</h6>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Reward
                                        Points</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Referral
                                        Program</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">VIP
                                        Membership</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Exclusive
                                        Offers</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Redeem
                                        Rewards</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Trade
                                Assurance</h6>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">What
                                        is Trade
                                        Assurance?</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">How
                                        It Works</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Buyer
                                        Protection</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Seller
                                        Guarantee</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">FAQs</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Sell on
                                Flowbite</h6>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Seller
                                        Registration</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">How
                                        to Sell</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Seller
                                        Policies</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Seller
                                        Resources</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Seller
                                        Support</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Get Support
                            </h6>
                            <ul class="space-y-3">
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Contact
                                        Us</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Help
                                        Center</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Community
                                        Forums</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Technical
                                        Support</a>
                                </li>
                                <li>
                                    <a href="#" title=""
                                        class="text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Live
                                        Chat</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </footer>
</body>

</html>