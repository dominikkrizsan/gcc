<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'card_id',
    ];

    public function cards()
    {
        return $this->belongsTo(Card::class, 'card_id', 'id');
    }
}
