<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Label extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
    public function tasks():BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }

}
