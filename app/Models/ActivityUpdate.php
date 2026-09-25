<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityUpdate extends Model
{
    protected $fillable = ['activity_id', 'user_id', 'status', 'remark'];

    // Every update belongs to one specific activity
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    // Every update was made by one specific user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}