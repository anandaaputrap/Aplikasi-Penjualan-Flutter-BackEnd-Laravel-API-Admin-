<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Dashboard Admin Dapoerpedia') }}
        </h2>
    </x-slot>

    <br/>
    <div class="grid gap-6 mb-3 md:grid-cols-2 xl:grid-cols-3"> 
                      <!-- Card --> 
                      <div 
                      class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-white"> 
                      <div 
                      class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500" 
                      > 
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"> 
                            {{-- <path 
                              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" 
                            ></path>  --}}
                          </svg> 
                        </div> 
                        <div> 
                          <p 
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" 
                          > 
                            Jumlah User 
                          </p> 
                          <p 
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200" 
                          > 
                            {{ $itung->count() }} 
                          </p> 
                        </div> 
                      </div> 
     
                      <div 
                      class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-white"> 
                      <div 
                      class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500" 
                      > 
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"> 
                            {{-- <path 
                              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" 
                            ></path>  --}}
                          </svg> 
                        </div> 
                        <div> 
                            <p 
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" 
                          > 
                            Transaksi Sukses 
                          </p> 
                          <p 
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200" 
                          > 
                             {{ $itung2->count() }} 
                          </p> 
                        </div> 
                      </div> 
     
                      <div 
                      class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-white"> 
                      <div 
                      class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500" 
                      > 
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"> 
                            {{-- <path 
                              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" 
                            ></path>  --}}
                          </svg> 
                        </div> 
                        <div> 
                            <p 
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" 
                          > 
                            Transaksi Pending 
                          </p> 
                          <p 
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200" 
                          > 
                             {{ $itung1->count() }} 
                          </p> 
     
                        </div> 
                      </div> 
     
                      
     
                       
                  
                   
                  <!-- Card --> 
                  <div 
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-white" 
                  > 
                    <div 
                      class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500" 
                    > 
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"> 
                        {{-- <path 
                          d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" 
                        ></path>  --}}
                      </svg> 
                    </div> 
                    <div> 
                      <p 
                        class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" 
                      > 
                        Produk 
                      </p> 
                      <p 
                        class="text-lg font-semibold text-gray-700 dark:text-gray-200" 
                      > 
                        {{ $produk->count() }} 
                      </p> 
                    </div> 
                  </div>

                  <div 
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-white" 
                  > 
                    <div 
                      class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500" 
                    > 
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"> 
                        {{-- <path 
                          d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" 
                        ></path>  --}}
                      </svg> 
                    </div> 
                    <div> 
                      <p 
                        class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" 
                      > 
                        Transaksi Hari Ini 
                      </p> 
                      <p 
                        class="text-lg font-semibold text-gray-700 dark:text-gray-200" 
                      > 
                        {{ $data6->count() }} 
                      </p> 
                    </div> 
                  </div>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
</x-app-layout>
