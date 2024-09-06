<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tenaga Kerja Langsung Lainnya</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Form Tenaga Kerja Langsung Lainnya for Header {{ $header->id }}</h1>

        <!-- Back Button -->
        <div class="mt-4">
            <a href="{{ route('header.show', $header->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
        </div>

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

        <!-- Form to Add New Record -->
        <form action="{{ route('form.4.store', $header->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Uraian -->
            <div class="mb-4">
                <label for="uraian" class="block text-gray-700">Uraian:</label>
                <input type="text" id="uraian" name="uraian" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- Kewarganegaraan -->
            <div class="mb-4">
                <label for="pemasok" class="block text-gray-700">pemasok :</label>
                <input type="text" id="pemasok" name="pemasok" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- TKDN Kandungan -->
            <div class="mb-4">
                <label for="tkdn_kandungan" class="block text-gray-700">TKDN Kandungan :</label>
                <input type="number" step="0.01" id="tkdn_kandungan" name="tkdn_kandungan" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- Jumlah Pemakaian -->
            <div class="mb-4">
                <label for="jumlah" class="block text-gray-700">Jumlah :</label>
                <input type="number" id="jumlah" name="jumlah" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- Biaya -->
            <div class="mb-4">
                <label for="biaya_perbulan" class="block text-gray-700">Biaya Perbulan :</label>
                <input type="number" step="0.01" id="biaya_perbulan"  name="biaya_perbulan"  class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <!-- Alokasi Produk -->
            <div class="mb-4">
                <label for="alokasi_pengunaan" class="block text-gray-700">Alokasi Pengunaan :</label>
                <input type="number" step="0.01" id="alokasi_pengunaan" name="alokasi_pengunaan" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
        </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add Record</button>
            </div>
        </form>

        <!-- Display Data -->
        @if ($datas->isEmpty())
            <div class="bg-yellow-200 text-yellow-700 p-4 mt-4 rounded">
                No data available.
            </div>
        @else
            @php
                $totalKdn = 0;
                $totalKln = 0;
            @endphp
            <table class="min-w-full bg-white border border-gray-300 mt-4">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Uraian</th>
                        <th class="py-2 px-4 border-b">Pemasok</th>
                        <th class="py-2 px-4 border-b">TKDN Kandungan</th>
                        <th class="py-2 px-4 border-b">Jumlah</th>
                        <th class="py-2 px-4 border-b">Biaya Perbulan</th>
                        <th class="py-2 px-4 border-b">Alokasi Pengunaan</th>
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
                            <td class="py-2 px-4 border-b">{{ $data->uraian }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->pemasok }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->tkdn_kandungan }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->jumlah }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->biaya_perbulan }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->alokasi_pengunaan }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->kdn }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->kln }}</td>
                            <td class="py-2 px-4 border-b">{{ $rowTotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6" class="py-2 px-4 border-t text-right">Total</th>
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
