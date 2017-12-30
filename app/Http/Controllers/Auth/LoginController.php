<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {
        $client = new \GuzzleHttp\Client();
        $result = $client->get('https://api.kbve.com/user/' . $request->user,
            [
                'headers' => ['x-session-token' => $request->token]
            ]);
        $kbve_data = \GuzzleHttp\json_decode($result->getBody()->getContents())->data;

        $user = User::firstOrNew(['kbve_id' => $kbve_data->id]);
        $user->kbve_id = $kbve_data->id;
        $user->username = $kbve_data->username;
        $user->token = $request->token;
        $user->save();

        Auth::login($user);
    }
}
