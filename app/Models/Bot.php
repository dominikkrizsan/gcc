<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    use HasFactory;

    protected $table = 'bots';
    protected $fillable = [
        'name',
        'level',
        'image',
        'card_id',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id', 'id');
    }
}
