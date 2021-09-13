<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeKpi extends Model
{
    use HasFactory;

    public $table = 'employee_kpi';

    protected $fillable = ['employee_id', 'kpi_id', 'level'];
}
