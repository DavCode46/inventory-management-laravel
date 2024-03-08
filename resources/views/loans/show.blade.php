<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Loan Details') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg p-8">
                <h1 class="text-4xl font-extrabold mb-6 text-gray-800">Loan Details</h1>

                <div class="mb-6">
                    <p class="text-gray-700"><strong>Loan ID:</strong> {{ $loan->id }}</p>
                    <p class="text-gray-700"><strong>Creation Date:</strong> {{ $loan->created_at }}</p>
                    <p class="text-gray-700"><strong>Due Date:</strong> {{ $loan->due_date }}</p>
                    @if($loan->item)
                        <p class="text-gray-700"><strong>Item ID:</strong> {{ $loan->item->id }}</p>
                        <p class="text-gray-700"><strong>Item Name:</strong> {{ $loan->item->name }}</p>
                    @endif
                </div>

                @if(!$loan->returned_date)
                    @if($loan->user_id === Auth::id())
                    <form method="POST" action="{{ route('loans.update', $loan->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="flex justify-center">
                            <button type="submit" class="px-6 py-3 bg-blue-600 rounded-lg text-white font-semibold hover:bg-blue-700 focus:ring-blue-400 focus:ring-opacity-75 transition-colors duration-300">Mark as returned</button>
                        </div>
                    </form>
                    @endif
                @else
                    <div class="mb-6">
                        <p class="text-gray-700"><strong>Returned Date:</strong> {{ $loan->returned_date }}</p>
                    </div>
                    <a href="{{ route('loans.index', $loan->id) }}" class="border text-blue-500 border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-3 rounded-md transition-all duration-300">Loans</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
