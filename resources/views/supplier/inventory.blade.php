<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Item table --}}
                    <h1 class="font-bold text-lg mb-3">List of items in your inventory:</h1>
                    <table class="w-full table-fixed border-collapse">
                        <thead>
                            <tr class="bg-green-200">
                                <th class="w-1/12 border-2 border-green-500">No.</th>
                                <th class="w-5/12 border-2 border-green-500">Product Name</th>
                                <th class="w-2/12 border-2 border-green-500">Category</th>
                                <th class="w-2/12 border-2 border-green-500">Price</th>
                                <th class="w-1/12 border-2 border-green-500">Quantity</th>
                                <th class="w-1/6  border-2 border-green-500">Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $count => $item)
                            <tr class="text-center">
                                <td class="border-2 border-green-500">{{ ++$count }}</td>
                                <td class="border-2 border-green-500 text-left pl-3">{{$item->item_name}}</td>
                                <td class="border-2 border-green-500">no</td> {{-- nanti kalau dah siap category leh tambah ni --}}
                                <td class="border-2 border-green-500">RM @convert($item->item_price)</td>
                                <td class="border-2 border-green-500">{{$item->item_available_unit}}</td>
                                <td class="border-2 border-green-500">
                                    <x-button class="my-4">
                                        {{ __('Edit') }}
                                    </x-button>
                                    <x-button class="my-4">
                                        {{ __('Delete') }}
                                    </x-button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
