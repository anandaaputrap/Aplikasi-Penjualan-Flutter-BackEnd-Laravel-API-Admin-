<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaksi &raquo; #{{ $transaksi->id }} {{ $transaksi->name }}
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
                    { data: 'id', name: 'id', width: '5%'},
                    { data: 'product.nama_produk', name: 'product.nama_produk' },
                    { data: 'product.price', name: 'product.price' },
                    { data: 'quantity', name: 'quantity' },
                ],
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Detail Transaksi</h2>
            <a href="/dashboard/print_user/{{ $transaksi->id }}" target="_blank" class="">Download PDF</a>
            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                 <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">Nama</th>
                                <td class="border px-6 py-4">{{ $transaksi->user->name }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Email</th>
                                <td class="border px-6 py-4">{{ $transaksi->user->email }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Alamat</th>
                                <td class="border px-6 py-4">{{ $transaksi->alamat }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Pembayaran</th>
                                <td class="border px-6 py-4">{{ $transaksi->metode_pembayaran }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Total Harga</th>
                                <td class="border px-6 py-4">@currency($transaksi->total_harga)</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Biaya Pengiriman</th>
                                <td class="border px-6 py-4">@currency($transaksi->biaya_kirim)</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Status</th>
                                <td class="border px-6 py-4">{{ $transaksi->status }}</td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Tanggal Pembelian</th>
                                <td class="border px-6 py-4">{{ $transaksi->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Transaction Items</h2>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah Barang</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
