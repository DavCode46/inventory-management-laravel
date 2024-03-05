<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Box Details') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-xl rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-200 border-b border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">Box Information</h3>
                </div>
                <div class="px-6 py-4">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Label</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $box->label }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Location</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $box->location ?: 'Not specified' }}</dd>
                        </div>
                        <!-- Add more details about the box here if needed -->
                    </dl>
                </div>
            </div>

            <div class="py-6 bg-gray-100 shadow-xl rounded-lg overflow-hidden mt-6">
                <div class="px-6 py-4 bg-gray-200 border-b border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">Items Stored in this Box</h3>
                </div>
                <div class="px-6 py-4">
                    @if ($items->isEmpty())
                        <p class="text-sm text-gray-500">No items stored in this box.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach ($items as $item)
                                <li class="py-4">
                                    <div class="flex space-x-3">
                                        <div class="flex-1 space-y-1">
                                            <p class="text-sm font-medium text-gray-900">{{ $item->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $item->description }}</p>
                                        </div>
                                        <!-- Add more item details here if needed -->
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <a href="{{ route('boxes.index')}}" class=" bg-indigo-500 hover:bg-indigo-600 rounded-md text-white py-3 px-4">Boxes</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
