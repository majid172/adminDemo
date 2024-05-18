<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cat_id',
        'price',
        'quantity',
        'description',
        'image',
        'path',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }
}
