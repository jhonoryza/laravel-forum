<x-guest-layout>
    <main class="wrapper">
        {{-- Alert --}}
        <div class="mx-6 mt-6">
            <x-alert.main />
        </div>

        <section class="grid grid-cols-4 gap-8 mt-8">

            <x-partials.sidenav />

            <div class="flex flex-col col-span-3 gap-y-4">
                @foreach ($threads as $element)
                    <x-thread :thread="$element" />
                @endforeach
                <div class="mt-5 mb-5">
                    {!! $threads->links() !!}
                </div>
            </div>
        </section>
    </main>
</x-guest-layout>
