<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Content of Catalog') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <!-- Tabel u/ Setting Content Catalog Product -->
        <div class="flex flex-col p-5">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Catalog Image</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>

                        @foreach ($catalogs as $item)

                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800" style="max-width: 200px; max-height: 200px;">
                                    <img src="{{ url('storage/' .$item->imageCtg) }}" alt="Pict of Catalog" width="200" height="200">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex gap-2">
                                    <a href="{{ route('updateCatalog.update', ['id' => $item->id]) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none ml-auto">Update</a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('deleteCatalog.delete', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="confirmDelete('{{ $item->id }}', event)" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-700 disabled:opacity-50 disabled:pointer-events-none">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            </tbody>

                        @endforeach
                        </table>
                    </div>

                    <!-- Button Tambah baru - -->
                    <div class="flex items-center justify-end mt-2">
                        <a class="inline-block px-3 py-2 bg-orange-900 rounded-lg text-sm sm:text-base text-white hover:text-stone-500 " href="/add-new-catalog">
                            + Add 
                        </a>
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
