@extends('layouts.app')

@section('content')
    <table >
        <thead>
            <tr>
                <td>
                    <a class="btn btn-primary" href="{{route("createVacation")}}">Create</a>
                </td>
            </tr>
            <tr>
                <th>
                    <p>Id</p>
                </th>
                <th>
                    <p>user id</p>
                </th>
                <th>
                    <p>Start date</p>
                </th>
                <th>
                    <p>End date</p>
                </th>
                <th>
                    <p>Is valid</p>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($vacations as $vacation)
            <tr>
                <td>{{ $vacation->id }}</td>
                <td>{{ $vacation->user_id }}</td>
                <td>{{ $vacation->start_date }}</td>
                <td>{{ $vacation->end_date }}</td>
                <td>{{ $vacation->is_valid }}</td>
                <td>
                    <a  href="{{ route('adminEdit', $vacation->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
