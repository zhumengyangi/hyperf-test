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

Router::get('/tag', App\Controller\TagController::class . '::index');
Router::post('/tag/save/{id:\d+}', App\Controller\TagController::class . '::save');
Router::post('/tag/delete/{id:\d+}', App\Controller\TagController::class . '::del');

Router::get('/demo', App\Controller\DemoController::class . '::index');
Router::post('/demo/save/{id:\d+}', App\Controller\DemoController::class . '::save');
Router::post('/demo/delete/{id:\d+}', App\Controller\DemoController::class . '::del');

Router::get('/potato', App\Controller\PotatoController::class . '::index');
Router::post('/potato/save/{id:\d+}', App\Controller\PotatoController::class . '::save');
Router::post('/potato/del/{id:\d+}', App\Controller\PotatoController::class . '::del');

Router::get('/tomato', App\Controller\TomatoController::class . '::index');
Router::post('/tomato/save/{id:\d+}', App\Controller\TomatoController::class . '::save');
Router::post('/tomato/delete/{id:\d+}', App\Controller\TomatoController::class . '::del');

Router::get('/chili', App\Controller\ChiliController::class . '::index');
Router::post('/chili/save/{id:\d+}', App\Controller\ChiliController::class . '::save');
Router::post('/chili/del/{id:\d+}', App\Controller\ChiliController::class . '::del');

Router::get('/book', App\Controller\BookController::class . '::index');
Router::post('/book/save/{id:\d+}', App\Controller\BookController::class . '::save');
Router::post('/book/status/{id:\d+}', App\Controller\BookController::class . '::status');

Router::get('/user_book', App\Controller\UserBookController::class . '::index');
Router::post('/user_book/save/{id:\d+}', App\Controller\UserBookController::class . '::save');

Router::get('/pepper', App\Controller\PepperController::class . '::index');
Router::post('/pepper/save/{id:\d+}', App\Controller\PepperController::class . '::save');
Router::post('/pepper/del/{id:\d+}', App\Controller\PepperController::class . '::del');