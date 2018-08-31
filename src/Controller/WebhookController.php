<?php

declare(strict_types=1);

/*
 * This file is part of the `botman-demo` project.
 *
 * (c) Sergio Gómez <sergio@uco.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use BotMan\BotMan\BotMan;
use Symfony\Component\HttpFoundation\Response;

class WebhookController
{
    public function __invoke(BotMan $bot): Response
    {
        $bot->fallback(function (BotMan $bot): void {
            $bot->reply($bot->getMessage()->getText());
        });

        $bot->listen();

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}
