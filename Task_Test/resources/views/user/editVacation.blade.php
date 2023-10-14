@extends('layouts.app')

@section('content')

    <form method="post" action="/home/update/{{ $vacation->id }}" >
        @csrf
        <H1>Edit Vacation</H1>
        <div class="form-group">
            <label for="start_date"> Start date </label>
            <input id="start_date" name="start_date" type="date" class="form-control"  value="{{ $vacation->start_date }}"/>
            @error('start_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="end_date"> End date </label>
            <input id="end_date" name="end_date" type="date" class="form-control"  value="{{ $vacation->end_date  }}"/>
            @error('end_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <input class="btn btn-success" type="submit" value="Save">
    </form>
@endsection
