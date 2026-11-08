<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['firstname', 'lastname', 'email', 'image',])]
class Contact extends Model
{
    use HasUuids;

    public function jiris(): BelongsToMany
    {
        return $this->belongsToMany(Jiri::class, 'attendances');

    }
}
