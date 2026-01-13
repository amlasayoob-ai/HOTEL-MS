<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'Room_price',
        'Room_type',
        'Room_condition',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
