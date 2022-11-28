<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Transaksi Dapoerpedia') }}
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
                <div class="my-2">
                    <form action="/dashboard/transaksi" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="getdate">
                            <button class="inline-block border border-gray-700 bg-red-700 text-white rounded-md px-5 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" type="submit">Cari Transaksi</button>
                        </div>
                    </form>
                </div>
                <a href="/dashboard/print_all" target="_blank" class="inline-block border border-black bg-indigo-500 hover:bg-indigo-700 text-white rounded-md px-5 py-1 m-1 transition duration-500 ease select-none focus:outline-none focus:shadow-outline">Download Semua Transaksi</a>
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Total Harga</th>
                            <th>Tanggal Beli</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)   
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $d->user->name}}</td>
                                <td>@currency($d->total_harga)</td>
                                <td>{{ $d->created_at->format('d-m-Y')}}</td>
                                <td>{{ $d->status }}</td>
                                <td class="text-center">
                                    <a class="inline-block border border-blue-700 bg-blue-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline"  
                                    href="/dashboard/transaksi/{{$d->id}}"> 
                                    Detail 
                                </a> 
                                <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline"  
                                    href="{{route('dashboard.transaksi.edit', $d->id) }}"> 
                                    Edit  
                                </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
