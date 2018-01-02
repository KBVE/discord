<?php

namespace App\Http\Controllers;

use App\DiscordServer;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function create(DiscordServer $discordServer) {
        $server = $discordServer;
        return view('vote', compact('server'));
    }

    public function store(Request $request) {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $discordServer = DiscordServer::find($request->discord);

        if ($discordServer->hasVoted()) {
            $vote = Vote::where('discordserver_id', '=', $request->discord)
                ->where('ip', '=', $_SERVER["REMOTE_ADDR"])
                ->first();

            $vote->delete();

            return redirect()->route('index')->with('success', 'Successfully casted vote!');
        }

        $vote = new Vote();
        $vote->discordserver_id = $request->discord;
        $vote->ip = $_SERVER["REMOTE_ADDR"];
        $vote->save();

        return redirect()->route('index')->with('success', 'Successfully casted vote!');
    }
}
