<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemPenjualan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'item_penjualan';
    protected $fillable = [
        'id_nota',
        'id_barang',
        'qty',
        'price',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
