<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = ['description'];

    // An activity can have many updates over time
    public function updates(): HasMany
    {
        return $this->hasMany(ActivityUpdate::class);
    }
}