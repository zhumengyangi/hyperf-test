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
class ChiliTest extends HttpTestCase
{
    public function testChiliIndex()
    {
        $result = $this->get('/chili');
        $this->assertSame($result['status'], 'success');
    }

    public function testChiliSave()
    {
        $result = $this->post('/chili/save/0', [
            'title' => 'test',
            'content' => 'asdasda',
        ]);
        $this->assertSame($result['status'], 'success');
    }

    public function testChiliDel()
    {
        $result = $this->get('/chili');
        $result = $this->post('/chili/del/' . $result['result']['list'][0]['id']);
        $this->assertSame($result['status'], 'success');
    }
}
