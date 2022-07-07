<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Penjualan';
    protected $fillable = [
        'id_pelanggan',
        'total_price',
    ];

    protected $hidden = [
        'updated_at',  
        'created_at',
        'deleted_at'
    ];
}
