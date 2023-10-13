<?php

namespace App\Models;

use LaraZeus\Sky\SkyPlugin;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    protected $translatable = ['title', 'description'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function statusDesc(): string
    {
        $PostStatus = SkyPlugin::get()->getModel('PostStatus')::where('name', $this->status)->first();
        $icon = Blade::render('@svg("' . $PostStatus->icon . '","w-4 h-4 inline-flex")');

        return "<span title='" . __('post status') . "' class='$PostStatus->class'> " . $icon . " {$PostStatus->label}</span>";
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, "parent_id");
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, "parent_id");
    }

    public function image(): Collection | string | null
    {
        if (! $this->getMedia('categories')->isEmpty()) {
            return $this->getFirstMediaUrl('categories');
        } else {
            return $this->featured_image ?? "";
        }
    }

    public function items()
    {
        return $this->hasMany(Item::class, "subcategory_id");
    }
}
