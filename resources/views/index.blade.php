@extends('layouts.master')

@section('title')
    KBVE SERVER LIST
@endsection

@section('content')
    <div class="page">
        @foreach($servers as $server)
            <div class="server">
                <div class="server-info">
                    <h3>{{ $server->name }}</h3>
                    <p>{{ $server->description }}</p>
                    <a href="{{ $server->discord_id }}" target="_blank">Join server</a>
                </div>
                <div class="server-vote">
                    <a href="{{ route('vote.store', ["discordServer" => $server->id]) }}">{{ $server->score() }} <i class="fa fa-heart"></i></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection