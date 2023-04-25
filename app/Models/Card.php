<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table = "cards";
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'engine',
        'ztoh',
        'qmile',
        'hp',
        'tq',
        'weight',
        'ptow',
        'price',
        'qty',
        'tier',
        'status',
        'trending',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
