<?php

namespace AppBundle\Tests\Controller;

class DefaultControllerTest extends AbstractController
{
    public function testGet()
    {
        $this->request('/');
        $this->request('/'.base_convert(md5(uniqid()), 11, 10), 'GET', 404);
    }
}
