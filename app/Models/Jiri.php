<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name','date','begins_at','ends_at','status', 'user_id'])]
class Jiri extends Model
{
    use HasUuids, HasFactory;

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'attendances');
    }

    //il nya pas que les contacts, les evalué et evaluateurs aussi sont diff ! + filtrer avec wherepivot ...
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'assignments')
            ->withPivot('weight'); //sert a prendre la colonnes supp ds la table pivot
    }

}
