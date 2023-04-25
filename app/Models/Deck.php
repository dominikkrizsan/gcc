<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;

    protected $table = "decks";
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'image',
        'engine',
        'ztoh',
        'qmile',
        'hp',
        'tq',
        'weight',
        'ptow',
        'tier',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
