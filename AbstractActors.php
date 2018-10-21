<?php 

abstract class AbstractActors
{
	private $_db = null;

	public function __construct()
	{
		$this->_db = DB::getInstance();
	}

	public function getSomething($sql)
	{
		$result = $this->_db->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
    public function insertSomething($sql)
	{
	    $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $this->_db->exec($sql);
	}
}