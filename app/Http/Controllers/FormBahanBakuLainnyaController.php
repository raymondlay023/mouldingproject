<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormBahanBakuLainnya;
use App\Models\HeaderTkdn;

class FormBahanBakuLainnyaController extends Controller
{
    public function index($id)
    {
        $header = HeaderTkdn::findOrFail($id);
        $datas = FormBahanBakuLainnya::where('header_id', $id)->get();
        return view('tkdn.formbahanbakulainnya.index', compact('header', 'datas'));
    }

    public function store(Request $request, $id)
    {
        $header_id = $id;
        // dd($header_id);
        $request->validate([
            'uraian' => 'required|string',
            'pemasok' => 'required|string',
            'tkdn_kandungan.*' => 'required|numeric',
            'jumlah_pemakaian.*' => 'required|numeric',
            'biaya' => 'required|numeric',
            'alokasi_produk.*' => 'required|numeric',
        ]);
        // dd($request->all());
    
        // $data = $request->all();

        $kdn = ($request->tkdn_kandungan/100) * $request->jumlah_pemakaian * $request->biaya * $request->alokasi_produk;
        $kln = ((100 - $request->tkdn_kandungan )/100) * $request->jumlah_pemakaian * $request->biaya * $request->alokasi_produk;
        // dd($kdn);
        // dd($kln);
        // dd($data);
        FormBahanBakuLainnya::create([
            'header_id' => $header_id,
            'uraian' => $request->input('uraian'),
            'pemasok' => $request->input('pemasok'),
            'tkdn_kandungan' => $request->input('tkdn_kandungan'),
            'jumlah_pemakaian' => $request->input('jumlah_pemakaian'),
            'biaya' => $request->input('biaya'),
            'alokasi_produk' => $request->input('alokasi_produk'),
            'kdn' => $kdn,
            'kln' => $kln,
        ]);

        return redirect()->back()->with('success', 'Header created successfully.');;
    }
}
