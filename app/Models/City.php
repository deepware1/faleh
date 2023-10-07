<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $guarded = [];

    protected $translatable = ['name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
