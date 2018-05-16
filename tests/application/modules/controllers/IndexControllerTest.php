<?php

class Movie_IndexControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testMovieModuleIndexController()
    {
        $this->dispatch('/movie');
        $this->assertModule('movie');
        $this->assertController('index');
        $this->assertAction('index');
        $this->assertResponseCode('200');
    }

    public function testMovieModuleIndexView() {
        $this->dispatch('/movie');
        $this->assertQueryCount('table#movie-list', 1);
    }
}

