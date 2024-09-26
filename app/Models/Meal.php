<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'is_vegetarian',
        'is_daily_special',
        'day_of_week',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
