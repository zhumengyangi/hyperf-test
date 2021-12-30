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
class DemoTest extends HttpTestCase
{
    public function testDemoIndex()
    {
        $result = $this->get('/demo');
        $this->assertSame($result['status'], 'success');
    }

    public function testDemoSave()
    {
        $result = $this->post('/demo/save/0', [
            'title' => 'dasdsad',
            'content' => '内容1111',
        ]);

        $this->assertSame($result['status'], 'success');
    }

    public function testDemoDel()
    {
        $resultSSS = $this->get('/demo');
        $result = $this->post('/demo/delete/' . $resultSSS['result']['list'][0]['id']);
        $this->assertSame($result['status'], 'success');
    }
}
