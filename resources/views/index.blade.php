@extends('layouts.layout')

@section('content')

    <div class="container">
        <table class="table table-bordered mt-4">
            <tr>
                <th></th>
                @foreach($data as $val)
                    <th scope="col">{{$val->department_name}}</th>
                @endforeach
            </tr>
            @foreach($depStaff as $key => $val)
                <tr>
                    <th scope="">{{$val->staff->name}}</th>
                    <th>{{$val->department->department_name}}</th>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
