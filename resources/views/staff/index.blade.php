@extends('layouts.layout')

@section('content')

    <div class="container">
        <h2 class="text-center text-info">Список сотрудников</h2>
        <div class="text-center">
            <a href="{{route('staff.create')}}">
                <button type="button" class="btn btn-primary mt-1">Добавить сотрудника</button>
            </a>
        </div>

        @include('layouts.alerts')

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Отчество</th>
                <th scope="col">Пол</th>
                <th scope="col">Заработная плата</th>
                <th scope="col">Названия отделов</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $val)
                <tr>
                        <th scope="row">{{$val->id}}</th>
                        <td>{{$val->name}}</td>
                        <td>{{$val->surname}}</td>
                        <td>{{$val->patronymic}}</td>
                        <td>
                            @isset($val->gender)
                                {{$val->gender['gender']}}
                            @endisset
                        </td>
                        <td>{{$val->salary}}</td>
                        <td>
                        @foreach($val->departments as $val3)
                            {{$val3->department_name}},
                        @endforeach
                        </td>
                    <td>
                        <a href="{{route('staff.edit', ['id' => $val->id])}}">
                            <button type="button" class="btn btn-block btn-info"
                                    wfd-id="544">Редактировать</button></a>
                    </td>

                    <td>
                        <form action="{{route('staff.destroy', ['id' => $val->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-block btn-danger"
                                    wfd-id="44" value="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
