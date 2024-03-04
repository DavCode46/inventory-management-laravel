<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Loan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('loans.store') }}">
                        @csrf

                        <div class="mt-4">
                            <label for="user_id" class="block font-medium text-sm text-gray-700">User</label>
                            <input id="user_id" class="block mt-1 w-full" type="text" name="user_id" value="{{ auth()->user()->id }}" readonly required />
                        </div>

                        <div class="mt-4">
                            <label for="item_id" class="block font-medium text-sm text-gray-700">Item</label>
                            <select id="item_id" name="item_id" class="block mt-1 w-full" required>
                                <option value="">Select Item</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="checkout_date" class="block font-medium text-sm text-gray-700">Checkout Date</label>
                            <input id="checkout_date" class="block mt-1 w-full" type="date" name="checkout_date" value="{{ old('checkout_date') }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="due_date" class="block font-medium text-sm text-gray-700">Due Date</label>
                            <input id="due_date" class="block mt-1 w-full" type="date" name="due_date" value="{{ old('due_date') }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-600 active:bg-indigo-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Create Loan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
