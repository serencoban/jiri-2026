<?php

namespace App\Models;

use App\EnumsAttendanceRole;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name','date','begins_at','ends_at','status', 'user_id'])]
#[Table(incrementing:false)]
class Jiri extends Model
{
    use HasUuids, HasFactory;

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'attendances')
            ->withPivot(['role']);
    }

    public function evaluated(): BelongsToMany
    {
        return $this->contacts()->wherePivot('role', EnumsAttendanceRole::Evaluated->value);
    }

    public function evaluators(): BelongsToMany
    {
        return $this->contacts()->wherePivot('role', EnumsAttendanceRole::Evaluator->value);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'assignments')
            ->withPivot('weight'); //sert a prendre la colonnes supp ds la table pivot
    }

}
