<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marketplace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="m-4">
                        <form method="POST" action="{{ route('category.show') }}">

                            @csrf

                            <x-label for="catID" value="{{ __('Select Category:') }}"/>
                            @if ($categories->isEmpty())
                                <p class="text-sm text-red-500">Uh oh, looks like you didn't add any categories yet :)</p>
                            @endif
                            <div class="grid grid-cols-11 gaps-5">
                                <select name="catID" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm col-span-3">
                                    @foreach ($categories as $count => $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                    @endforeach
                                </select>
                                <x-button class="ml-4 my-1">
                                    {{ __('Show') }}
                                </x-button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
