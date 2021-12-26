<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;

Router::get('/message', App\Controller\MessageController::class . '::index');
Router::post('/message/save/{id:\d+}', App\Controller\MessageController::class . '::save');
Router::post('/message/delete/{id:\d+}', App\Controller\MessageController::class . '::delete');

Router::get('/text', App\Controller\TextController::class . '::index');
Router::post('/text/save/{id:\d+}', App\Controller\TextController::class . '::save');
Router::post('/text/delete/{id:\d+}', App\Controller\TextController::class . '::del');