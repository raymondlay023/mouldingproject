<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormMesinDimiliki;
use App\Models\HeaderTkdn;

class FormMesinDimilikiController extends Controller
{
    public function index($id)
    {
        $header = HeaderTkdn::findOrFail($id);
        $datas = FormMesinDimiliki::where('header_id', $id)->get();
        return view('tkdn.formmesindimiliki.index', compact('header', 'datas'));
    }

    public function store(Request $request, $id)
    {
        $header_id = $id;
        // dd($header_id);
        $request->validate([
            'uraian' => 'required|string',
            'spesifikasi' => 'required|string',
            'kepemilikan_dibuat' => 'required|string',
            'kepemilikan_dibuat' => 'required|string',
            'alokasi_dalam_negri.*' => 'required|numeric',
            'jumlah.*' => 'required|numeric',
            'biaya_depresiasi' => 'required|numeric',
            'alokasi_pengunaan.*' => 'required|numeric',
        ]);
        // dd($request->all());
    
        // $data = $request->all();

        $kdn = ($request->alokasi_dalam_negri/100) * $request->jumlah * $request->biaya_depresiasi * ($request->alokasi_pengunaan/100);
        $kln = ((100 - $request->alokasi_dalam_negri )/100) * $request->jumlah * $request->biaya_depresiasi * ($request->alokasi_pengunaan/100);
        // dd($kdn);
        // dd($kln);
        // dd($data);
        FormMesinDimiliki::create([
            'header_id' => $header_id,
            'uraian' => $request->input('uraian'),
            'spesifikasi' => $request->input('spesifikasi'),
            'kepemilikan_dibuat' => $request->input('kepemilikan_dibuat'),
            'kepemilikan_dimiliki' => $request->input('kepemilikan_dimiliki'),
            'alokasi_dalam_negri' => $request->input('alokasi_dalam_negri'),
            'jumlah' => $request->input('jumlah'),
            'biaya_depresiasi' => $request->input('biaya_depresiasi'),
            'alokasi_pengunaan' => $request->input('alokasi_pengunaan'),
            'kdn' => $kdn,
            'kln' => $kln,
        ]);

        return redirect()->back()->with('success', 'Header created successfully.');;
    }
}
