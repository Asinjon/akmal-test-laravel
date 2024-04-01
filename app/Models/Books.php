<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'number_of_pages',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
