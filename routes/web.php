<?php

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::get('/', 'DiscordServerController@public')->name('index');
Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

Route::get('/vote/{discordserver}', 'VoteController@create')->name('vote.create');
Route::post('/vote/{discordserver}', 'VoteController@store')->name('vote.store');

Route::get('/me/servers', 'DiscordServerController@index')->name('servers.index')->middleware('auth');
Route::get('/me/servers/create', 'DiscordServerController@create')->name('servers.create')->middleware('auth');
Route::post('/me/servers', 'DiscordServerController@store')->name('servers.store')->middleware('auth');
Route::get('/me/servers/{discordserver}', 'DiscordServerController@view')->name('servers.view')->middleware('auth');
Route::get('/me/servers/{discordserver}/edit', 'DiscordServerController@edit')->name('servers.edit')->middleware('auth');
Route::post('/me/servers/{discordserver}/edit', 'DiscordServerController@update')->name('servers.update')->middleware('auth');
Route::post('/me/servers/{discordserver}/delete', 'DiscordServerController@destroy')->name('servers.destroy')->middleware('auth');