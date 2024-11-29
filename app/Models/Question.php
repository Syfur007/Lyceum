<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    public function upvotes(): HasMany {
        return $this->hasMany(Upvote::class);
    }

    public function answers(): HasMany {
        return $this->hasMany(Answer::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
