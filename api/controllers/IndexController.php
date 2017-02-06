<?php
use Doctrine\ORM;
use Modules\Entity;

class API_IndexControllers extends Ia_Controller_Action_Abstract
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        var_dump("test");
        die();
    }
}
