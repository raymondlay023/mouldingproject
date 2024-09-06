<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormMesinSewa extends Model
{
    use HasFactory;
    protected $table = 'form_mesin_sewa';

    protected $fillable = [
        'header_id',
        'uraian',
        'spesifikasi',
        'pemasok',
        'kepemilikan_dibuat',
        'kepemilikan_dimiliki',
        'alokasi_dalam_negri',
        'jumlah_unit',
        'biaya_perbulan',
        'alokasi_pengunaan',
        'kdn',
        'kln'
    ];


    
}
