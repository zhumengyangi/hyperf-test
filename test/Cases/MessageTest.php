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
class MessageTest extends HttpTestCase
{
    public function testMessageIndex()
    {
        $result = $this->get('/message');

        $this->assertSame($result['status'], 'success');
    }

    public function testMessageSave()
    {
        $result = $this->post('/message/save/0', [
            'title' => 'test测试标题',
            'content' => '主题内容',
        ]);

        $this->assertSame($result['status'], 'success');
    }

    public function testMessageDelete()
    {
        $result = $this->get('/message');
        $result = $this->post('/message/delete/' . $result['result']['list'][0]['id']);

        $this->assertSame($result['status'], 'success');
    }
}
