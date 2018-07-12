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

    public function testMovieModuleIndexView()
    {
        $this->dispatch('/movie');
        $this->assertQueryCount('table#movie-list', 1);
    }

    public function testMovieModelFetchAll()
    {
        $movie = new Application_Model_Mapper_Movie();
        $movies = $movie->fetchAll();
        $this->assertInternalType('array', $movies);
    }

    public function testMovieModelFindByReleaseDate()
    {
        $movie = new Application_Model_Mapper_Movie();
        $movies = $movie->findByReleaseDate(2017);
        $this->assertInternalType('array', $movies);
        $first = $movies[0];
        $this->assertInstanceOf('Application_Model_Movie', $first);
        $this->assertContainsOnlyInstancesOf('Application_Model_Movie', $movies);
    }

    public function _testMovieModelInsert()
    {
        $movie = new Application_Model_Movie();
        $movie->setTitle('Deadpool 2');
        $movie->setReleaseDate(2018);

        $movieMapper = new Application_Model_Mapper_Movie();
        $movieMapper->save($movie);

    }
}

