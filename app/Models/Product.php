<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name_product',
        'image_product',
        'description_product',
        'price_product',
        'id_category'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
