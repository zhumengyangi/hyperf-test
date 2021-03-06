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
class PepperTest extends HttpTestCase
{
    public function testPepperIndex()
    {
        $result = $this->get('/pepper');
        $this->assertSame('success', $result['status']);
    }

    public function testPepperSave()
    {
        $result = $this->post('/pepper/save/0', [
            'title' => 'asdad2e1eefwwefwef',
            'content' => '内容内容内容内容内容内容内容内容内容内容内容内容',
        ]);
        $this->assertSame('success', $result['status']);
    }

    public function testPepperDel()
    {
        $result = $this->get('/pepper');
        $result = $this->post('/pepper/del/' . $result['result']['list'][0]['id']);
        $this->assertSame('success', $result['status']);
    }
}
