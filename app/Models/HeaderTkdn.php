<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderTkdn extends Model
{
    use HasFactory;
    protected $table = 'header_tkdn';

    protected $fillable = [
        'penyedia_barang',
        'alamat',
        'product_name',
        'product_type',
        'spesifikasi',
        'standart'
    ];

    public function formPertama()
    {
        return $this->hasMany(FormBahanBakuLangsung::class, 'header_id');
    }

    public function formKedua()
    {
        return $this->hasMany(FormBahanBakuLainnya::class, 'header_id');
    }

    public function formKetiga()
    {
        return $this->hasMany(FormTenagaKerjaLangsung::class, 'header_id');
    }

    public function formKeempat()
    {
        return $this->hasMany(FormTenagaKerjaLangsungLainnya::class, 'header_id');
    }

    public function formKelima()
    {
        return $this->hasMany(FormTenagaKerjaTidakLangsung::class, 'header_id');
    }

    public function formKeenam()
    {
        return $this->hasMany(FormMesinDimiliki::class, 'header_id');
    }

    public function formKetujuh()
    {
        return $this->hasMany(FormMesinSewa::class, 'header_id');
    }
    
    public function formKedelapan()
    {
        return $this->hasMany(FormBiayaTidakLangsung::class, 'header_id');
    }

}
