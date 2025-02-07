<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookNote extends Model
{
    //
    protected $fillable = [
        'user_book_id',
        'user_id',
        'summary',
        'page_number',
        'note'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
