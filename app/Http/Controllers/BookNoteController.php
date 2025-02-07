<?php

namespace App\Http\Controllers;

use App\Models\BookNote;
use App\Http\Requests\StoreBookNoteRequest;
use App\Http\Requests\UpdateBookNoteRequest;
use App\Http\Resources\BookNoteResource;
use Illuminate\Support\Facades\Auth;

class BookNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve a collection of book notes from an authenticated user
        $user = Auth::user();

        /* return BookNoteResource::collection(BookNote::where('user_id',$user->id)); */
        return BookNoteResource::collection(BookNote::where('user_id',1)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookNoteRequest $request)
    {
        // Store a new book note in database
        $bookNote = BookNote::create($request->validated());

        return new BookNoteResource($bookNote);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookNote $bookNote)
    {
        // Retrieve the selected book note
        return new BookNoteResource($bookNote);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookNoteRequest $request, BookNote $bookNote)
    {
        // Update a book
        $validated = $request->validated();

        $bookNote->summary = $validated['summary'];
        $bookNote->page_number = $validated['page_number'];
        $bookNote->note = $validated['note'];

        $bookNote->save();

        return new BookNoteResource($bookNote);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookNote $bookNote)
    {
        // Deletes a Book note
        $bookNote->delete();

        return response()->json(null, 204);
    }
}
