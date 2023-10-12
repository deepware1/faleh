<?php

namespace App\Api\Items\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Api\Auth\Http\Resources\UsersResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "slug" => $this->slug,
            "price" => $this->price,
            "type" => $this->type,
            "stock" => $this->stock,
            "condition" => $this->condition,
            "section" => $this->section,
            "category" => $this->category->title ?? null,
            "subcategory" => $this->subcategory->title ?? null,
            "currency" => $this->currency->name ?? null,
            "country" => $this->country->name ?? null,
            "city" => $this->city->name ?? null,
            "contact_number" => $this->contact_number,
            "published_at" => Carbon::parse($this->published_at)->format('Y-m-d H:i:s'),
            "image" => $this->image(),
            "user" => new UsersResource($this->user)
        ];
    }
}
