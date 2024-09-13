<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <!-- Modal content -->
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <h3 class="mb-4 text-xl font-semibold text-center text-gray-900 dark:text-white">
                Account Information
            </h3>

            <!-- Modal body -->
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-900 dark:text-white">First Name*</label>
                    <input type="text" id="first_name" name="first_name" value="{{ Auth::user()->first_name }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required />
                </div>

                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium text-gray-900 dark:text-white">Last Name*</label>
                    <input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required />
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-900 dark:text-white">User Name*</label>
                    <input type="text" id="username" name="username" value="{{ Auth::user()->username }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required />
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email*</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required />
                </div>

                <div class="mb-4">
                    <label for="telephone" class="block text-sm font-medium text-gray-900 dark:text-white">Telephone*</label>
                    <input type="telephone" id="telephone" name="telephone" value="{{ Auth::user()->telephone }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required />
                </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-language')
                </div>
            </div>

                <div class="mb-6">
                    <label for="avatar" class="block text-sm font-medium text-gray-900 dark:text-white">Avatar</label>
                    <input type="file" id="avatar" name="avatar" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="rounded-lg bg-primary-700 px-5 py-2.5 text-white text-sm font-medium hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">Save Information</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
