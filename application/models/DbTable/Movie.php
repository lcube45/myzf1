<?php

class Application_Model_DbTable_Movie extends Zend_Db_Table_Abstract
{

    protected $_name = 'movie';

    public function findByReleaseDate($release_date)
    {
        $select = $this->select()->where('release_date = ?', $release_date);
        return $this->fetchAll($select);
    }
}

