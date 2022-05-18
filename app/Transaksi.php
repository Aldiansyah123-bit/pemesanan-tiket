<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $fillable = [
        'id_tiket','qty','status'
    ];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class,'id_tiket','id');
    }
}
