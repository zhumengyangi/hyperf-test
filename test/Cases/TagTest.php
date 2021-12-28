<?php

namespace HyperfTest\Cases;

use HyperfTest\HttpTestCase;

class TagTest extends HttpTestCase
{

    public function testTagIndex()
    {
        $result = $this->get('/tag');
        $this->assertSame($result['status'], 'success');
    }

    public function testTageSave()
    {
        $result = $this->post('/tag/save/0',[
            'title' => '222222222222222',
            'content' => 'test000000001111111111',
        ]);
        $this->assertSame($result['status'], 'success');
    }

    public function testTageDel()
    {
        $result = $this->get('/tag');
        $result = $this->post('/tag/delete/'. $result['result']['list'][0]['id']);
        $this->assertSame($result['status'], 'success');
    }
}