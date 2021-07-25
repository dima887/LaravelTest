<?php

namespace App\Http\Controllers;

use App\Http\Repositories\DepartmentRepository;
use App\Http\Requests\DepartmentStoreRequest;
use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DepartmentController extends Controller
{
    protected $departmentRepository;

    public function __construct()
    {
        $this->departmentRepository = app(DepartmentRepository::class);
    }
    /**
     * Просмотр информации о отделах
     * Создать новый отдел
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->departmentRepository->getDepartmentInfo();

        return view('department.index', compact('data'));
    }


    /**
     * Сохранение нового отдела
     *
     * @param DepartmentStoreRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentStoreRequest $request)
    {
        Department::create($request->all());

        return redirect()->route('department.index')->with('success', 'Отдел добавлен');
    }

    /**
     * Сохранение отредактированного отдела
     *
     * @param DepartmentStoreRequest $request
     * @param \App\Models\Department $department
     * @return RedirectResponse
     */
    public function update(DepartmentStoreRequest $request, Department $id)
    {
        $save = Department::find($id->id);
        $save->department_name = $request->department_name;
        $save->save();

        return redirect()->route('department.index')->with('success', 'Отдел отредактирован');
    }

    /**
     * Удаление отдела
     *
     * @param  \App\Models\Department  $department
     * @return RedirectResponse
     */
    public function destroy(Department $id)
    {
        $count = $this->departmentRepository->getCountDepartmentById($id->id);

        if ($count[0]->countStaff > 0) {
            return redirect()->back()->with('error', 'Нельзя удалить отдел если в нём есть сотрудники');
        }
        Department::destroy($id->id);

        return redirect()->back()->with('success', 'Отдел удален');
    }
}
