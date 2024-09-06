<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormBahanBakuLangsung extends Model
{
    use HasFactory;
    protected $table = 'form_bahan_baku_langsung';

    protected $fillable = [
        'header_id',
        'material_name',
        'satuan_material',
        'negara_asal',
        'pemasok',
        'tkdn_kandungan',
        'jumlah_pemakaian',
        'harga_satuan_material',
        'kdn',
        'kln'
    ];
    
}
