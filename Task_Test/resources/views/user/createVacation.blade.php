@extends('layouts.app')

@section('content')

    <form method="post"  action="{{route('createVacationsSubmitAdmin')}}">
        @csrf
        <H1>Create Vacation</H1>
        <div class="form-group">
            <label for="start_date"> Start date </label>
            <input id="start_date" name="start_date" type="date" class="form-control"/>
            @error('start_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="end_date"> End date </label>
            <input id="end_date" name="end_date" type="date" class="form-control"/>
            @error('end_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <input class="btn btn-success" type="submit" value="Create">
    </form>
@endsection
