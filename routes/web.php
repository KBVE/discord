<?php

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::get('/', 'DiscordServerController@public')->name('index');
Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

Route::post('/vote', 'VoteController@store')->name('vote.store');
Route::get('/vote/{discordServer}', 'VoteController@create')->name('vote.create');
Route::get('/server/{discordServer}', 'DiscordServerController@show')->name('servers.view');

Route::get('/me/servers', 'DiscordServerController@index')->name('servers.index')->middleware('auth');
Route::get('/me/servers/create', 'DiscordServerController@create')->name('servers.create')->middleware('auth');
Route::post('/me/servers', 'DiscordServerController@store')->name('servers.store')->middleware('auth');
Route::get('/me/servers/{discordServer}/edit', 'DiscordServerController@edit')->name('servers.edit')->middleware('auth');
Route::post('/me/servers/{discordServer}/edit', 'DiscordServerController@update')->name('servers.update')->middleware('auth');
Route::get('/me/servers/{discordServer}/delete', 'DiscordServerController@destroy')->name('servers.destroy')->middleware('auth');