<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 1</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Form Bahan Baku Langsung</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-200 text-red-700 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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


        <!-- Form for Form 1 -->
        <form action="{{ route('form.1.store', $header->id) }}" method="POST">
            @csrf
            <div class="flex flex-wrap mb-4">
                <div class="w-full lg:w-1/2 pr-2">
                    <label for="material_name" class="block text-gray-700">Material Name:</label>
                    <input type="text" id="material_name" name="material_name" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="w-full lg:w-1/2 pl-2">
                    <label for="satuan_material" class="block text-gray-700">Satuan Material:</label>
                    <input type="text" id="satuan_material" name="satuan_material" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
            </div>

            <div class="flex flex-wrap mb-4">
                <div class="w-full lg:w-1/2 pr-2">
                    <label for="negara_asal" class="block text-gray-700">Negara Asal:</label>
                    <input type="text" id="negara_asal" name="negara_asal" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="w-full lg:w-1/2 pl-2">
                    <label for="pemasok" class="block text-gray-700">Pemasok:</label>
                    <input type="text" id="pemasok" name="pemasok" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
            </div>

            <div class="flex flex-wrap mb-4">
                <div class="w-full lg:w-1/2 pr-2">
                    <label for="tkdn_kandungan" class="block text-gray-700">TKDN Kandungan:</label>
                    <input type="number" step="0.01" id="tkdn_kandungan" name="tkdn_kandungan" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
                <div class="w-full lg:w-1/2 pl-2">
                    <label for="jumlah_pemakaian" class="block text-gray-700">Jumlah Pemakaian:</label>
                    <input type="number" step="0.01" id="jumlah_pemakaian" name="jumlah_pemakaian" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
            </div>

            <div class="flex flex-wrap mb-4">
                <div class="w-full lg:w-1/2 pr-2">
                    <label for="harga_satuan_material" class="block text-gray-700">Harga Satuan Material:</label>
                    <input type="number" step="0.01" id="harga_satuan_material" name="harga_satuan_material" class="w-full border border-gray-300 p-2 rounded" required>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Submit</button>
            </div>
        </form>

        <!-- Back Button -->
        <div class="mt-4">
            <a href="{{ route('header.show', $header->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
        </div>

        @if ($datas->isEmpty())
            <div class="bg-yellow-200 text-yellow-700 p-4 mb-4 rounded">
                No data available.
            </div>
        @else
            @php
                $totalKdn = 0;
                $totalKln = 0;
            @endphp
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Material Name</th>
                        <th class="py-2 px-4 border-b">Satuan Material</th>
                        <th class="py-2 px-4 border-b">Negara Asal</th>
                        <th class="py-2 px-4 border-b">Pemasok</th>
                        <th class="py-2 px-4 border-b">TKDN Kandungan</th>
                        <th class="py-2 px-4 border-b">Jumlah Pemakaian</th>
                        <th class="py-2 px-4 border-b">Harga Satuan Material</th>
                        <th class="py-2 px-4 border-b">KDN</th>
                        <th class="py-2 px-4 border-b">KLN</th>
                        <th class="py-2 px-4 border-b">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        @php
                            $rowTotal = $data->kdn + $data->kln;
                            $totalKdn += $data->kdn;
                            $totalKln += $data->kln;
                        @endphp
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $data->material_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->satuan_material }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->negara_asal }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->pemasok }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->tkdn_kandungan }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->jumlah_pemakaian }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->harga_satuan_material }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->kdn }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->kln }}</td>
                            <td class="py-2 px-4 border-b">{{ $rowTotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="7" class="py-2 px-4 border-t text-right">Total</th>
                        <td class="py-2 px-4 border-t">{{ $totalKdn }}</td>
                        <td class="py-2 px-4 border-t">{{ $totalKln }}</td>
                        <td class="py-2 px-4 border-t">{{ $totalKdn + $totalKln }}</td>
                    </tr>
                </tfoot>
            </table>
        @endif
    </div>
</body>
</html>
