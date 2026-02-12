<?php

namespace App\Http\Middleware;

//use Illuminate\Validation\UnauthorizedException;
use SergiX44\Nutgram\Nutgram;

class AuthorizeTelegramUser
{
    public function __invoke(Nutgram $bot, $next): void
    {
        if ($bot->user()->id != config('nutgram.authorized_user')) {
            $bot->sendMessage('You are not authorized to use the bot.');
//            throw new UnauthorizedException('Unauthorized');
            return;
        }

        $next($bot);
    }
}
