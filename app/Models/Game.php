<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = "game";
    protected $fillable = [
        'user_id',
        'bot_id',
        'score',
        'result',
        'balanceget',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bot()
    {
        return $this->belongsTo(Bot::class, 'bot_id', 'id');
    }
}
