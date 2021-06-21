<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-bold text-lg mb-3 text-center">What item do you want to sell?</h1>

                    <div class="w-full sm:max-w-lg mt-6 mx-auto px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                        <form method="POST" action="{{ route('inventory.update', $item->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="mt-4">
                                <x-label for="item_name" :value="__('Item Name')" />

                                <x-input id="item_name" class="block mt-1 w-full" type="text" name="item_name"
                                    value="{{ $item->item_name }}" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="item_price" :value="__('Item Price')" />

                                <x-input id="item_price" class="block mt-1 w-full" type="number" step="0.01" name="item_price"
                                    value="{{ $item->item_price }}" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="item_available_unit" :value="__('Item Amount')" />

                                <x-input id="item_available_unit" class="block mt-1 w-full" type="text"
                                    name="item_available_unit" value="{{ $item->item_available_unit }}" required />
                            </div>
                            <div class="flex items-center justify-end mt-4">

                                <x-button class="m-4 ">
                                    {{ __('Apply') }}
                                </x-button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
