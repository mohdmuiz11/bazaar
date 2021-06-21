<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_name'
    ];

    // to list items in a certain category,
    // use: {{ Category::find(id)->items }}
    public function items() {
        return $this->hasMany(Item::class, 'catID');
    }
}
