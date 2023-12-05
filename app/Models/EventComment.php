<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventComment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function replies() : HasMany
    {
        return $this->hasMany(EventComment::class, 'parent_id');
    }

    public function deleteWithReplies()
    {
        // Delete replies first
        $this->replies->each(function ($reply) {
            $reply->deleteWithReplies();
        });

        // Then delete the comment itself
        $this->delete();
    }
}
