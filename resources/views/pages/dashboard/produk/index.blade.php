<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Produk Dapoerpedia') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    // { data: 'id', name: 'id', width: '5%'},
                    // { data: 'nama_produk', name: 'nama_produk' },
                    // { data: 'category.nama_kategori', name: 'category.nama_kategori' },
                    // { data: 'harga', name: 'harga' },
                    // { data: 'deskripsi', name: 'deskripsi'},
                    // { data: 'stok_produk', name: 'stok_produk' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    },
                ],
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.produk.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    Tambah Produk
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tbody>
                                @foreach ($data as $d)   
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td>{{ $d->nama_produk}}</td>
                                    <td>{{ $d->category->nama_kategori }}</td>
                                    <td>@currency($d->harga)</td>
                                    <td>{{ $d->deskripsi }}</td>
                                    <td>{{ $d->stok_produk }}</td>
                                    <td>
                                        <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"  
                                            href="{{route('dashboard.produk.galeri.index', $d->id) }}"> 
                                            Galeri  
                                        </a>
                                    </td>
                                    <td>
                                    <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"  
                                        href="{{route('dashboard.produk.edit', $d->id) }}"> 
                                        Edit  
                                    </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
