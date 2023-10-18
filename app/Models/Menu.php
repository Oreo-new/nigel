<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function ($menu) {
            $menu->url = Str::slug($menu->name, '-');
        });
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo( Page::class );
    }

    public static function getMenus(): \Illuminate\Support\Collection
    {
        return static::query()->orderBy('order', 'asc')->get();
    }
}
