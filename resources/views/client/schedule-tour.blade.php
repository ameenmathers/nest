@extends('layouts.app')

@section('content')


    <div class="properties">
        @include('notification')

        <div class="container card" style="width:700px; padding: 50px;">
            <h3>Schedule tour for {{$property->name}}</h3><br><br>
            <form method="POST" action="{{ route('client-schedule-tour') }}"  enctype="multipart/form-data">
                @csrf
                @method('POST')
                    <input type="hidden" class="form-control" name="pid" value="{{$property->pid}}" required>
                    <input type="hidden" class="form-control" name="agent_id" value="{{$property->agent_id}}" required>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required min="{{ \Carbon\Carbon::now()->toDateString() }}">
                    @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                    @error('time')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>




@endsection
