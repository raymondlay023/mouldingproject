<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderTkdn;

class HeaderController extends Controller
{
    public function index()
    {
        $datas = HeaderTkdn::get();
        // dd($datas);
        return view('tkdn.index', compact('datas'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'penyedia_barang' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'product_name' => 'required|string|max:255',
            'product_type' => 'required|string|max:255',
            'spesifikasi' => 'nullable|string|max:255',
            'standart' => 'nullable|string|max:255',
        ]);

        try {
            // Attempt to create the new header
            HeaderTkdn::create($request->all());

            // Redirect back to the index page with a success message
            return redirect()->route('header.index')->with('success', 'Header created successfully.');

        } catch (\Exception $e) {
            // Log the error (optional, but useful for debugging)
            \Log::error('Failed to create header: '.$e->getMessage());

            // Redirect back to the index page with an error message
            return redirect()->route('header.index')->with('error', 'Failed to create header. Please try again.');
        }
    }

    public function show($id)
    {
        $data = HeaderTkdn::find($id);
        
        return view('tkdn.detail', compact('data'));
    }

    public function summary($id)
    {
        $header = HeaderTkdn::with('formPertama','formKedua','formKetiga','formKeempat','formKelima','formKeenam','formKetujuh','formKedelapan')->find($id);
        

        $sums = [
            'formPertama' => ['kdn' => 0, 'kln' => 0],
            'formKedua' => ['kdn' => 0, 'kln' => 0],
            'formKetiga' => ['kdn' => 0, 'kln' => 0],
            'formKeempat' => ['kdn' => 0, 'kln' => 0],
            'formKelima' => ['kdn' => 0, 'kln' => 0],
            'formKeenam' => ['kdn' => 0, 'kln' => 0],
            'formKetujuh' => ['kdn' => 0, 'kln' => 0],
            'formKedelapan' => ['kdn' => 0, 'kln' => 0],
        ];
    
        // Calculate sums for each relationship
        foreach ($header->formPertama as $item) {
            $sums['formPertama']['kdn'] += $item->kdn;
            $sums['formPertama']['kln'] += $item->kln;
        }
    
        foreach ($header->formKedua as $item) {
            $sums['formKedua']['kdn'] += $item->kdn;
            $sums['formKedua']['kln'] += $item->kln;
        }
    
        foreach ($header->formKetiga as $item) {
            $sums['formKetiga']['kdn'] += $item->kdn;
            $sums['formKetiga']['kln'] += $item->kln;
        }
    
        foreach ($header->formKeempat as $item) {
            $sums['formKeempat']['kdn'] += $item->kdn;
            $sums['formKeempat']['kln'] += $item->kln;
        }
    
        foreach ($header->formKelima as $item) {
            $sums['formKelima']['kdn'] += $item->kdn;
            $sums['formKelima']['kln'] += $item->kln;
        }
    
        foreach ($header->formKeenam as $item) {
            $sums['formKeenam']['kdn'] += $item->kdn;
            $sums['formKeenam']['kln'] += $item->kln;
        }
    
        foreach ($header->formKetujuh as $item) {
            $sums['formKetujuh']['kdn'] += $item->kdn;
            $sums['formKetujuh']['kln'] += $item->kln;
        }
    
        foreach ($header->formKedelapan as $item) {
            $sums['formKedelapan']['kdn'] += $item->kdn;
            $sums['formKedelapan']['kln'] += $item->kln;
        }
    
        // Dump the summary data
        // dd($sums);
        return view('tkdn.summary', compact('header', 'sums'));
    }
}
