<?php

namespace App\Http\Controllers;

use App\Models\BookFormat;
use App\Http\Requests\StoreBookFormatRequest;
use App\Http\Requests\UpdateBookFormatRequest;
use App\Http\Resources\BookFormatResource;

class BookFormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve a collection of book formats
        return BookFormatResource::collection(BookFormat::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookFormatRequest $request)
    {
        // Store a new book format in database
        $format = BookFormat::create($request->validated());

        return new BookFormatResource($format);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookFormat $bookFormat)
    {
        // Retrieve the selected book format
        return new BookFormatResource($bookFormat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookFormatRequest $request, BookFormat $bookFormat)
    {
        // Update a book format
        $validated = $request->validated();

        $bookFormat->name = $validated['name'];
        $bookFormat->note = $validated['note'];

        $bookFormat->save();

        return new BookFormatResource($bookFormat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookFormat $bookFormat)
    {
        // Deletes a book type from the database
        $bookFormat->delete();

        return response()->json(null,204);
    }
}
