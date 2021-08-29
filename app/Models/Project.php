<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function team()
    {
        return $this->belongsToMany(Team::class, 'project_team', 'project_id', 'team_id');
    }
}
