<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookNoteResource extends JsonResource
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
            'user_book_id' => $this->user_book_id,
            'user_id' => $this->user_id,
            'summary' => $this->summary,
            'page_number' => $this->page_number,
            'note' => $this->note
        ];
    }
}
