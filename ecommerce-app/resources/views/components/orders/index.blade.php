<?php

use App\Models\Country;

$countries = Country::all()->all()

?>

{{-- TODO: Breaking form into blade component --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <form action="/orders" method="POST" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @csrf
            <div class="mx-auto max-w-3xl">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Order summary</h2>

                <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Billing & Delivery information</h4>

                    <dl>
                        <dt class="text-base font-medium text-gray-900 dark:text-white">
                            {{ $user->first_name . ' ' . $user->last_name }}
                        </dt>

                        @if ($defaultAddress)
                            <dd id="selectedAddress" class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">
                                {{ $defaultAddress->address_line1 . ' ' . $defaultAddress->address_line2 . ' ' . $defaultAddress->city . ' ' . $defaultAddress->state . ' ' . $defaultAddress->postal_code }}
                            </dd>
                        @endif
                    </dl>

                    <button type="button" data-modal-target="billingInformationModal"
                        data-modal-toggle="billingInformationModal"
                        class="text-base font-medium text-blue-700 hover:underline dark:text-blue-500">Edit</button>
                </div>

                <div class="mt-6 sm:mt-8">
                    <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                        <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                            @foreach ($orderItems as $orderItem)
                                <x-orders.order-item :orderItem="$orderItem" />
                            @endforeach
                        </table>
                    </div>

                    <div class="mt-4 space-y-6">
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</h4>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Original price</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">${{ $totalPrice }}
                                    </dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Savings</dt>
                                    <dd class="text-base font-medium text-green-500">-$000.00</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Store Pickup</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">$00</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Tax</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">$000</dd>
                                </dl>
                            </div>

                            <dl
                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-lg font-bold text-gray-900 dark:text-white">${{ $totalPrice }}</dd>
                            </dl>
                        </div>

                        <div class="flex items-start sm:items-center">
                            <input id="terms-checkbox-2" type="checkbox" name="terms" value="1"
                                class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                            <label for="terms-checkbox-2"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> I agree with the <a
                                    href="#" title=""
                                    class="text-primary-700 underline hover:no-underline dark:text-primary-500">Terms
                                    and
                                    Conditions</a> of use of the Flowbite marketplace </label>
                        </div>

                        <div class="gap-4 sm:flex sm:items-center">

                            <button type="button"
                                class="w-full rounded-lg  border border-gray-200 bg-white px-5  py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                <a href="{{ route('home.index') }}">
                                    Return to Shopping
                                </a>
                            </button>


                            <!-- Order Details -->
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="order_date" value="{{ now() }}">
                            <input type="hidden" name="address_id"
                                value="{{ $defaultAddress ? $defaultAddress->id : null }}">
                            <input type="hidden" name="order_total" value="{{ $totalPrice }}">

                            <!-- Order Items -->
                            @foreach ($orderItems as $item)
                                <input type="hidden" name="order_items[{{ $loop->index }}][product_id]"
                                    value="{{ $item->product_id }}">
                                <input type="hidden" name="order_items[{{ $loop->index }}][qty]" value="{{ $item->qty }}">
                                <input type="hidden" name="order_items[{{ $loop->index }}][price]"
                                    value="{{ $item->product()->price }}">
                            @endforeach
                            <button type="submit"
                                class="mt-4 flex w-full items-center justify-center rounded-lg bg-blue-700  px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-primary-300  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800 sm:mt-0">Send
                                the order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <div id="billingInformationModal" tabindex="-1" aria-hidden="true"
        class="antialiased fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-auto w-full max-h-full items-center justify-center overflow-y-auto overflow-x-hidden antialiased md:inset-0">
        <div class="relative max-h-auto w-full max-h-full max-w-lg p-4">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 dark:border-gray-700 md:p-5">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Billing Information</h3>
                    <button type="button"
                        class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="billingInformationModal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{ route('address.new') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-5">
                        <!--
                        <div class="flex items-center gap-4 sm:col-span-2">
                            <div class="flex items-center">
                                <input id="company_address_billing_modal"
                                    data-collapse-toggle="company-info-container-modal" aria-expanded="false"
                                    type="checkbox" name="address-type-modal"
                                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                <label for="company_address_billing_modal"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Order as a
                                    company
                                </label>
                            </div>
                        </div>

                        <div class="grid hidden grid-cols-2 gap-4 sm:col-span-2" id="company-info-container-modal">
                            <div>
                                <label for="company_name"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Company name
                                </label>
                                <input type="text" id="company_name"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Flowbite LLC" />
                            </div>

                            <div>
                                <label for="vat_number"
                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> VAT number
                                </label>
                                <input type="text" id="vat_number"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="DE42313253" />
                            </div>
                        </div>
                        -->

                        <!--
                        <div class="sm:col-span-2">
                            <div class="mb-2 flex items-center gap-1">
                                <label for="saved-address-modal"
                                    class="block text-sm font-medium text-gray-900 dark:text-white"> Saved Address
                                </label>
                                <svg data-tooltip-target="saved-address-modal-desc-2" data-tooltip-trigger="hover"
                                    class="h-4 w-4 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <select id="saved-address-modal"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                <option selected>Choose one of your saved address</option>
                                <option value="address-1">San Francisco, California, United States, 3454, Scott Street
                                </option>
                                <option value="address-2">New York, United States, Broadway 10012</option>
                            </select>
                            <div id="saved-address-modal-desc-2" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Choose one of your saved addresses
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div> 
                        </div>
                        -->

                        <div>
                            <label for="first_name"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> First Name*
                            </label>
                            <input type="text" id="first_name" name="first_name"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="Enter your first name" required />
                        </div>

                        <div>
                            <label for="last_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Last Name*
                            </label>
                            <input type="text" id="last_name" name="last_name"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="Enter your last name" required />
                        </div>

                        <div>
                            <div class="mb-2 flex items-center gap-2">
                                <label for="country" class="block text-sm font-medium text-gray-900 dark:text-white">
                                    Country* </label>
                            </div>
                            <select id="country" name="country"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <div class="mb-2 flex items-center gap-2">
                                <label for="state" class="block text-sm font-medium text-gray-900 dark:text-white">
                                    State*
                                </label>
                            </div>
                            <x-text-input id="state" name="state" placeholder="Enter here your state"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                            </x-text-input>
                        </div>

                        <div>
                            <div class="mb-2 flex items-center gap-2">
                                <label for="city" class="block text-sm font-medium text-gray-900 dark:text-white"> City*
                                </label>
                            </div>
                            <x-text-input id="city" name="city" placeholder="Enter here your city"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                            </x-text-input>
                        </div>

                        <div>
                            <div class="mb-2 flex items-center gap-2">
                                <label for="street" class="block text-sm font-medium text-gray-900 dark:text-white">
                                    Street*
                                </label>
                            </div>
                            <x-text-input id="street" name="street" placeholder="Enter here your street"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                            </x-text-input>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Shipping Address*
                            </label>
                            <textarea id="address" rows="4" name="address"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="Enter here your address"></textarea>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4 dark:border-gray-700 md:pt-5">
                        <button type="submit"
                            class="me-2 inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800">Save
                            information</button>
                        <button type="button" data-modal-toggle="billingInformationModal"
                            class="me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>