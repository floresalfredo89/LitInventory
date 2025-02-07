<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use App\Http\Requests\StoreUserBookRequest;
use App\Http\Requests\UpdateUserBookRequest;
use App\Http\Resources\UserBookResource;
use Illuminate\Support\Facades\Auth;

class UserBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Usuario autenticado
        //$user = Auth::user();

        return UserBookResource::collection(UserBook::where('user_id',1)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserBookRequest $request)
    {
        // Store a new UserBook in database
        $userBook = UserBook::create($request->validated());

        return new UserBookResource($userBook);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserBook $userBook)
    {
        // Retrieve the selected user book
        return new UserBookResource($userBook);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserBookRequest $request, UserBook $userBook)
    {
        // Update a user book
        $validated = $request->validated();

        $userBook->book_id = $validated['book_id'];
        $userBook->acquired_at = $validated['acquired_at'];
        $userBook->buy_price = $validated['buy_price'];

        $userBook->save();

        return new UserBookResource($userBook);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserBook $userBook)
    {
        // Deletes an user book from the database
        $userBook->delete();

        return response()->json(null,204);
    }
}
