<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTenagaKerjaLangsung extends Model
{
    use HasFactory;
    protected $table = 'form_tenaga_kerja_langsung';

    protected $fillable = [
        'header_id',
        'uraian',
        'kewarganegaraan',
        'tkdn_kandungan',
        'jumlah_orang',
        'gaji_perbulan',
        'alokasi_gaji',
        'kdn',
        'kln'
    ];
}
