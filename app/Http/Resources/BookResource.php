<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'isbn'=> $this->isbn,
            'title'=> $this->title,
            'language'=> new BookLanguageResource($this->bookLanguage),
            'format'=> new BookFormatResource($this->bookFormat),
            'type'=> new BookTypeResource($this->bookType),
            'cover_url'=> $this->cover_url,
            'authors' => AuthorResource::collection($this->authors),
            'genres' => GenreResource::collection($this->genres),
            'publication_year'=> $this->publication_year,
            'page_count'=> $this->page_count,
            'height'=> $this->height,
            'width'=> $this->width
        ];
    }
}
