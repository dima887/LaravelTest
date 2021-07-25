@extends('layouts.layout')

@section('content')

    <div class="container">
        <h2 class="text-center text-info">Список отделов</h2>
        <div class="text-center">
        <button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@getbootstrap">Добавить отдел</button>
        </div>

        @include('layouts.alerts')
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить новый отдел</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('department.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="department_name">Название</label>
                                <input type="text" name="department_name" class="form-control" id="department_name">
                            </div>
                            <hr>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Отдел</th>
                <th scope="col">Количество сотрудников</th>
                <th scope="col">Максимальная заработная плата среди сотрудников отдела</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $val)
                <tr>
                    <th scope="row">{{$val->department_name}}</th>
                    <td>{{$val->countStaff}}</td>
                    <td>{{$val->maxSalary}}</td>
                    <td>
                        <div class="text-center">
                            <button type="button" class="btn btn-info mt-1" data-bs-toggle="modal" data-bs-target="#edit-{{$val->id}}"
                                    data-bs-whatever="@getbootstrap">Отредактировать</button>
                        </div>
                    </td>
                    <td>
                        <form action="{{route('department.destroy', ['id' => $val->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-block btn-danger"
                                    wfd-id="44" value="submit">Удалить</button>
                        </form>
                    </td>

                </tr>

                <div class="modal fade" id="edit-{{$val->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Изменить название отдела</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{route('department.update', ['id' => $val->id])}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="department_name">Название</label>
                                        <input type="text" name="department_name" class="form-control" id="department_name">
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                    <button type="submit" class="btn btn-primary">Отредактировать</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
