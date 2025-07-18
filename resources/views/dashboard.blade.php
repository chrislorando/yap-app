<x-app-layout>
    <div class="mx-auto w-full flex-grow flex">
        <div class="pr-0 sm:pr-0 lg:flex-shrink-0 lg:pr-0 xl:pr-0">
            <div class="w-80">
                <livewire:user-list />
            </div>
        </div>

        <div class="min-w-0 flex-1 xl:flex">
            <div class="lg:flex-1">
                <div class="py-6">
                    <livewire:chat />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
