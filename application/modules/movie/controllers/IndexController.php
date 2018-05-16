<?php

class Movie_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $movie = new Application_Model_Mapper_Movie();
        $this->view->movies = $movie->fetchAll();
    }
}

