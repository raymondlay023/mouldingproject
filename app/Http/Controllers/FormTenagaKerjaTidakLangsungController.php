<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormTenagaKerjaTidakLangsung;
use App\Models\HeaderTkdn;

class FormTenagaKerjaTidakLangsungController extends Controller
{
    public function index($id)
    {
        $header = HeaderTkdn::findOrFail($id);
        $datas = FormTenagaKerjaTidakLangsung::where('header_id', $id)->get();
        return view('tkdn.formtenagakerjatidaklangsung.index', compact('header', 'datas'));
    }

    public function store(Request $request, $id)
    {
        $header_id = $id;
        // dd($header_id);
        $request->validate([
            'uraian' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'tkdn_kandungan.*' => 'required|numeric',
            'jumlah_orang.*' => 'required|numeric',
            'gaji_perbulan' => 'required|numeric',
            'alokasi_pengunaan.*' => 'required|numeric',
        ]);
        // dd($request->all());
    
        // $data = $request->all();

        $kdn = ($request->tkdn_kandungan/100) * $request->jumlah_orang * $request->gaji_perbulan * ($request->alokasi_pengunaan/100);
        $kln = ((100 - $request->tkdn_kandungan )/100) * $request->jumlah_orang * $request->gaji_perbulan * ($request->alokasi_pengunaan/100);
        // dd($kdn);
        // dd($kln);
        // dd($data);
        FormTenagaKerjaTidakLangsung::create([
            'header_id' => $header_id,
            'uraian' => $request->input('uraian'),
            'kewarganegaraan' => $request->input('kewarganegaraan'),
            'tkdn_kandungan' => $request->input('tkdn_kandungan'),
            'jumlah_orang' => $request->input('jumlah_orang'),
            'gaji_perbulan' => $request->input('gaji_perbulan'),
            'alokasi_pengunaan' => $request->input('alokasi_pengunaan'),
            'kdn' => $kdn,
            'kln' => $kln,
        ]);

        return redirect()->back()->with('success', 'Header created successfully.');;
    }
}
