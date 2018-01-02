<?php

namespace App\Http\Controllers;

use App\DiscordServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscordServerController extends Controller
{
    public function public() {
        $servers = DiscordServer::all();
        return view('index', compact('servers'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Auth::user()->servers;
        return view('me.servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('me.servers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ]);

        $server = new DiscordServer();
        $server->name = $request->name;
        $server->discord_id = $request->link;
        $server->tags = $request->tags;
        $server->description = $request->description;
        $server->user_id = Auth::user()->id;

        if ($server->save()) {
            return redirect()->route('servers.index')->with('success', 'Successfully added server!');
        } else {
            return redirect()->route('servers.index')->with('error', 'Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiscordServer  $discordServer
     * @return \Illuminate\Http\Response
     */
    public function show(DiscordServer $discordServer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscordServer  $discordServer
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscordServer $discordServer)
    {
        if ($discordServer->user_id != Auth::user()->id)
            abort(404);

        $server = $discordServer;

        return view('me.servers.edit', compact('server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscordServer  $discordServer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscordServer $discordServer)
    {
        if ($discordServer->user_id != Auth::user()->id)
            abort(404);

        $discordServer->name = $request->name;
        $discordServer->discord_id = $request->link;
        $discordServer->tags = $request->tags;
        $discordServer->description = $request->description;

        if ($discordServer->save()) {
            return redirect()->route('servers.index')->with('success', 'Successfully updated server!');
        } else {
            return redirect()->route('servers.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscordServer  $discordServer
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscordServer $discordServer)
    {
        if ($discordServer->user_id != Auth::user()->id)
            abort(404);



        if ($discordServer->delete()) {
            return redirect()->route('servers.index')->with('success', 'Successfully deleted server!');
        } else {
            return redirect()->route('servers.index')->with('error', 'Something went wrong');
        }
    }
}
