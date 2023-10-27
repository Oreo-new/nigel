<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($event) {
            $event->slug = Str::slug($event->title, '-');
        });
    }
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'intro_text' => $this->intro_text
        ];
    }
}
