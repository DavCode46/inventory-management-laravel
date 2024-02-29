<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Create New Box') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-xl rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-200 border-b border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">New Box Details</h3>
                </div>
                <div class="px-6 py-4">
                    <form action="{{ route('boxes.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="label" class="block text-gray-700 text-sm font-semibold mb-2">Label:</label>
                            <input type="text" name="label" id="label" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 text-sm font-semibold mb-2">Location:</label>
                            <input type="text" name="location" id="location" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-zinc-500 font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Create Box</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
