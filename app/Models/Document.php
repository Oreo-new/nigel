<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Document extends Model
{
    use HasFactory, Searchable;
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($document) {
            $document->slug = Str::slug($document->name, '-');
        });
    }
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'pdf' => $this->pdf,
            'external_link' => $this->external_link
        ];
    }
}
