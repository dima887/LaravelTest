<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'slug',
    ];

    public function staff()
    {
        return $this->belongsToMany(Staff::class);
    }

    public function departmentsStaff()
    {
        return $this->belongsToMany(DepartmentStaff::class);
    }
}
