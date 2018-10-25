<?php 
require_once 'AbstractActors.php';
require_once 'DB.php';


class Actors extends AbstractActors
{
	private $_db = null;
	public static $tableName = __CLASS__;

	public function __construct()
	{
		$this->_db = DB::getInstance();
	}

	public function getSomething()
	{
		$sql = "SELECT full_name from " . static::$tableName . " WHERE left(full_name, 1) in (select distinct gender from actors) order by full_name desc";
		$result = $this->_db->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function insertSomething()
	{
		$sql = "INSERT into " . static::$tableName . " (full_name, gender) select any_actors.full_name, any_actors.gender from any_actors";
	    $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $this->_db->exec($sql);
	}
}

$actors = new Actors();

echo "<pre>";
var_dump($actors->getSomething());
echo "<pre>";

$actors->insertSomething();