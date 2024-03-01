<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-center text-gray-800">
            Edit Item: {{ $item->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto px-4">
            <div class="bg-gray-100 rounded-lg shadow-md p-6">
                <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Name:</label>
                        <input type="text" name="name" id="name" value="{{ $item->name }}" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-semibold mb-2">Description:</label>
                        <textarea name="description" rows="5" id="description" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200" style="resize: none;">{{ $item->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="picture" class="block text-gray-700 font-semibold mb-2">Picture:</label>
                        <input type="file" name="picture" id="picture" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 font-semibold mb-2">Price:</label>
                        <input type="number" name="price" id="price" value="{{ $item->price }}" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    </div>

                    <div class="mb-4">
                        <label for="box" class="block text-gray-700 font-semibold mb-2">Box:</label>
                        <select name="box_id" id="box" class="w-full border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                            <option value="">Select a box</option>
                            @foreach ($boxes as $box)
                            <option value="{{ $box->id }}" @if ($box->id === $item->box_id) selected @endif>{{ $box->label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-indigo-300">Update Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
