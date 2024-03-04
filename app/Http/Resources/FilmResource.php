<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            'name' => $this->name,
            'isPublished' => $this->isPublished,
            'poster' => $this->poster,
            'date' => $this->created_at,
            'genres' => $this->genres()->orderByPivot('genre_id')->pluck('title'),
        ];
    }
}
