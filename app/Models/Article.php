<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = Str::slug($article->title, '-');
        });
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
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
