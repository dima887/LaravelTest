<?php

namespace App\Http\Repositories;

use App\Models\Department;
use App\Models\Gender;
use App\Models\Staff;

class StaffRepository
{
    /**
     * Просмотр информации о сотрудниках
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getStaffInfo()
    {
        $data = Staff::query()->with('departments', 'gender')->get();
        return $data;
    }

    /**
     * Получить список полов
     *
     * @return mixed
     */
    public function getGenderAll()
    {
        $data = Gender::select('id', 'gender')->toBase()->get();
        return $data;
    }

    /**
     * Получить список отделов
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDepartmentAll()
    {
        $data = Department::query()->select('id', 'department_name')->toBase()->get();
        return $data;
    }

    /**
     * Получить отдел по id
     *
     * @param $id
     * @return mixed
     */
    public function getDepartmentId($id)
    {
        $data = Department::find($id);
        return $data;
    }
}
