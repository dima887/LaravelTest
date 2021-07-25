<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentStaff extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
