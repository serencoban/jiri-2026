<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name','date','begins_at','ends_at','status'])]
class Jiri extends Model
{
    use HasUuids;

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'attendances');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'assignments');
    }

}
