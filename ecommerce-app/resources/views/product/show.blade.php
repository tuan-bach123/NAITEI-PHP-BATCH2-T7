<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['name'] }} - My Shop</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navigation Bar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ route('dashboard') }}" class="flex-shrink-0 text-xl font-bold text-gray-800">My Shop</a>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('dashboard') }}" class="text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-medium">Dashboard</a>
                        <a href="#" class="text-gray-500 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium">Shop</a>
                        <a href="#" class="text-gray-500 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div class="flex items-center">
                    @auth
                        <a href="{{ route('profile.edit') }}" class="text-gray-500 hover:text-gray-700">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="ml-4 text-gray-500 hover:text-gray-700">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700">Login</a>
                        <a href="{{ route('register') }}" class="ml-4 text-gray-500 hover:text-gray-700">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Product Details -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-8">
        <!-- Product Image -->
        <div class="w-full lg:w-1/2">
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover rounded-lg shadow-lg">
        </div>

        <!-- Product Info -->
        <div class="w-full lg:w-1/2">
            <h1 class="text-3xl font-bold text-gray-800">{{ $product['name'] }}</h1>
            <p class="mt-4 text-gray-600">{{ $product['description'] }}</p>
            <p class="mt-4 text-2xl font-semibold text-gray-900">{{ $product['price'] }}</p>

            <div class="mt-4 flex items-center">
                <!-- Product Rating -->
                @for ($i = 0; $i < $product['rating']; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801" class="text-yellow-400 fill-current">
                        <path d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z"/>
                    </svg>
                @endfor
                @for ($i = $product['rating']; $i < 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801" class="text-gray-300 fill-current">
                        <path d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z"/>
                    </svg>
                @endfor
                <span class="ml-2 text-gray-600">({{ $product['ratings_count'] }} reviews)</span>
            </div>
        </div>
    </div>

    <!-- Feedback Section -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800">Customer Feedback</h2>

        @forelse ($feedbacks as $feedback)
            <div class="bg-white p-4 mt-4 rounded-lg shadow">
                <div class="flex items-center">
                    <!-- Feedback Rating -->
                    @for ($i = 0; $i < $feedback['rating']; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801" class="text-yellow-400 fill-current">
                            <path d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z"/>
                        </svg>
                    @endfor
                    @for ($i = $feedback['rating']; $i < 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801" class="text-gray-300 fill-current">
                            <path d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z"/>
                        </svg>
                    @endfor
                </div>
                <p class="mt-2 text-gray-600">{{ $feedback['text'] }}</p>
            </div>
        @empty
            <p class="mt-4 text-gray-600">No feedback available for this product.</p>
        @endforelse
    </div>

    <!-- Feedback Form (Visible to Authenticated Users Only) -->
    @auth
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800">Leave Your Feedback</h2>
        <form method="POST" action="#">
            @csrf
            <div class="mt-4">
                <label for="feedback" class="block text-sm font-medium text-gray-700">Your Feedback</label>
                <textarea id="feedback" name="feedback" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
            </div>
            <div class="mt-4">
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                <select id="rating" name="rating" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-700">Submit Feedback</button>
            </div>
        </form>
    </div>
    @endauth

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-8 mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">My Shop</h3>
                    <p class="mt-2">Your one-stop shop for all things cool and trendy.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">Quick Links</h4>
                    <ul class="mt-2 space-y-2">
                        <li><a href="#" class="hover:text-white">Home</a></li>
                        <li><a href="#" class="hover:text-white">Shop</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white">Contact Us</h4>
                    <ul class="mt-2 space-y-2">
                        <li>Email: support@myshop.com</li>
                        <li>Phone: +123 456 7890</li>
                        <li>Address: 123 Main Street, Anytown</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
