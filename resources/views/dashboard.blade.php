<x-app-layout>
    <div class="mx-auto w-full flex-grow flex">
        <div class="pr-0 sm:pr-0 lg:flex-shrink-0 border-r border-gray-200 lg:pr-0 xl:pr-0">
            <div class="w-80">
                <!-- Start left column area -->
                <livewire:user-list />
                <!-- End left column area -->
            </div>
        </div>


        <!-- Right sidebar & main wrapper -->
        <div class="min-w-0 flex-1 xl:flex">
            <div class="lg:flex-1">
                <div class="py-6">
                    <!-- Start main area-->
                    <livewire:chat />
                    <!-- End main area -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
