<?php

namespace App\Http\Controllers;

use App\Http\Repositories\StaffRepository;
use App\Http\Requests\StaffStoreRequest;
use App\Models\Staff;
use Illuminate\Http\RedirectResponse;

class StaffController extends Controller
{
    protected $staffRepository;

    public function __construct()
    {
        $this->staffRepository = app(StaffRepository::class);
    }

    /**
     * Просмотр информации о сотрудниках
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->staffRepository->getStaffInfo();

        return view('staff.index', compact('data'));
    }

    /**
     * Создание нового сотрудника
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $gender = $this->staffRepository->getGenderAll();
        $department = $this->staffRepository->getDepartmentAll();

        return view('staff.create', compact('gender', 'department'));
    }

    /**
     * Сохранение нового сотрудника
     *
     * @param StaffStoreRequest $request
     * @return RedirectResponse
     */
    public function store(StaffStoreRequest $request)
    {
        $staff = Staff::create($request->except('department_id'));
        $categories = $this->staffRepository->getDepartmentId($request->department_id);
        $staff->departments()->attach($categories);

        return redirect()->route('staff.index')->with('success', 'Сотрудник успешно добавлен');
    }

    /**
     * Редактирование сотрудника
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Staff $id)
    {
        $gender = $this->staffRepository->getGenderAll();
        $department = $this->staffRepository->getDepartmentAll();

        return view('staff.edit', compact('id', 'gender', 'department'));
    }

    /**
     * Сохранение отредактированного сотрудника
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return RedirectResponse
     */
    public function update(StaffStoreRequest $request, Staff $id)
    {
        $save = Staff::find($id->id);
        $save->name = $request->name;
        $save->surname = $request->surname;
        $save->patronymic = $request->patronymic;
        $save->patronymic = $request->patronymic;
        $save->gender_id = $request->gender_id;
        $save->salary = $request->salary;
        $save->departments()->sync($request->department_id);
        $save->save();

        return redirect()->route('staff.index')->with('success', 'Сотрудник отредактирован');
    }

    /**
     * Удаление сотрудника
     *
     * @param  \App\Models\Staff  $staff
     * @return RedirectResponse
     */
    public function destroy(Staff $id)
    {
        Staff::find($id->id)->departments()->detach();
        Staff::find($id->id)->delete();

        return redirect()->back()->with('success', 'Сотрудник удален');
    }
}
