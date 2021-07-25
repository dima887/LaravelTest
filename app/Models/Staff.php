<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'gender_id',
        'salary',
        'department_id',
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function departmentsStaff()
    {
        return $this->belongsToMany(DepartmentStaff::class);
    }
}
