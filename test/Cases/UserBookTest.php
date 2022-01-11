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
class UserBookTest extends HttpTestCase
{
    public function testUserBookIndex()
    {
        $result = $this->get('/user_book', [
            'user_id' => 1,
        ]);
        $this->assertSame('success', $result['status']);
    }
}
