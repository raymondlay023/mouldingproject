<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Header Details</h1>

        <!-- Display Header Details -->
        <table class="table-auto w-full border border-gray-300">
            <tr>
                <th class="px-4 py-2 border-b">Penyedia Barang:</th>
                <td class="px-4 py-2 border-b">{{ $data->penyedia_barang }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 border-b">Alamat :</th>
                <td class="px-4 py-2 border-b">{{ $data->alamat }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 border-b">Product Name:</th>
                <td class="px-4 py-2 border-b">{{ $data->product_name }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 border-b">Product Type:</th>
                <td class="px-4 py-2 border-b">{{ $data->product_type }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 border-b">Spesifikasi:</th>
                <td class="px-4 py-2 border-b">{{ $data->spesifikasi ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 border-b">Standart:</th>
                <td class="px-4 py-2 border-b">{{ $data->standart ?? 'N/A' }}</td>
            </tr>
        </table>

        <!-- Buttons -->
        <div class="mt-6">
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('form.bahanbakulangsung', ['id' => $data->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Form Bahan Baku Langsung
        </a>
        <a href="{{ route('form.bahanbakulainnya', ['id' => $data->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Form Bahan Baku Lainnya
        </a>
        <a href="{{ route('form.tenagakerjalangsung', ['id' => $data->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Form Tenaga Kerja Langsung
        </a>
        <a href="{{ route('form.tenagakerjalangsunglainnya', ['id' => $data->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Form Tenaga Kerja Langsung Lainnya
        </a>
        <a href="{{ route('form.tenagakerjatidaklangsung', ['id' => $data->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Form Tenaga Kerja Tidak Langsung
        </a>
        <a href="{{ route('form.mesindimiliki', ['id' => $data->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Form Mesin Dimiliki
        </a>
        <a href="{{ route('form.mesinsewa', ['id' => $data->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Form Mesin Sewa
        </a>
        <a href="{{ route('form.biayatidaklangsung', ['id' => $data->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Form Biaya Tidak Langsung
        </a>
        <a href="{{ route('tkdn.summary', ['id' => $data->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Summary
        </a>
    </div>
</div>

        <!-- Back Button -->
        <div class="mt-4">
            <a href="{{ route('header.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
        </div>
    </div>
</body>
</html>
</x-app-layout>