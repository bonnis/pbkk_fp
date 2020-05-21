<?php
declare(strict_types=1);


class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->flash->success("Selamat datang!");
        $this->view->test = "Test";
    }

}

