@extends('layouts.app')

@section('content')
    <table>
        <thead>
        <tr>
            <td>
                <a class="btn btn-primary" href="{{route("createVacation")}}">Create</a>
            </td>
        </tr>
        <tr>
            <th>Start date</th>
            <th>End date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($vacations as $vacation)
            <tr>
                <td>{{ $vacation->start_date }}</td>
                <td>{{ $vacation->end_date }}</td>
                <td>
                    <a  href="{{ route('adminEdit', $vacation->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

