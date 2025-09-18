<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-black leading-tight">
                {{ __('Content of Catalog') }}
            </h2>
            <!-- Button Tambah baru - -->
            <a class="inline-block px-3 py-2 bg-white rounded-lg text-sm font-semibold sm:text-base text-black hover:text-stone-500 " href="/admin/add-new-product">
                + Add 
            </a>
        </div>
    </x-slot>

    <div class="py-12">

        <!-- Tabel u/ Setting Content Product -->
        <div class="flex flex-col p-5">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name of Product</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Category</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Price</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Image</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Description</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>

                        @foreach ($products as $item)

                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $item->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $item->category }}</td> <!-- Menampilkan Kategori -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Rp{{ number_format($item->price, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800" style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><img src="{{ url('storage/' .$item->image) }}" alt="Pict of Product"></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800" style="max-width: 200px; white-space: pre-wrap; text-align: justify;">{{ $item->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex gap-2">
                                    <a href="{{ route('updateProduct.update', ['id' => $item->id]) }}" class="inline-flex items-center gap-x-2 ml-auto text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Update</a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('deleteProduct.delete', ['id' => $item->id]) }}" method="POST">
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
