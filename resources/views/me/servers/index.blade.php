@extends('layouts.master')

@section('title')
    My Servers
@endsection

@section('content')
    <div class="toolbar">
        <a href="{{ route('servers.create') }}" class="btn">Add your server</a>
    </div>
    @if(!empty($errors->all()))
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <div class="page">
        @if($servers->count() == 0)
            <div class="empty-result">
                <h3>No servers yet!</h3>
                <a href="{{ route('servers.create') }}">Create one now</a>
            </div>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Link</td>
                    <td>Score</td>
                    <td style="width: 60px;"></td>
                    <td style="width: 60px;"></td>
                    <td style="width: 60px;"></td>
                </tr>
                </thead>
                <tbody>
                @foreach($servers as $server)
                    <tr>
                        <td>{{ $server->name }}</td>
                        <td>{{ $server->discord_id }}</td>
                        <td>{{ $server->score() }}</td>
                        <td style="width: 60px;"><a href="{{ route('servers.view', ["discordServer" => $server->id]) }}"><i class="fa fa-eye"></i></a></td>
                        <td style="width: 60px;"><a href="{{ route('servers.edit', ["discordServer" => $server->id]) }}"><i class="fa fa-pencil"></i></a></td>
                        <td style="width: 60px;"><a href="{{ route('servers.destroy', ["discordServer" => $server->id]) }}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection