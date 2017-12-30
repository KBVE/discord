<?php

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::get('/', 'DiscordServerController@public')->name('index');

Route::get('/vote/{discordserver}', 'VoteController@create')->name('vote.create');
Route::post('/vote/{discordserver}', 'VoteController@store')->name('vote.store');

Route::get('/me/servers', 'DiscordServerController@index')->name('servers.index');
Route::get('/me/servers/create', 'DiscordServerController@create')->name('servers.create');
Route::post('/me/servers', 'DiscordServerController@store')->name('servers.store');
Route::get('/me/servers/{discordserver}', 'DiscordServerController@view')->name('servers.view');
Route::get('/me/servers/{discordserver}/edit', 'DiscordServerController@edit')->name('servers.edit');
Route::post('/me/servers/{discordserver}/edit', 'DiscordServerController@update')->name('servers.update');
Route::post('/me/servers/{discordserver}/delete', 'DiscordServerController@destroy')->name('servers.destroy');