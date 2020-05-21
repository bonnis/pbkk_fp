<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    // Implement common logic
    protected function initialize(){
        $this->tag->prependTitle('Bantuanet | ');
        $this->view->setTemplateAfter('main');
    }
}
