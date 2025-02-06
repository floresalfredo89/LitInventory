<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use App\Http\Requests\StoreBookTypeRequest;
use App\Http\Requests\UpdateBookTypeRequest;
use App\Http\Resources\BookTypeResource;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve a collection of book types
        return BookTypeResource::collection(BookType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookTypeRequest $request)
    {
        // Store a new book type in database
        $bookType = BookType::create($request->validated());

        return new BookTypeResource($bookType);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookType $bookType)
    {
        // Retrieve the selected book type
        return new BookTypeResource($bookType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookTypeRequest $request, BookType $bookType)
    {
        // Update a book type
        $validated = $request->validated();

        $bookType->name = $validated['name'];

        $bookType->save();

        return new BookTypeResource($bookType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookType $bookType)
    {
        // Deletes a book type from the database
        $bookType->delete();

        return response()->json(null,204);
    }
}
