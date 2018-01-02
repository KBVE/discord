@extends('layouts.master')

@section('title')
    Adding server
@endsection

@section('content')
    <div class="page">
        <form action="{{ route('servers.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="custom-field">
                <input name="name" type="text" id="name" required value="{{ old('name') }}">
                <label for="name">Server name</label>
            </div>
            <div class="custom-field">
                <input name="link" type="text" id="link" required value="{{ old('link') }}">
                <label for="link">Invite link</label>
            </div>
            <div class="custom-field">
                <textarea name="description" id="description" cols="30" rows="10" maxlength="500" required>{{ old('description') }}</textarea>
                <label for="description">Server description (max 500 letters)</label>
            </div>
            <div class="custom-field">
                <input name="tags" type="text" id="tags" required value="{{ old('tags') }}">
                <label for="tags">Tags (comma seperated)</label>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
@endsection