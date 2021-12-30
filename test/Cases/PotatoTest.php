<?php

namespace HyperfTest\Cases;

use HyperfTest\HttpTestCase;

class PotatoTest extends HttpTestCase
{

    public function testPotatoIndex()
    {
        $result = $this->get('/potato');
        $this->assertSame($result['status'], 'success');
    }

    public function testPotatoSave()
    {
        $result = $this->post('/potato/save/0',[
            'title' => 'sadasdqwewe1esqq',
            'content' => '内容dsasdas',
        ]);
        $this->assertSame($result['status'], 'success');
    }

    public function testPotatoDel()
    {
        $result = $this->get('/potato');
        $result = $this->post('/potato/del/'. $result['result']['list'][0]['id']);
        $this->assertSame($result['status'], 'success');
    }
}