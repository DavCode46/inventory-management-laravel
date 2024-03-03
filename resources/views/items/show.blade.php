<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('View Item') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-xl rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-200 border-b border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">Item Details</h3>
                </div>
                <div class="px-6 py-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Name:</label>
                        <p class="text-gray-900">{{ $item->name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Description:</label>
                        <p class="text-gray-900">{{ $item->description }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Picture:</label>
                        @if ($item->picture)
                            <img src="{{ $item->picture }}" alt="{{ $item->name }}" class="w-64 h-64 object-cover rounded-lg">
                        @else
                            <img src="https://media.istockphoto.com/id/1197121742/es/foto/feliz-perro-shiba-inu-en-amarillo-retrato-de-sonrisa-de-perro-japon%C3%A9s-pelirrojo.jpg?s=612x612&w=0&k=20&c=PsuH8tPrwpZ8erOsqeyUOS6Q6kVQ1Lj0Jf0fsQUCuLQ=" alt="{{ $item->name }}" class="w-64 h-64 object-cover rounded-lg">
                        @endif
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Price:</label>
                        <p class="text-gray-900">${{ $item->price }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Box:</label>
                        <p class="text-gray-900">{{ $item->box->label ?? 'No box' }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Created At:</label>
                        <p class="text-gray-900">{{ $item->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                    <a href="{{ route('items.index')}}" class=" bg-indigo-500 hover:bg-indigo-600 rounded-md text-white py-3 px-4">Items</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
