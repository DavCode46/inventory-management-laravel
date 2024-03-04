<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-100 shadow-xl rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-200 border-b border-gray-300">
                    <h3 class="text-lg font-semibold text-gray-800">Loans</h3>
                </div>
                <div class="border rounded-lg p-4 my-4">
                    @if ($loans->isNotEmpty())
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Item</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Checkout Date</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Due Date</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Returned Date</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($loans as $loan)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm">{{ $loan->user->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm">{{ $loan->item->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm">{{ $loan->checkout_date }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm">{{ $loan->due_date }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm">{{ $loan->returned_date }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm">
                                    @if ($loan->returned_date === null)
                                    @if ($loan->user_id === Auth::id())
                                    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-blue-600 hover:underline focus:outline-none">
                                            Mark as Returned
                                        </button>
                                    </form>
                                    @else
                                    <span class="text-red-600">Not returned</span>
                                    @endif
                                    @else
                                    <a href="{{ route('loans.show', $loan->id) }}" class="text-green-600 hover:underline">View Loan</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-gray-500">No loans made.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
