<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grocery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'number',
        'price',
    ];

    protected $hidden = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
