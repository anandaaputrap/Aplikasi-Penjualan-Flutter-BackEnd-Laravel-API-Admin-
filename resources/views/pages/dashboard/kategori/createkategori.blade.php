<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategori &raquo; Tambah Data Kategori
        </h2>
    </x-slot>

   <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
            @if ($errors->any())
            <div class="mb-5" role="alert">
                <div class="bg-red-500 border-red-400 rounded-b px-4 py-3 text-red-700">
                    Terdapat Sesuatu yang Salah
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </p>
                </div>
            </div>
            @endif
            <form class="w-full" action="{{ route('dashboard.kategori.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Nama Kategori
                        </label>
                        <input value="{{ old('nama_kategori') }}" name="nama_kategori" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Nama Kategori">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 text-right">
                        <button type="submit" class=" shadow-lg bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Kategori
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   </div>
</x-app-layout>
