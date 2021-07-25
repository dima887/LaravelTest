@extends('layouts.layout')

@section('content')

    <div class="container">
        <h2 class="text-center text-info">Редактирование сотрудника</h2>

        @include('layouts.alerts')

        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <form method="post" action="{{route('staff.update', ['id' => $id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Имя*</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="surname">Фамилия*</label>
                        <input type="text" name="surname" class="form-control" id="surname" value="{{old('surname')}}">
                    </div>
                    <div class="form-group">
                        <label for="patronymic">Отчество</label>
                        <input type="text" name="patronymic" class="form-control" id="patronymic" value="{{old('patronymic')}}">
                    </div>
                    @foreach($gender as $value)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender_id" id="gender_id"
                                   value="{{$value->id}}">
                            <label class="form-check-label" for="gender_id">
                                {{$value->gender}}
                            </label>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="salary">Заработная плата</label>
                        <input type="text" name="salary" class="form-control" id="salary" value="{{old('salary')}}">
                    </div>
                    <div class="form-group">
                        <label for="department_id">Выберите отделы</label>
                        <select multiple class="selectpicker form-control" name="department_id[]">
                            @foreach($department as $value)
                                <option value="{{$value->id}}">{{$value->department_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Изменить</button>
                </form>
            </div>
        </div>
    </div>

@endsection
