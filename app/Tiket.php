<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $fillable = [
        'nama_tiket', 'jenis_tiket','id_kategori','jumlah_tiket','harga_tiket'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori','id');
    }
}
