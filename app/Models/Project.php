<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'description', 'project_url', 'brief_url', 'repository_url',])]
class Project extends Model
{
    use HasUuids;

    public function jiris(): BelongsToMany
    {
        return $this->belongsToMany(Jiri::class, 'jiri_project');
    }
}
