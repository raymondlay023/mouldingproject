<x-app-layout>
<!-- Back Button -->
<div class="mt-4">
    <a href="{{ route('header.show', $header->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
</div>

<h1 class="text-2xl font-bold mb-4">Header Details</h1>

<!-- Display Header Details -->
<div class="bg-white shadow rounded-lg p-6 mb-6">
    <table class="w-full border border-gray-300">
        <tr class="border-b">
            <th class="px-4 py-2 text-left">Penyedia Barang:</th>
            <td class="px-4 py-2">{{ $header->penyedia_barang }}</td>
        </tr>
        <tr class="border-b">
            <th class="px-4 py-2 text-left">Alamat:</th>
            <td class="px-4 py-2">{{ $header->alamat }}</td>
        </tr>
        <tr class="border-b">
            <th class="px-4 py-2 text-left">Product Name:</th>
            <td class="px-4 py-2">{{ $header->product_name }}</td>
        </tr>
        <tr class="border-b">
            <th class="px-4 py-2 text-left">Product Type:</th>
            <td class="px-4 py-2">{{ $header->product_type }}</td>
        </tr>
        <tr class="border-b">
            <th class="px-4 py-2 text-left">Spesifikasi:</th>
            <td class="px-4 py-2">{{ $header->spesifikasi ?? 'N/A' }}</td>
        </tr>
        <tr class="border-b">
            <th class="px-4 py-2 text-left">Standart:</th>
            <td class="px-4 py-2">{{ $header->standart ?? 'N/A' }}</td>
        </tr>
    </table>
</div>

