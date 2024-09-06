<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormBahanBakuLangsung;
use App\Models\HeaderTkdn;

class FormBahanBakuLangsungController extends Controller
{
    public function index($id) {
        
        $header = HeaderTkdn::findOrFail($id);
        $datas = FormBahanBakuLangsung::where('header_id', $id)->get();
        return view('tkdn.formbahanbakulangsung.index', compact('header', 'datas'));
    }

    public function store(Request $request, $id)
    {
        $header_id = $id;
        // dd($header_id);
        $request->validate([
            'material_name.*' => 'required|string',
            'satuan_material.*' => 'required|string',
            'negara_asal.*' => 'required|string',
            'pemasok.*' => 'required|string',
            'tkdn_kandungan.*' => 'required|numeric',
            'jumlah_pemakaian.*' => 'required|numeric',
            'harga_satuan_material.*' => 'required|numeric',
        ]);
    
        // $data = $request->all();

        $kdn = ($request->tkdn_kandungan/100) * $request->jumlah_pemakaian * $request->harga_satuan_material;
        $kln = ((100 - $request->tkdn_kandungan )/100) * $request->jumlah_pemakaian * $request->harga_satuan_material;
        // dd($kdn);
        // dd($kln);
        // dd($data);
        FormBahanBakuLangsung::create([
            'header_id' => $header_id,
            'material_name' => $request->input('material_name'),
            'satuan_material' => $request->input('satuan_material'),
            'negara_asal' => $request->input('negara_asal'),
            'pemasok' => $request->input('pemasok'),
            'tkdn_kandungan' => $request->input('tkdn_kandungan'),
            'jumlah_pemakaian' => $request->input('jumlah_pemakaian'),
            'harga_satuan_material' => $request->input('harga_satuan_material'),
            'kdn' => $kdn,
            'kln' => $kln,
        ]);

        return redirect()->back()->with('success', 'Header created successfully.');;
    }
}
