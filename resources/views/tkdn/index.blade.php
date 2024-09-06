<x-app-layout>
<!-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.9.6/dist/cdn.min.js" defer></script> -->

<h1>Index TKDN</h1>
<h1>Button untuk tambah header</h1>

@if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="bg-green-500 text-white px-4 py-2 rounded mt-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="bg-red-500 text-white px-4 py-2 rounded mt-4">
        {{ session('error') }}
    </div>
@endif

<!-- Alpine.js container for managing the modal's state -->
<div x-data="{ open: false }">
    <!-- Button to trigger the modal -->
    <button class="bg-blue-500 text-white px-4 py-2 rounded" @click="open = true">
        Tambah Header
    </button>

    <!-- Modal Overlay -->
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition ease-in duration-200" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50"
    >
        <!-- Modal Content -->
        <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-300" 
            x-transition:enter-start="opacity-0 transform scale-95" 
            x-transition:enter-end="opacity-100 transform scale-100" 
            x-transition:leave="transition ease-in duration-200" 
            x-transition:leave-start="opacity-100 transform scale-100" 
            x-transition:leave-end="opacity-0 transform scale-95" 
            class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full"
        >
            <div class="flex justify-between items-center pb-4">
                <h2 class="text-lg font-semibold">Tambah Header</h2>
                <!-- Close button -->
                <button @click="open = false" class="text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
            </div>

            <!-- Form inside the modal -->
            <form id="headerForm" action="{{ route('header.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="penyedia_barang" class="block text-gray-700">Penyedia Barang:</label>
                    <input type="text" id="penyedia_barang" name="penyedia_barang" class="w-full border border-gray-300 p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700">Alamat: </label>
                    <input type="text" id="alamat" name="alamat" class="w-full border border-gray-300 p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label for="product_name" class="block text-gray-700">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" class="w-full border border-gray-300 p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label for="product_type" class="block text-gray-700">Product Type:</label>
                    <input type="text" id="product_type" name="product_type" class="w-full border border-gray-300 p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label for="spesifikasi" class="block text-gray-700">Spesifikasi:</label>
                    <input type="text" id="spesifikasi" name="spesifikasi" class="w-full border border-gray-300 p-2 rounded">
                </div>

                <div class="mb-4">
                    <label for="standart" class="block text-gray-700">Standart:</label>
                    <input type="text" id="standart" name="standart" class="w-full border border-gray-300 p-2 rounded">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



@if ($datas->isEmpty())
    <p>No headers created.</p>
@else
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Penyedia Barang</th>
                <th class="px-4 py-2">Alamat </th>
                <th class="px-4 py-2">Product Name</th>
                <th class="px-4 py-2">Product Type</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td class="border px-4 py-2">{{ $data->id }}</td>
                    <td class="border px-4 py-2">{{ $data->penyedia_barang }}</td>
                    <td class="border px-4 py-2">{{ $data->alamat }}</td>
                    <td class="border px-4 py-2">{{ $data->product_name }}</td>
                    <td class="border px-4 py-2">{{ $data->product_type }}</td>
                    <td class="border px-4 py-2">
                        <!-- Button to redirect to another view passing header ID -->
                        <a href="{{ route('header.show', $data->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

</x-app-layout>