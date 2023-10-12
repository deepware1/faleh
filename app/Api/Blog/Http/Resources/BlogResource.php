<?php
 
namespace App\Api\Blog\Http\Resources;
 
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
 
class BlogResource extends JsonResource
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
            "content"   => $this->content,
            "slug" => $this->slug,
            "image" => $this->image(),
        ];
    }
    
}