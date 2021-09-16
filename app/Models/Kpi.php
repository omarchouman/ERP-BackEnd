<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date'];

    public function employee()
    {
        return $this->belongsToMany(Employee::class, 'employee_kpi', 'kpi_id', 'employee_id')->withPivot(['level']);
    }
}
