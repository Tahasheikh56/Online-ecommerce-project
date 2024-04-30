<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;
    protected $table ="products";

    protected $fillable = [
        'title',
        'description',
        'price',
        'quantity',
        'image',
        'other_media',
        'status',
        'category_id',
        'user_id',
    ];
}
