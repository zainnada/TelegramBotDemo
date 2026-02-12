<?php
use SergiX44\Nutgram\Nutgram;
use Illuminate\Support\Facades\Route;

Route::post('/webhook', fn (Nutgram $bot) => $bot->run());
