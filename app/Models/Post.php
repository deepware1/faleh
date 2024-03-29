<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use LaraZeus\Sky\SkyPlugin;
use Illuminate\Support\Collection;
use LaraZeus\Sky\Models\Post as BasePost;

class Post extends BasePost
{
    public function image(): Collection | string | null
    {
        if (! $this->getMedia('posts')->isEmpty()) {
            return $this->getFirstMediaUrl('posts');
        } else {
            return $this->featured_image ?? SkyPlugin::get()->getDefaultFeaturedImage();
        }
    }

    public function scopeIsPublished($query)
    {
        return $query->where('status', 'publish');
        
    }
}
