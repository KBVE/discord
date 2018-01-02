@extends('layouts.master')

@section('title')
    Adding server
@endsection

@section('content')
    <div class="page">
        <form action="{{ route('servers.update', ["discordServer" => $server->id]) }}" method="POST">
            {{ csrf_field() }}
            <div class="custom-field">
                <input name="name" type="text" id="name" required value="{{ $server->name }}">
                <label for="name">Server name</label>
            </div>
            <div class="custom-field">
                <input name="link" type="text" id="link" required value="{{ $server->discord_id }}">
                <label for="link">Invite link</label>
            </div>
            <div class="custom-field">
                <textarea name="description" id="description" cols="30" rows="10" required>{{ $server->description }}</textarea>
                <label for="description">Server description</label>
            </div>
            <div class="custom-field">
                <input name="tags" type="text" id="tags" required value="{{ $server->tags }}">
                <label for="tags">Tags (comma seperated)</label>
            </div>
            <input type="submit" class="btn btn-success" value="Update">
        </form>
    </div>
@endsection