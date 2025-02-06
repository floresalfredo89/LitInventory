<?php

namespace App\Http\Controllers;

use App\Models\BookLanguage;
use App\Http\Requests\StoreBookLanguageRequest;
use App\Http\Requests\UpdateBookLanguageRequest;
use App\Http\Resources\BookLanguageResource;

class BookLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve a collection of book languages
        return BookLanguageResource::collection(BookLanguage::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookLanguageRequest $request)
    {
        // Store a new book language in database
        $bookLanguage = BookLanguage::create($request->validated());

        return new BookLanguageResource($bookLanguage);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookLanguage $bookLanguage)
    {
        // Retrieve the selected book language
        return new BookLanguageResource($bookLanguage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookLanguageRequest $request, BookLanguage $bookLanguage)
    {
        // Update a book language
        $validated = $request->validated();

        $bookLanguage->name = $validated['name'];

        $bookLanguage->save();

        return new BookLanguageResource($bookLanguage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookLanguage $bookLanguage)
    {
        // Deletes a book type from the database
        $bookLanguage->delete();

        return response()->json(null, 204);
    }
}
