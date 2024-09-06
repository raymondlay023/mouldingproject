<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormBahanBakuLainnya extends Model
{
    use HasFactory;
    protected $table = 'form_bahan_baku_lainnya';

    protected $fillable = [
        'header_id',
        'uraian',
        'pemasok',
        'tkdn_kandungan',
        'jumlah_pemakaian',
        'biaya',
        'alokasi_produk',
        'kdn',
        'kln'
    ];
}
