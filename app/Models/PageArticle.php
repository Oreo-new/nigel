<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
class PageArticle extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($page_article) {
            $page_article->slug = Str::slug($page_article->title, '-');
        });
    }
    public function page(): BelongsTo
    {
        return $this->belongsTo( Page::class );
    }
}
