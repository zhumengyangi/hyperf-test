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
class FoodTest extends HttpTestCase
{
    public function testFoodIndex()
    {
        $result = $this->get('/food');
        $this->assertSame('success', $result['status']);
    }

    public function testFoodSave()
    {
        $result = $this->post('/food/save/0', [
            'title' => 'dasdasdq131',
            'content' => '14et3rewt3t34',
        ]);
        $this->assertSame('success', $result['status']);
    }

    public function testFoodDel()
    {
        $result = $this->get('/food');
        $result = $this->post('/food/del/' . $result['result']['list'][0]['id']);
        $this->assertSame('success', $result['status']);
    }
}