<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">{{ $header->name }}</h2>

    <!-- Combined Table with Tailwind Styling -->
    <table class="w-full border border-gray-300 divide-y divide-gray-200">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Deskripsi</th>
                <th class="px-4 py-2 text-left">KDN</th>
                <th class="px-4 py-2 text-left">KLN</th>
                <th class="px-4 py-2 text-left">Total</th>
                <th class="px-4 py-2 text-left">Persen TKDN</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalKDN = 0;
                $totalKLN = 0;
                $totalsum = 0;
                $finalsum = 0;
                foreach (['formPertama', 'formKedua', 'formKetiga', 'formKeempat', 'formKelima', 'formKeenam', 'formKetujuh', 'formKedelapan'] as $form) {
                    $finalsum += $sums[$form]['kdn'] + $sums[$form]['kln'];
                }
                $totalpresentase = 0;
            @endphp

            <!-- Group I: Bahan (material) Langsung -->
            <tr class="bg-blue-100">
                <td colspan="6" class="font-semibold px-4 py-2">I. Bahan (material) Langsung</td>
            </tr>
            <tr>
                <td class="px-4 py-2">1.</td>
                <td class="px-4 py-2">Bahan Baku untuk Material Langsung</td>
                <td class="px-4 py-2">{{ $sums['formPertama']['kdn'] }}</td>
                <td class="px-4 py-2">{{ $sums['formPertama']['kln'] }}</td>
                <td class="px-4 py-2">{{ $sums['formPertama']['kdn'] +  $sums['formPertama']['kln'] }}</td>
                <td class="px-4 py-2">{{ number_format($sums['formPertama']['kdn']/$finalsum*100, 2, ',', '.') }}</td>
                @php
                    $totalKDN += $sums['formPertama']['kdn'];
                    $totalKLN += $sums['formPertama']['kln'];
                    $totalsum += $sums['formPertama']['kdn'] +  $sums['formPertama']['kln'];
                    $totalpresentase += $sums['formPertama']['kdn']/$finalsum*100
                @endphp
            </tr>
            <tr>
                <td class="px-4 py-2">2.</td>
                <td class="px-4 py-2">Bahan Baku untuk Biaya Terkait Lainnya</td>
                <td class="px-4 py-2">{{ $sums['formKedua']['kdn'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKedua']['kln'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKedua']['kdn'] +  $sums['formKedua']['kln'] }}</td>
                <td class="px-4 py-2">{{ number_format($sums['formKedua']['kdn']/$finalsum*100, 2, ',', '.') }}</td>
                @php
                    $totalKDN += $sums['formKedua']['kdn'];
                    $totalKLN += $sums['formKedua']['kln'];
                    $totalsum += $sums['formKedua']['kdn'] +  $sums['formKedua']['kln'];
                    $totalpresentase += $sums['formKedua']['kdn']/$finalsum*100
                @endphp
            </tr>

            <!-- Group II: Tenaga kerja Langsung -->
            <tr class="bg-blue-100">
                <td colspan="6" class="font-semibold px-4 py-2">II. Tenaga kerja Langsung</td>
            </tr>
            <tr>
                <td class="px-4 py-2">1.</td>
                <td class="px-4 py-2">Tenaga Kerja Langsung</td>
                <td class="px-4 py-2">{{ $sums['formKetiga']['kdn'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKetiga']['kln'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKetiga']['kdn'] +  $sums['formKetiga']['kln'] }}</td>
                <td class="px-4 py-2">{{ number_format($sums['formKetiga']['kdn']/$finalsum*100, 2, ',', '.') }}</td>
                @php
                    $totalKDN += $sums['formKetiga']['kdn'];
                    $totalKLN += $sums['formKetiga']['kln'];
                    $totalsum += $sums['formKetiga']['kdn'] +  $sums['formKetiga']['kln'];
                    $totalpresentase += $sums['formKetiga']['kdn']/$finalsum*100
                @endphp
            </tr>
            <tr>
                <td class="px-4 py-2">2.</td>
                <td class="px-4 py-2">Tenaga Kerja Langsung untuk Biaya Terkait Lainnya</td>
                <td class="px-4 py-2">{{ $sums['formKeempat']['kdn'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKeempat']['kln'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKeempat']['kdn'] +  $sums['formKeempat']['kln'] }}</td>
                <td class="px-4 py-2">{{ number_format($sums['formKeempat']['kdn']/$finalsum*100, 2, ',', '.') }}</td>
                @php
                    $totalKDN += $sums['formKeempat']['kdn'];
                    $totalKLN += $sums['formKeempat']['kln'];
                    $totalsum += $sums['formKeempat']['kdn'] +  $sums['formKeempat']['kln'];
                    $totalpresentase += $sums['formKeempat']['kdn']/$finalsum*100
                @endphp
            </tr>

            <!-- Group III: Biaya lainnya -->
            <tr class="bg-blue-100">
                <td colspan="6" class="font-semibold px-4 py-2">III. Biaya lainnya</td>
            </tr>
            <tr>
                <td class="px-4 py-2">1.</td>
                <td class="px-4 py-2">Biaya Lainnya</td>
                <td class="px-4 py-2">{{ $sums['formKelima']['kdn'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKelima']['kln'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKelima']['kdn'] +  $sums['formKelima']['kln'] }}</td>
                <td class="px-4 py-2">{{ number_format($sums['formKelima']['kdn']/$finalsum*100, 2, ',', '.') }}</td>
                @php
                    $totalKDN += $sums['formKelima']['kdn'];
                    $totalKLN += $sums['formKelima']['kln'];
                    $totalsum += $sums['formKelima']['kdn'] +  $sums['formKelima']['kln'];
                    $totalpresentase += $sums['formKelima']['kdn']/$finalsum*100
                @endphp
            </tr>
            <tr>
                <td class="px-4 py-2">2.</td>
                <td class="px-4 py-2">Biaya Lainnya untuk Biaya Terkait Lainnya</td>
                <td class="px-4 py-2">{{ $sums['formKeenam']['kdn'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKeenam']['kln'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKeenam']['kdn'] +  $sums['formKeenam']['kln'] }}</td>
                <td class="px-4 py-2">{{ number_format($sums['formKeenam']['kdn']/$finalsum*100, 2, ',', '.') }}</td>
                @php
                    $totalKDN += $sums['formKeenam']['kdn'];
                    $totalKLN += $sums['formKeenam']['kln'];
                    $totalsum += $sums['formKeenam']['kdn'] +  $sums['formKeenam']['kln'];
                    $totalpresentase += $sums['formKeenam']['kdn']/$finalsum*100
                @endphp
            </tr>

            <!-- Group IV: Pengeluaran Biaya -->
            <tr class="bg-blue-100">
                <td colspan="6" class="font-semibold px-4 py-2">IV. Pengeluaran Biaya</td>
            </tr>
            <tr>
                <td class="px-4 py-2">1.</td>
                <td class="px-4 py-2">Pengeluaran Biaya</td>
                <td class="px-4 py-2">{{ $sums['formKetujuh']['kdn'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKetujuh']['kln'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKetujuh']['kdn'] +  $sums['formKetujuh']['kln'] }}</td>
                <td class="px-4 py-2">{{ number_format($sums['formKetujuh']['kdn']/$finalsum*100, 2, ',', '.') }}</td>
                @php
                    $totalKDN += $sums['formKetujuh']['kdn'];
                    $totalKLN += $sums['formKetujuh']['kln'];
                    $totalsum += $sums['formKetujuh']['kdn'] +  $sums['formKetujuh']['kln'];
                    $totalpresentase += $sums['formKetujuh']['kdn']/$finalsum*100
                @endphp
            </tr>
            <tr>
                <td class="px-4 py-2">2.</td>
                <td class="px-4 py-2">Pengeluaran Biaya untuk Biaya Terkait Lainnya</td>
                <td class="px-4 py-2">{{ $sums['formKedelapan']['kdn'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKedelapan']['kln'] }}</td>
                <td class="px-4 py-2">{{ $sums['formKedelapan']['kdn'] +  $sums['formKedelapan']['kln'] }}</td>
                <td class="px-4 py-2">{{ number_format($sums['formKedelapan']['kdn']/$finalsum*100, 2, ',', '.') }}</td>
                @php
                    $totalKDN += $sums['formKedelapan']['kdn'];
                    $totalKLN += $sums['formKedelapan']['kln'];
                    $totalsum += $sums['formKedelapan']['kdn'] +  $sums['formKedelapan']['kln'];
                    $totalpresentase += $sums['formKedelapan']['kdn']/$finalsum*100
                @endphp
            </tr>

            <!-- Totals Row -->
            <tr class="font-semibold bg-gray-200">
                <td colspan="2" class="px-4 py-2 text-right">Total:</td>
                <td class="px-4 py-2">{{ $totalKDN }}</td>
                <td class="px-4 py-2">{{ $totalKLN }}</td>
                <td class="px-4 py-2">{{ $totalsum }}</td>
                <td class="px-4 py-2">{{ number_format($totalpresentase, 2, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</div>

</x-app-layout>