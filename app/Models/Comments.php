<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'books_comment';
    protected $fillable = [
        'book_id',
        'user_id',
        'text', 
        'post_id'
    ];
}
