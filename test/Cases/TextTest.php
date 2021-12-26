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
class TextTest extends HttpTestCase
{
    public function testTextIndex()
    {
        $result = $this->get('/text',[
            'title' => '2',
        ]);
        $this->assertSame($result['status'], 'success');
    }

    public function testTextSave()
    {
        $result = $this->post('/text/save/0', [
            'title' => 'title000001',
            'content' => 'content 00001',
        ]);
        $this->assertSame($result['status'], 'success');
    }

    public function testTextDel()
    {
        $result = $this->get('/text');
        $result = $this->post('/text/delete/' . $result['result']['list'][0]['id']);

        $this->assertSame($result['status'], 'success');
    }
}
