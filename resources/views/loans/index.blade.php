@if ($items->isNotEmpty())
    <div class="border rounded-lg p-4 my-4">
        <form action="{{ route('items.lend', ['id' => $item->id]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="item_id" class="block text-sm font-medium text-gray-700">Artículo:</label>
                <select name="item_id" id="item_id" class="border rounded-md px-2 py-1 mt-1">
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="return_date" class="block text-sm font-medium text-gray-700">Fecha de Devolución:</label>
                <input type="date" name="return_date" id="return_date" class="border rounded-md px-2 py-1 mt-1">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Prestar</button>
        </form>
    </div>
@else
    <p>No hay artículos disponibles para préstamo.</p>
@endif
