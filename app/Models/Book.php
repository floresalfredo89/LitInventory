<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'boook_language_id',
        'book_format_id',
        'book_type_id',
        'isbn',
        'title',
        'cover_url',
        'publication_year',
        'page_count',
        'height',
        'width'
    ];

    // Many to one relationships
    public function bookLanguage()
    {
        return $this->belongsTo(BookLanguage::class);
    }

    public function bookType()
    {
        return $this->belongsTo(BookType::class);
    }

    public function bookFormat()
    {
        return $this->belongsTo(BookFormat::class);
    }

    // Many to many relationships
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
