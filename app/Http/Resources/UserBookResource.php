<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'book' => new BookResource($this->book),
            'notes' => BookNoteResource::collection($this->notes),
            'readed' => $this->readed,
            'acquired_at' => $this->acquired_at,
            'buy_price' => $this->buy_price
        ];
    }
}
