<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve a collection of Books
        return BookResource::collection(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // Store a new Book in database
        $book = Book::create($request->validated());
        $book->authors()->attach($request->authors);
        $book->genres()->attach($request->genres);

        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Retrieve the selected book
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        // Update a book
        $validated = $request->validated();

        $book->isbn = $validated['isbn'];
        $book->title = $validated['title'];
        $book->language_id = $validated['language_id'];
        $book->format_id = $validated['format_id'];
        $book->type_id = $validated['type_id'];
        $book->cover_url = $validated['cover_url'];
        $book->publication_year = $validated['publication_year'];
        $book->page_count = $validated['page_count'];
        $book->height = $validated['height'];
        $book->width = $validated['width'];

        $book->authors()->sync($request->authors);
        $book->genres()->sync($request->genres);

        $book->save();

        return new BookResource($book);
        return response($book,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Deletes a Book from the database
        $book->delete();

        /* return response()->json([
            "data" => [
                "book_id" => $book->id,
                "title" => $book->title,
                "deleted" => true
            ]
        ]); */

        return response()->json(null,204);
    }
}
