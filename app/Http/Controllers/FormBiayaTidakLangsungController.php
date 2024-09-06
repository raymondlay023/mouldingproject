<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormBiayaTidakLangsung;
use App\Models\HeaderTkdn;

class FormBiayaTidakLangsungController extends Controller
{
    public function index($id)
    {
        $header = HeaderTkdn::findOrFail($id);
        $datas = FormBiayaTidakLangsung::where('header_id', $id)->get();
        return view('tkdn.formbiayatidaklangsung.index', compact('header', 'datas'));
    }

    public function store(Request $request, $id)
    {
        $header_id = $id;
        // dd($header_id);
        $request->validate([
            'uraian' => 'required|string',
            'pemasok' => 'required|string',
            'tkdn_kandungan' => 'required|string',
            'jumlah' => 'required|string',
            'biaya_perbulan' => 'required|string',
            'alokasi_pengunaan.*' => 'required|numeric',
        ]);
        // dd($request->all());
    
        // $data = $request->all();

        $kdn = ($request->tkdn_kandungan/100) * $request->jumlah * $request->biaya_perbulan * ($request->alokasi_pengunaan/100);
        $kln = ((100 - $request->tkdn_kandungan )/100) * $request->jumlah * $request->biaya_perbulan * ($request->alokasi_pengunaan/100);
        // dd($kdn);
        // dd($kln);
        // dd($data);
        FormBiayaTidakLangsung::create([
            'header_id' => $header_id,
            'uraian' => $request->input('uraian'),
            'pemasok' => $request->input('pemasok'),
            'tkdn_kandungan' => $request->input('tkdn_kandungan'),
            'jumlah' => $request->input('jumlah'),
            'biaya_perbulan' => $request->input('biaya_perbulan'),
            'alokasi_pengunaan' => $request->input('alokasi_pengunaan'),
            'kdn' => $kdn,
            'kln' => $kln,
        ]);

        return redirect()->back()->with('success', 'Header created successfully.');;
    }
}
