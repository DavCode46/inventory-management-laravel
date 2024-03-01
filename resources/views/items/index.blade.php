<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-xl rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-200 border-b border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">List of Items</h3>
                </div>
                <div class="px-6 py-4">
                    <a href="{{ route('items.create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 w-20 rounded">
                        Add New Item
                    </a>
                </div>
                <div class="px-6 py-4">
                    <div class="px-6 py-4">
                        <form action="{{ route('items.search') }}" method="GET" id="searchForm">
                            <input type="text" id="searchInput" name="q" placeholder="Search items..." class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <button type="submit" class="inline-block px-4 py-2 bg-indigo-500 text-white font-bold rounded-md ml-2 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100">Search</button>
                        </form>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow overflow-hidden sm:rounded-lg border border-gray-300 items-table">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Description</th>
                                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Picture</th>
                                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Box</th>
                                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($items as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm font-medium text-gray-900">{{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-500">{{ $item->description }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-500">
                                            @if ($item->picture)
                                            <img src="{{ $item->picture }}" alt="{{ $item->name }}" class="w-12 h-12 object-cover rounded-full">
                                            @else
                                            <span class="text-gray-400">No Image</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-500">${{ $item->price }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-500">
                                            @if ($item->box_id)
                                            {{ $item->box->label }}
                                            @else
                                            No box
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm text-gray-500 flex">
                                            <a href="{{ route('items.show', $item->id) }}" class="text-blue-600 hover:text-blue-800 mr-4">View</a>
                                            @if ($item->loans->isEmpty())
                                            <a href="{{ route('loans.index', ['itemId' => $item->id]) }}" class="text-zinc-500 hover:text-zinc-800 mr-4">Loan</a>

                                            @else
                                            <a href="{{ route('items.return', $item->id) }}" class="text-zinc-500 hover:text-zinc-800 mr-4">Return</a>
                                            @endif
                                            <a href="{{ route('items.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-800 mr-4">Edit</a>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Detectar cambios en el campo de búsqueda y enviar automáticamente el formulario
        document.getElementById('searchInput').addEventListener('input', function() {
            document.getElementById('searchForm').submit();
        });
    </script>
</x-app-layout>
