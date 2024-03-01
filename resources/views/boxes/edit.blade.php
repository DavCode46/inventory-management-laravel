<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Edit Box') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-xl rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-200 border-b border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">Edit Box Details</h3>
                </div>
                <div class="px-6 py-4">
                    <form action="{{ route('boxes.update', $box->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="label" class="block text-gray-700 text-sm font-semibold mb-2">Label:</label>
                            <input type="text" name="label" id="label" value="{{ $box->label }}" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 text-sm font-semibold mb-2">Location:</label>
                            <input type="text" name="location" id="location" value="{{ $box->location }}" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-indigo-300">Update Box</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
