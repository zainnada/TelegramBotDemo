<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Http\Middleware\AuthorizeTelegramUser;
use App\Models\User;
use SergiX44\Nutgram\Nutgram;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

//$bot->middleware(AuthorizeTelegramUser::class);

$bot->onCommand('start', function (Nutgram $bot) {
    $bot->sendMessage('What is up!');
})->description('The start command!');

$bot->onCommand('whoami', function (Nutgram $bot) {
    $bot->sendMessage('You are: '.$bot->chat()->id);
});
//    ->middleware(AuthorizeTelegramUser::class);

$bot->onCommand('refund {email}', function (Nutgram $bot,string $email) {
    $user = User::firstWhere('email', $email);
    if (!$user) {
        $bot->sendMessage("Sorry we can't find that user!");
        return;
    }
    $bot->sendMessage("done.");
})->description('The refund command!');

$bot->fallback(function (Nutgram $bot) {
    $bot->sendMessage('Sorry, i didn\'t get that, try /start');
});
