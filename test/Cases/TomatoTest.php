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
namespace HyperfTest\Cases;

use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class TomatoTest extends HttpTestCase
{
    public function testTomatoIndex()
    {
        $result = $this->get('/tomato');
        $this->assertSame($result['status'], 'success');
    }

    public function testTomatoSave()
    {
        $result = $this->post('/tomato/save/0', [
            'title' => 'dasadqwdqdsa',
            'content' => '内容萨达萨达是',
        ]);
        $this->assertSame($result['status'], 'success');
    }

    public function testTomatoDel()
    {
        $result = $this->get('/tomato');
        $result = $this->post('/tomato/delete/' . $result['result']['list'][0]['id']);
        $this->assertSame($result['status'], 'success');
    }
}
