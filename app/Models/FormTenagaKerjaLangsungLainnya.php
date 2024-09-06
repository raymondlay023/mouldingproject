<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTenagaKerjaLangsungLainnya extends Model
{
    use HasFactory;

    protected $table = 'form_tenaga_kerja_langsung_lainnya';

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
