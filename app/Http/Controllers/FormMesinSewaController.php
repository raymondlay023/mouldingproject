<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormMesinSewa;
use App\Models\HeaderTkdn;

class FormMesinSewaController extends Controller
{
    public function index($id)
    {
        $header = HeaderTkdn::findOrFail($id);
        $datas = FormMesinSewa::where('header_id', $id)->get();
        return view('tkdn.formmesinsewa.index', compact('header', 'datas'));
    }

    
    public function store(Request $request, $id)
    {
        $header_id = $id;
        // dd($header_id);
        $request->validate([
            'uraian' => 'required|string',
            'spesifikasi' => 'required|string',
            'pemasok' => 'required|string',
            'kepemilikan_dibuat' => 'required|string',
            'kepemilikan_dibuat' => 'required|string',
            'alokasi_dalam_negri.*' => 'required|numeric',
            'jumlah_unit.*' => 'required|numeric',
            'biaya_perbulan' => 'required|numeric',
            'alokasi_pengunaan.*' => 'required|numeric',
        ]);
        // dd($request->all());
    
        // $data = $request->all();

        $kdn = ($request->alokasi_dalam_negri/100) * $request->jumlah_unit * $request->biaya_perbulan * ($request->alokasi_pengunaan/100);
        $kln = ((100 - $request->alokasi_dalam_negri )/100) * $request->jumlah_unit * $request->biaya_perbulan * ($request->alokasi_pengunaan/100);
        // dd($kdn);
        // dd($kln);
        // dd($data);
        FormMesinSewa::create([
            'header_id' => $header_id,
            'uraian' => $request->input('uraian'),
            'spesifikasi' => $request->input('spesifikasi'),
            'pemasok' => $request->input('pemasok'),
            'kepemilikan_dibuat' => $request->input('kepemilikan_dibuat'),
            'kepemilikan_dimiliki' => $request->input('kepemilikan_dimiliki'),
            'alokasi_dalam_negri' => $request->input('alokasi_dalam_negri'),
            'jumlah_unit' => $request->input('jumlah_unit'),
            'biaya_perbulan' => $request->input('biaya_perbulan'),
            'alokasi_pengunaan' => $request->input('alokasi_pengunaan'),
            'kdn' => $kdn,
            'kln' => $kln,
        ]);

        return redirect()->back()->with('success', 'Header created successfully.');;
    }
}
