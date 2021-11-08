<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read int $id
 * @property-read string $title
 * @property-read text $description
 * @property-read text $content
 * @property-read string $image
 * @property-read bool $is_active
 * @property-read string $published_at
 * @property-read string $created_at
 * @property-read string $updated_at
 */
final class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'description'   => $this->description ?? null,
            'content'       => $this->content ?? null,
            'image'         => $this->image ?? null,
            'is_active'     => $this->is_active,
            'published_at'  => $this->published_at,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
