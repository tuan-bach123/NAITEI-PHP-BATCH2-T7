<x-app-layout>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <div class="text-xl font-semibold">General Overview</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <!-- Orders -->
                <div class="relative bg-gray-100 p-4 rounded-lg">
                    <!-- SVG Icon -->
                    <div class="absolute top-0 right-0 mt-5 mr-5">
                        <svg class="mb-2 h-8 w-8 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                        </svg>
                    </div>
                    <!-- Content -->
                    <div class="text-2xl font-bold">24</div>
                    <div class="text-gray-600">Orders made</div>
                </div>

                <!-- Reviews -->
                <div class="relative bg-gray-100 p-4 rounded-lg">
                    <!-- SVG Icon -->
                    <div class="absolute top-0 right-0 mt-5 mr-5">
                        <svg class="mb-2 h-8 w-8 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z" />
                        </svg>
                    </div>
                    <!-- Content -->
                    <div class="text-2xl font-bold">16</div>
                    <div class="text-gray-600">Reviews added</div>
                </div>
                <!-- Favorite products -->
                <div class="relative bg-gray-100 p-4 rounded-lg">
                    <!-- SVG Icon -->
                    <div class="absolute top-0 right-0 mt-5 mr-5">
                        <svg class="mb-2 h-8 w-8 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                        </svg>     
                    </div>      
                    <!-- Content -->               
                    <div class="text-2xl font-bold">8</div>
                    <div class="text-gray-600">Favorite products added</div>
                </div>
                <!-- Product returns -->
                <div class="relative bg-gray-100 p-4 rounded-lg">
                    <!-- SVG Icon -->
                    <div class="absolute top-0 right-0 mt-5 mr-5">
                        <svg class="mb-2 h-8 w-8 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4" />
                        </svg>
                    </div>
                    <!-- Content -->
                    <div class="text-2xl font-bold">2</div>
                    <div class="text-gray-600">Product returns</div>
                </div>
            </div>
            <div class="py-0 md:py-8">
            <hr class="my-6 border-gray-300">

            <!-- Profile Information -->
            <div class="flex justify-between items-center mb-4">
                <div class="text-xl font-semibold">Profile Information</div>
            </div>
            <div class="py-4 md:py-8">
            <div class="mb-4 grid gap-4 sm:grid-cols-2 sm:gap-8 lg:gap-16">
                <div class="space-y-4">
                    <div class="flex space-x-4">
                    <img class="h-16 w-16 rounded-lg"
                        src="{{ file_exists(public_path('images/' . Auth::user()->id . '.jpg')) ? asset('images/' . Auth::user()->id . '.jpg') : 'https://www.svgrepo.com/show/452030/avatar-default.svg' }}" alt="Avatar" />
                        <div>
                            <h2 class="flex items-center text-xl font-bold leading-none text-gray-900 dark:text-white sm:text-2xl">{{ Auth::user()->username }}</h2>
                        </div>
                    </div>
                    <dl class="">
                        <dt class="font-semibold text-gray-900 dark:text-white">First Name</dt>
                        <dd class="text-gray-500 dark:text-gray-400">{{ Auth::user()->first_name }}</dd>
                    </dl>
                    <dl class="">
                        <dt class="font-semibold text-gray-900 dark:text-white">Last Name</dt>
                        <dd class="text-gray-500 dark:text-gray-400">{{ Auth::user()->last_name }}</dd>
                    </dl>
                    <dl class="">
                        <dt class="font-semibold text-gray-900 dark:text-white">Email Address</dt>
                        <dd class="text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</dd>
                    </dl>
                </div>
                <div class="space-y-4">
                    <dl>
                        <dt class="font-semibold text-gray-900 dark:text-white">Phone Number</dt>
                        <dd class="text-gray-500 dark:text-gray-400">{{ Auth::user()->telephone }}</dd>
                    </dl>
                    <dl>
                        <dt class="font-semibold text-gray-900 dark:text-white">Favorite pick-up point</dt>
                        <dd class="flex items-center gap-1 text-gray-500 dark:text-gray-400">
                            <svg class="hidden h-5 w-5 shrink-0 text-gray-400 dark:text-gray-500 lg:inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z"
                                />
                            </svg>
                            Herald Square, 2, New York, United States of America
                        </dd>
                    </dl>
                    <dl>
                        <dt class="font-semibold text-gray-900 dark:text-white">My Companies</dt>
                        <dd class="text-gray-500 dark:text-gray-400">FLOWBITE LLC, Fiscal code: 18673557</dd>
                    </dl>
                    <dl>
                        <dt class="mb-1 font-semibold text-gray-900 dark:text-white">Payment Methods</dt>
                        <dd class="flex items-center space-x-4 text-gray-500 dark:text-gray-400">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-700">
                                <img class="h-4 w-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg" alt="" />
                                <img class="hidden h-4 w-auto dark:flex" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa-dark.svg" alt="" />
                            </div>
                            <div>
                                <div class="text-sm">
                                    <p class="mb-0.5 font-medium text-gray-900 dark:text-white">Visa ending in 7658</p>
                                    <p class="font-normal text-gray-500 dark:text-gray-400">Expiry 10/2024</p>
                                </div>
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
            <button type="button" data-modal-target="accountInformationModal2" data-modal-toggle="accountInformationModal2" class="inline-flex w-7 items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:w-auto">
                <svg class="-ms-0.5 me-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"></path>
                </svg>
                <a href="{{ route('profile.edit') }}">Edit your data</a>
            </button>
        </div>
        </div>
    </div>
</div>
</x-app-layout>
