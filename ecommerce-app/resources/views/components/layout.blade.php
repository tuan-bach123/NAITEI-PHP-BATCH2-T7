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
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Soppe</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <ul class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center">
                <li>
                    <a href="#" title="" class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">Home</a>
                </li>
                <li class="shrink-0">
                    <a href="#" title="" class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">Best Sellers</a>
                </li>
                <li class="shrink-0">
                    <a href="#" title="" class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">Gift Ideas</a>
                </li>
                <li class="shrink-0">
                    <a href="#" title="" class="text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">Today's Deals</a>
                </li>
                <li class="shrink-0">
                    <a href="#" title="" class="text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">Sell</a>
                </li>
            </ul>
        </div>

        <!-- Search Bar (Add this to the navbar) -->
        <div class="hidden md:flex md:flex-grow md:justify-center px-4">
            <form action="{{ route('home.index') }}" method="GET" class="relative flex w-full max-w-md">
                <input 
                    type="text"
                    name="search"
                    class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full" 
                    placeholder="Search products..."
                    value="{{ request('search') }}">
                
                @if(is_array(request('categories')))
                    @foreach(request('categories') as $categoryId)
                        <input type="hidden" name="categories[]" value="{{ $categoryId }}">
                    @endforeach
                @endif

                <input type="hidden" name="sort" value="{{ request('sort') }}"> <!-- Keep sorting option -->
                
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <!-- Search Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 text-gray-500">
                        <path d="M10.035,18.069a7.981,7.981,0,0,0,3.938-1.035l3.332,3.332a2.164,2.164,0,0,0,3.061-3.061l-3.332-3.332A8.032,8.032,0,0,0,4.354,4.354a8.034,8.034,0,0,0,5.681,13.715ZM5.768,5.768A6.033,6.033,0,1,1,4,10.035,5.989,5.989,0,0,1,5.768,5.768Z"/>
                    </svg>
                </div>
            </form>
        </div>

        <!-- Right-side buttons (Cart, User, etc.) -->
        @auth
        <div class="flex items-center lg:space-x-2">
            <!-- Cart Button -->
            <button id="myCartDropdownButton1" type="button" onclick="sidebarOpen()"
                class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                <span class="sr-only">Cart</span>
                <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                </svg>
                <span class="hidden sm:flex">My Cart</span>
            </button>

            <!-- User Dropdown -->
            <button id="userDropdownButton1" data-dropdown-toggle="userDropdown1" type="button"
                class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                Account
                <svg class="w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>

            <div>
                <x-cart-side-bar />
            </div>
        </div>
        @endauth

        @guest
        <div class="space-x-6 flex items-center justify-center text-sm font-medium leading-none text-gray-900 dark:text-white">
            <a class="hover:text-primary-700 dark:hover:text-primary-500" href="/register">Sign Up</a>
            <a class="hover:text-primary-700 dark:hover:text-primary-500" href="/login">Log In</a>
        </div>
        @endguest
    </div>
</nav>

        <main>
            {{ $slot }}
        </main>
    </div>
    <script>
    function applySort(sortValue) {
        // Set the sort value in the hidden input field
        document.getElementById('sortInput').value = sortValue;
        
        // Submit the form
        document.getElementById('filterSortForm').submit();
    }
</script>
</body>

</html>