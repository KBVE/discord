<?php

namespace App\Http\Controllers;

use App\DiscordServer;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(DiscordServer $discordServer) {
        if ($discordServer->hasVoted()) {
            $vote = Vote::where('discordserver_id', '=', $discordServer->id)
                ->where('ip', '=', $_SERVER["REMOTE_ADDR"])
                ->first();

            $vote->delete();

            return back();
        }

        $vote = new Vote();
        $vote->discordserver_id = $discordServer->id;
        $vote->ip = $_SERVER["REMOTE_ADDR"];
        $vote->save();

        return back();
    }
}
