<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <x-partials.sidenav />

        <section class="flex flex-col col-span-3 gap-y-4">
            <small class="text-sm text-gray-400">discussion>create</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1">
                        <x-user.avatar :user="null" />
                    </div>

                    {{-- Create --}}
                    <div class="col-span-7 space-y-6">
                        <x-form action="{{ route('threads.store') }}">
                            <div class="space-y-8">
                                {{-- Title --}}
                                <div>
                                    <x-form.label for="title" value="{{ __('Title') }}" />
                                    <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" required autofocus />
                                    <x-form.error for="title" />
                                </div>

                                {{-- Category --}}
                                <div>
                                    <x-form.label for="category" value="{{ __('Category') }}" />
                                    <select name="category" id="category" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach ($categories as $element)
                                            <option {{ old('category') == $element->id ? 'selected' : '' }} value="{{$element->id}}">{{$element->name()}}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="category" />
                                </div>

                                {{-- Tag --}}
                                <div>
                                    <x-form.label for="tags" value="{{ __('Tag') }}" />
                                    <select name="tags[]" id="tags" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" x-data="{}" x-init="function () { choices($el) }" multiple>
                                        @foreach ($tags as $element)
                                            <option {{ old('tags') == $element->id ? 'selected' : '' }} value="{{$element->id}}">{{$element->name()}}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="tags" />
                                </div>

                                {{-- Body --}}
                                <div>
                                    <x-form.label for="body" value="{{ __('Description') }}" />
                                    <x-trix name="body" :value="old('body')" styling="shadow-inner bg-gray-100 h-56" />
                                </div>

                                {{-- Button --}}
                                <x-buttons.primary>
                                    {{ __('Create') }}
                                </x-buttons.primary>
                        </x-form>
                    </div>
                </div>
            </article>
        </section>
    </main>
</x-guest-layout>
