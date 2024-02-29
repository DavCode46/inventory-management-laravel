<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Create New Item') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-xl rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-200 border-b border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">New Item Details</h3>
                </div>
                <div class="px-6 py-4">
                    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Name:</label>
                            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-semibold mb-2">Description:</label>
                            <textarea name="description" rows="5" id="description" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200" style="resize: none;"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="picture" class="block text-gray-700 text-sm font-semibold mb-2">Picture:</label>
                            <input type="file" name="picture" id="picture" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 text-sm font-semibold mb-2">Price:</label>
                            <input type="number" name="price" id="price" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        </div>

                        <div class="mb-4">
                            <label for="box_id" class="block text-gray-700 text-sm font-semibold mb-2">Box:</label>
                            <select name="box_id" id="box_id" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                                <option value="">Select a box</option>
                                @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-zinc-500 font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Create Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
