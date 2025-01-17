<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value) => $value ? 'storage/' . $value : '/images/no-image.jpg'
        );
    }

    protected function category(){
        return $this->belongsTo(Category::class);
    }
}
