<x-app_layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Produk &raquo; {{ $produk->nama_produk }} &raquo; Galeri --}}
            Pencatatan Barang Masuk
        </h2>
    </x-slot>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="mb-10">
            
        </div>
    </div>
    
    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    // { data: 'id', name: 'id', width: '5%'},
                    // { data: 'user.name', name: 'user.name' },
                    // { data: 'total_harga', name: 'total_harga' },
                    // { data: 'status', name: 'status' },
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
            <div class="shadow overflow-hidden sm:rounded-md">
            </br>
                <a href="{{ route('dashboard.barangmasuk.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    Tambah Data
                </a>
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Jenis Kategori Produk</th>
                            <th>Jumlah</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)   
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $d->produk->nama_produk}}</td>
                                <td>{{ $d->produk->category->nama_kategori}}</td>
                                <td>{{ $d->stok_masuk }}</td>
                                <td>{{ $d->tangal_masuk }}</td>
                                {{-- <td class="text-center">
                                    <a href="" class="btn btn-primary btn-edit"><i class="fas fa-edit"></i></a>
                                    <button type="button" onclick="" class="btn btn-danger" data-bs-toggle="" data-bs-target=""><i class="fas fa-trash-alt"></i></button>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>               
                </div>
            </div>
        </div>
    </div>
</x-app_layout>