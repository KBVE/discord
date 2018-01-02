<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscordServer extends Model
{
    public function score() {
        $votes = Vote::where('discordserver_id', '=', $this->id)
            ->where('ip', '=', $_SERVER["REMOTE_ADDR"])
            ->get();

        return $votes->count();
    }

    public function votes() {
        return $this->hasMany('App\Vote', 'discordserver_id', 'id');
    }

    public function hasVoted() {
        $has_vote = Vote::where('discordserver_id', '=', $this->id)
            ->where('ip', '=', $_SERVER["REMOTE_ADDR"])
            ->get();

        if ($has_vote->count() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
