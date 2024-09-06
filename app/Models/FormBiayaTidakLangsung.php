<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormBiayaTidakLangsung extends Model
{
    use HasFactory;
    protected $table = 'form_biaya_tidak_langsung';

    protected $fillable = [
        'header_id',
        'uraian',
        'pemasok',
        'tkdn_kandungan',
        'jumlah',
        'biaya_perbulan',
        'alokasi_pengunaan',
        'kdn',
        'kln'
    ];  
    
}
