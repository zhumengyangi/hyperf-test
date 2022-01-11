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

use App\Model\Book;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class BookTest extends HttpTestCase
{
    public function testBookIndex()
    {
        $result = $this->get('/book');
        $this->assertSame('success', $result['status']);
    }

    public function testBookSave()
    {
        $result = $this->post('/book/save/0', [
            'name' => '我们为何结婚，又为何不忠',
            'title' => '性、婚姻和外遇的自然史',
            'code' => '9787521709193',
            'price' => 6800,
            'author' => '海伦·费舍尔',
            'translate' => '倪韬 王国平 叶杨',
            'press' => '中信出版社',
        ]);
        $this->assertSame('success', $result['status']);
    }

    public function testBookStatus()
    {
        $result = $this->post('/book/status/2', [
            'status' => Book::STATUS_OFFLINE,
        ]);
        $this->assertSame('success', $result['status']);
    }
}
