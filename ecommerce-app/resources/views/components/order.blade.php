@props(
  ['id', 'date', 'total', 'status']
)
<div class="flex flex-wrap items-center gap-y-4 py-6">
	<dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
		<dt class="text-base font-medium text-gray-500 dark:text-gray-400">{{__('Order ID')}}:</dt>
		<dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
			<a href="{{ route('order-details.show', ['orderDetail' => $id]) }}" class="hover:underline">{{ $id }}</a>
		</dd>
	</dl>

	<dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
		<dt class="text-base font-medium text-gray-500 dark:text-gray-400">{{__('Date')}}:</dt>
		<dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $date }}</dd>
	</dl>

	<dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
		<dt class="text-base font-medium text-gray-500 dark:text-gray-400">{{__('Price')}}:</dt>
		<dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">${{ $total }}</dd>
	</dl>
	
	<dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
		<dt class="text-base font-medium text-gray-500 dark:text-gray-400">{{__('Status')}}:</dt>
		<dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">{{ $status }}</dd>
	</dl>

	<div class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">
		@if ($status == "cancelled" || $status == "delivered")
		<button type="button" class="w-full rounded-lg bg-blue-700 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 lg:w-auto">{{__('Order again')}}</button>
		@else
		<form action="{{ route('order-details.update', ['orderDetail' => $id]) }}" method="post">
			@csrf
			@method('PUT')
			<button class="w-full rounded-lg border border-red-700 px-3 py-2 text-center text-sm font-medium text-red-700 hover:bg-red-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900 lg:w-auto">{{__('Cancel order')}}</button>
		</form>
		@endif
		<a href="{{ route('order-details.show', ['orderDetail' => $id]) }}" class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">{{__('View details')}}</a>
	</div>
</div>
