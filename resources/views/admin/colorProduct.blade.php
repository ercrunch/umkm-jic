<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-black leading-tight">
                {{ __('Color of Product') }}
            </h2>
            <!-- Button Tambah baru - -->
            <a class="inline-block px-3 py-2 bg-white rounded-lg text-sm font-semibold sm:text-base text-black hover:text-stone-500 " href="{{ route('addColor', ['productId' => $productId]) }}">
                + Add 
            </a>
        </div>
    </x-slot>

    <div class="py-12">

        <!-- Tabel u/ Setting Content Detail Product -->
        <div class="flex flex-col p-5">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Color Name</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Color Code</th>
                                <!-- <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Color Image</th> -->
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                                </tr>
                            </thead>
                                @foreach ($product->colors as $color)
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $color->color_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $color->color_code }}</td>
                                        <!-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                        </td> -->
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex gap-2">
                                            <a href="{{ route('updateColor.update', $color->id) }}" class="inline-flex items-center gap-x-2 ml-auto text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Update</a>
                                            <form id="delete-form-{{ $color->id }}" action="{{ route('deleteColor.delete', ['colorId' => $color->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete('{{ $color->id }}', event)" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- End Set -->
    </div>
    
    <!-- Confirm Delete -->
    <script>
        function confirmDelete(itemId, event) {
            // Munculkan konfirmasi alert
            if (confirm('Apakah Anda yakin ingin menghapus item ini ?')) {
                // Jika user menekan OK, submit form hapus dengan ID yang sesuai
                document.getElementById('delete-form-' + itemId).submit();
            } else {
                // Jika user menekan Cancel, hentikan proses default (penghapusan form)
                event.preventDefault();
            }
        }
    </script>

</x-app-layout>
