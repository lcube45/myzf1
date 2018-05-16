<?php

class Application_Model_Mapper_Movie {

    /* @var \Application_Model_DbTable_Movie */
    protected $_adapter;

    public function __construct() {
        $this->setAdapter('Application_Model_DbTable_Movie');
    }

    protected function setAdapter($adapter)
    {
        if (is_string($adapter)) {
            $adapter = new $adapter();
        }
        if (!$adapter instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_adapter = $adapter;
        return $this;
    }

    public function getAdapter()
    {
        return $this->_adapter;
    }

    public function save(Application_Model_Movie $movie)
    {
        $data = [
            'title'         => $movie->getTitle(),
            'release_date'  => $movie->getReleaseDate(),
        ];

        if (null === ($movie_id = $movie->getMovieId())) {
            unset($data['id']);
            $this->getAdapter()->insert($data);
        }

        $this->getAdapter()->update($data, array('movie_id = ?' => $movie_id));
    }

    public function find($id)
    {
        $result = $this->getAdapter()->find($id);
        if (0 == count($result)) {
            return;
        }
        return $this->hydrate($result->current());
    }

    public function findByReleaseDate($release_date)
    {
        $result = $this->getAdapter()->findByReleaseDate($release_date);
        $movies = array();
        foreach ($result as $row) {
            $movies[] = $this->hydrate($row);
        }
        return $movies;
    }

    public function fetchAll()
    {
        /* @var $result \Zend_Db_Table_Rowset_Abstract */
        $result = $this->getAdapter()->fetchAll();
        $movies = [];
        foreach ($result as $row) {
            $movies[] = $this->hydrate($row);
        }
        return $movies;
    }

    public function hydrate($row)
    {
        /* @var $row \Zend_Db_Table_Row_Abstract */
        $data = $row->toArray();

        /* @var $model \Application_Model_Movie */
        $model = new Application_Model_Movie();
        $model->setMovieId($data['movie_id']);
        $model->setTitle($data['title']);
        $model->setReleaseDate($data['release_date']);

        return $model;
    }
}