<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Boxes') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-xl rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-200 border-b border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">List of Boxes</h3>
                </div>
                <div class="px-6 py-4">
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow overflow-hidden sm:rounded-lg border border-gray-300">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Label</th>
                                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Location</th>
                                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($boxes as $box)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm font-medium text-gray-900">{{ $box->label }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-500">{{ $box->location }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-500">
                                            <a href="{{ route('boxes.show', $box->id) }}" class="bg-indigo-500 hover:bg-indigo-600 mr-4 text-white px-4 py-3 rounded-md">View</a>
                                            <a href="{{ route('boxes.edit', $box->id) }}" class="bg-yellow-500 hover:bg-yellow-600 mr-4 text-white px-4 py-3 rounded-md">Edit</a>
                                            <form action="{{ route('boxes.destroy', $box->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-md">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <a href="{{ route('boxes.create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-indigo-300">Create New Box</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
