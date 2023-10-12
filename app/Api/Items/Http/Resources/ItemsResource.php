<?php
 
namespace App\Api\Items\Http\Resources;
 
use Illuminate\Http\Request;
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
            "contactNumber" => $this->contact_number,
            "image" => $this->image()
        ];
    }
    
}