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
class PotatoTest extends HttpTestCase
{
    public function testPotatoIndex()
    {
        $result = $this->get('/potato');
        $this->assertSame($result['status'], 'success');
    }

    public function testPotatoSave()
    {
        $result = $this->post('/potato/save/0', [
            'title' => 'sadasdqwewe1esqq',
            'content' => '内容dsasdas',
        ]);
        $this->assertSame($result['status'], 'success');
    }

    public function testPotatoDel()
    {
        $result = $this->get('/potato');
        $result = $this->post('/potato/del/' . $result['result']['list'][0]['id']);
        $this->assertSame($result['status'], 'success');
    }
}
