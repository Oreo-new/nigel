<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'links' => 'array',
        'page_icons' => 'array',
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($page) {
            $page->slug = Str::slug($page->title, '-');
        });
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo( Menu::class );
    }
    public function pageArticle(): HasMany
    {
        return $this->hasMany( PageArticle::class );
    }

}
