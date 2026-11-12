<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'description', 'project_url', 'repo_url',])]
class Project extends Model
{
    use HasUuids, HasFactory;

    public function jiris(): BelongsToMany
    {
        return $this->belongsToMany(Jiri::class, 'assignments');
    }
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
