<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">

        <!-- Pemberitahuan Berhasil Login -->
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-orange-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    {{ __("Welcome To Dashboard!") }}
                </div>
            </div>
        </div> -->

        <!-- New Card -->
        <div class="p-4 grid grid-cols-1 gap-4 md:grid-cols-1 md:p-6 xl:grid-cols-3 xl:p-8">
                
                <!-- Card -->
                <!-- <div class="flex flex-col bg-[#BEB8AE] bg-opacity-50 border shadow-sm rounded-xl p-3 space-y-3">
                    <a href="#">
                        <div class="h-15">
                            <img class="w-full h-full rounded-t-xl object-contain" src="../assets/images/adminProgram.png" alt="Image Description">
                        </div>
                    </a>
                    <div>
                        <h3 class="text-sm font-semibold text-black truncate">
                        </h3>
                        <div class="mt-1 flex justify-between items-center">
                            <span class="text-m font-semibold text-black">
                                Current Program
                            </span>
                            <a class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-xs font-semibold rounded-lg border border-transparent bg-[#D9D9D9] text-black hover:bg-stone-400 focus:outline-none disabled:pointer-events-none" href="#">
                                Modify
                            </a>
                        </div>
                    </div>
                </div> -->
                <!-- End Card --> 

                <!-- Card -->
                <div class="flex flex-col bg-[#BEB8AE] bg-opacity-50 border shadow-sm rounded-xl p-3 space-y-3">
                    <a href="#">
                        <div class="h-15">
                            <img class="w-full h-full rounded-t-xl object-contain" src="../assets/images/adminProgram.png" alt="Image Description">
                        </div>
                    </a>
                    <div>
                        <h3 class="text-sm font-semibold text-black truncate">
                        </h3>
                        <div class="mt-1 flex justify-between items-center">
                            <span class="text-m font-semibold text-black">
                                Model Catalog
                            </span>
                            <a class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-xs font-semibold rounded-lg border border-transparent bg-[#D9D9D9] text-black hover:bg-stone-400 focus:outline-none disabled:pointer-events-none" href="{{ route('contentCatalog.index') }}">
                                Modify
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="flex flex-col bg-[#BEB8AE] bg-opacity-50 border shadow-sm rounded-xl p-3 space-y-3">
                    <a href="#">
                        <div class="h-15">
                            <img class="w-full h-full rounded-t-xl object-contain" src="../assets/images/adminProgram.png" alt="Image Description">
                        </div>
                    </a>
                    <div>
                        <h3 class="text-sm font-semibold text-black truncate">
                        </h3>
                        <div class="mt-1 flex justify-between items-center">
                            <span class="text-m font-semibold text-black">
                                Catalog Product
                            </span>
                            <a class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-xs font-semibold rounded-lg border border-transparent bg-[#D9D9D9] text-black hover:bg-stone-400 focus:outline-none disabled:pointer-events-none" href="{{ route('contentProduct.index') }}">
                                Modify
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="flex flex-col bg-[#BEB8AE] bg-opacity-50 border shadow-sm rounded-xl p-3 space-y-3">
                    <a href="#">
                        <div class="h-15">
                            <img class="w-full h-full rounded-t-xl object-contain" src="../assets/images/adminProgram.png" alt="Image Description">
                        </div>
                    </a>
                    <div>
                        <h3 class="text-sm font-semibold text-black truncate">
                        </h3>
                        <div class="mt-1 flex justify-between items-center">
                            <span class="text-m font-semibold text-black">
                                Detail Product
                            </span>
                            <a class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-xs font-semibold rounded-lg border border-transparent bg-[#D9D9D9] text-black hover:bg-stone-400 focus:outline-none disabled:pointer-events-none" href="{{ route('detailProduct.index') }}">
                                Modify
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
        </div>
    </div>
</x-app-layout>
