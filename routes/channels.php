<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chatroom.1', function ($user) {
    return $user->role === 'admin' || $user->role === 'employee';
});

Broadcast::channel('chatroom.2', function ($user) {
    return $user->role === 'saler' || $user->role === 'employee';
});
