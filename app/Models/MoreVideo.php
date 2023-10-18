<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MoreVideo extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($morevideo) {
            $morevideo->slug = Str::slug($morevideo->title, '-');
        });
    }
}
