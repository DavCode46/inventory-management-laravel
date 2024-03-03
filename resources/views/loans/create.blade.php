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
                            <x-label for="user_id" :value="__('User')" />

                            <x-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" :value="old('user_id')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="item_id" :value="__('Item')" />

                            <x-input id="item_id" class="block mt-1 w-full" type="text" name="item_id" :value="old('item_id')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="checkout_date" :value="__('Checkout Date')" />

                            <x-input id="checkout_date" class="block mt-1 w-full" type="date" name="checkout_date" :value="old('checkout_date')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="due_date" :value="__('Due Date')" />

                            <x-input id="due_date" class="block mt-1 w-full" type="date" name="due_date" :value="old('due_date')" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Create Loan') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
