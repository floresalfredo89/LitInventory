<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BookDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Languages seeds
        DB::table('book_languages')->insert([
            'name' => 'español'
        ]);

        DB::table('book_languages')->insert([
            'name' => 'inglés',
        ]);

        // Format seeds
        DB::table('book_formats')->insert([
            'name' => 'Tapa Blanda',
            'note' => 'Encuadernación tapa blanda'
        ]);

        DB::table('book_formats')->insert([
            'name' => 'Tapa Dura',
            'note' => 'Encuadernación tapa dura'
        ]);

        // Type (book, manga, comic) seeds
        DB::table('book_types')->insert([
            'name' => 'Libro'
        ]);

        DB::table('book_types')->insert([
            'name' => 'Manga'
        ]);

        DB::table('book_types')->insert([
            'name' => 'Comic'
        ]);

        // Books seeds
        DB::table('books')->insert([
            'book_language_id' => 1,
            'book_format_id' => 1,
            'book_type_id' => 1,
            'isbn' => '9788420412146',
            'title' => 'Don Quijote de la Mancha. Edición Rae',
            'cover_url' => '',
            'publication_year' => 2015,
            'page_count' => 1376,
            'height' => 20.5,
            'width' => 13.3
        ]);

        DB::table('books')->insert([
            'book_language_id' => 1,
            'book_format_id' => 1,
            'book_type_id' => 1,
            'isbn' => '9788498891331',
            'title' => 'Adiós a la Tierra',
            'cover_url' => '',
            'publication_year' => 2020,
            'page_count' => 168,
            'height' => 22.6,
            'width' => 15.2
        ]);

        DB::table('books')->insert([
            'book_language_id' => 1,
            'book_format_id' => 1,
            'book_type_id' => 1,
            'isbn' => '9786073836340',
            'title' => 'Cujo',
            'cover_url' => '',
            'publication_year' => 2023,
            'page_count' => 400,
            'height' => 19,
            'width' => 12.5
        ]);

        // Authors seeds
        DB::table('authors')->insert([
            'name' => 'Miguel De Cervantes Saavedra',
        ]);

        DB::table('authors')->insert([
            'name' => 'Isaac Asimov',
        ]);

        DB::table('authors')->insert([
            'name' => 'Stephen King',
        ]);

        // Genre seeds
        DB::table('genres')->insert([
            'name' => 'Ficción Clásica',
        ]);

        DB::table('genres')->insert([
            'name' => 'Ciencia Ficción',
        ]);

        DB::table('genres')->insert([
            'name' => 'Thriller',
        ]);

        // Author-Book relationship
        DB::table('author_book')->insert([
            'author_id' => 1,
            'book_id' => 1
        ]);
        DB::table('author_book')->insert([
            'author_id' => 2,
            'book_id' => 2
        ]);
        DB::table('author_book')->insert([
            'author_id' => 3,
            'book_id' => 3
        ]);

        // Book-Genre relationship
        DB::table('book_genre')->insert([
            'book_id' => 1,
            'genre_id' => 1
        ]);

        DB::table('book_genre')->insert([
            'book_id' => 2,
            'genre_id' => 2
        ]);

        DB::table('book_genre')->insert([
            'book_id' => 3,
            'genre_id' => 3
        ]);
    }
}
