<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'id_transaction';
    public $timestamps = true;

    protected $fillable = [
        'name_product',
        'qty',
        'total_price',
        'id',
    ];
}
