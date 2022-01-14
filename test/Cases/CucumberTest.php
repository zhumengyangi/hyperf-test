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
class CucumberTest extends HttpTestCase
{
    public function testCucumberIndex()
    {
        $res = $this->get('/cucumber');
        $this->assertSame('success', $res['status']);
    }

    public function testCucumberSave()
    {
        $res = $this->post('/cucumber/save/0', [
            'title' => 'dsad1i432h235h23u',
            'content' => 'i34biuhb25rou',
        ]);
        $this->assertSame('success', $res['status']);
    }

    public function testCucumberDel()
    {
        $res = $this->get('/cucumber');
        $res = $this->post('/cucumber/del/' . $res['result']['list'][0]['id']);
        $this->assertSame('success', $res['status']);
    }
}
