@extends('layouts.master')

@section('title')
    PLEASE VERIFY YOU ARE NOT A ROBOT
@endsection

@section('content')
    <div class="page">
        <form action="{{ route('vote.store') }}" method="POST" class="form-center">
            {!! NoCaptcha::display() !!}
            {{ csrf_field() }}
            <input type="hidden" name="discord" value="{{ $server->id }}">
            <input type="submit" value="Vote" class="btn btn-success">
        </form>
    </div>
@endsection