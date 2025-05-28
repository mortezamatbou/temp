<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'another' => $this->whenNotNull($this->another),
            'email' => $this->when($request->user(), $this->email),
            'articles' => ArticleResource::collection($this->articles),
            'articles_count' => $this->whenCounted('articles'),
        ];
    }
}
