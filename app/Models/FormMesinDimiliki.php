<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormMesinDimiliki extends Model
{
    use HasFactory;
    protected $table = 'form_mesin_dimiliki';

    protected $fillable = [
        'header_id',
        'uraian',
        'spesifikasi',
        'kepemilikan_dibuat',
        'kepemilikan_dimiliki',
        'alokasi_dalam_negri',
        'jumlah',
        'biaya_depresiasi',
        'alokasi_pengunaan',
        'kdn',
        'kln'
    ];


    
}
