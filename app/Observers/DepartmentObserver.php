<?php

namespace App\Observers;

use App\Models\Department;
use Illuminate\Support\Str;

class DepartmentObserver
{

    /**
     * Обработка перед добавлением записи
     *
     * @param Department $department
     */
    public function creating(Department $department)
    {
        $this->setSlug($department);
    }

    /**
     * Обработка перед обновлением записи
     *
     * @param Department $department
     */
    public function updating(Department $department)
    {
        $this->setSlug($department);
    }
    /**
     * Handle the Department "created" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function created(Department $department)
    {
        //
    }

    /**
     * Handle the Department "updated" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function updated(Department $department)
    {
        //
    }

    /**
     * Handle the Department "deleted" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function deleted(Department $department)
    {
        //
    }

    /**
     * Handle the Department "restored" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function restored(Department $department)
    {
        //
    }

    /**
     * Handle the Department "force deleted" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function forceDeleted(Department $department)
    {
        //
    }

    /**
     * @param Department $department
     * @return string
     */
    public function setSlug(Department $department)
    {
        return $department['slug'] = Str::slug($department->department_name, '-');
    }
}
