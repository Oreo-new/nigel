<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    

    public function replies() : HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
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
