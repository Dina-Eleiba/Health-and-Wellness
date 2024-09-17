<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'slug',
        'price',
        'quantity',
        'weight_unit',
        'category_id',
        'brand_id',
        'image',
        'status',
    ];


    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function Category() {
        return $this->belongsTo(Category::class);
    }


    public function Reviews() {
        return $this->hasMany(Review::class);
    }
}
