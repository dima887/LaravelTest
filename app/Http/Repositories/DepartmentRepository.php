<?php

namespace App\Http\Repositories;


use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentRepository
{
    /**
     * Просмотр информации о отделах
     * Кол-во сотрудников в отделе
     * Максимальная зарплата в отделе
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getDepartmentInfo()
    {
        $data = Department::query()
            ->leftJoin('department_staff', 'department_staff.department_id', '=', 'departments.id')
            ->leftJoin('staff', 'staff.id', '=', 'department_staff.staff_id')
            ->select('departments.id', 'departments.department_name', DB::raw('COUNT(department_staff.staff_id) AS countStaff, MAX(staff.salary) AS maxSalary'))
            ->orderByDesc('departments.id')
            ->groupBy('departments.department_name')
            ->get();
        return $data;
    }

    public function getCountDepartmentById($id)
    {
        $data = Department::query()
            ->leftJoin('department_staff', 'department_staff.department_id', '=', 'departments.id')
            ->select(DB::raw('COUNT(department_staff.staff_id) AS countStaff'))
            ->where('departments.id', '=', $id)
            ->get();
        return $data;
    }
}
