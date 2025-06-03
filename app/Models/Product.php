<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image'
    ];

    // في Product model
protected $appends = ['image_url'];

public function getImageUrlAttribute()
{
    return $this->image ? url($this->image) : null;
}

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}