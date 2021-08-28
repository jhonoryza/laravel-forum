<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-blue-500">
                    <tr>
                        <x-table.head>Id</x-table.head>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Slug</x-table.head>
                        <x-table.head class="text-center">Created At</x-table.head>
                        <x-table.head>Action</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($categories as $index => $element)
                    <tr>
                        <x-table.data>
                            <div>{{$index}}</div>
                        </x-table.data>
                        <x-table.data>
                            <div>{{$element->name}}</div>
                        </x-table.data>
                        <x-table.data>
                            <div>{{$element->slug}}</div>
                        </x-table.data>
                        <x-table.data>
                            <div class="text-center">{{$element->createdAt()}}</div>
                        </x-table.data>
                        <x-table.data>
                            <div class="flex justify-center space-x-4">
                                <a href="{{ route('categories.edit', $element) }}" class="text-yellow-400">
                                    <x-zondicon-edit-pencil class="w-5 h-5"/>
                                </a>
                                <x-form action="{{ route('categories.destroy', $element) }}" method="delete">
                                    <button type="submit" class="text-red-400">
                                        <x-zondicon-trash class="w-5 h-5"/>
                                    </button>
                                </x-form>                                
                            </div>
                        </x-table.data>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            {!! $categories->links() !!}
        </div>
    </section>


</x-app-layout>
