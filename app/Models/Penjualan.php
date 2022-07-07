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
        'customer_id',
        'total_price',
    ];

    protected $hidden = [
        'created_at',
        'deleted_at'
    ];
}
