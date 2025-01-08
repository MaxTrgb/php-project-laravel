<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => Str::words($attributes['description'], 5, '...'),
        );
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value) => $value ? 'storage/' . $value : '/images/no-image.jpg'
        );
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
 
}
