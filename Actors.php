<?php 
require_once 'AbstractActors.php';
require_once 'DB.php';


class Actors extends AbstractActors
{

}

$actors = new Actors();

echo "<pre>";
var_dump($actors->getSomething("SELECT full_name from actors where left(full_name, 1) in (select distinct gender from actors) order by full_name desc"));
echo "<pre>";

$actors->insertSomething("INSERT into actors (full_name, gender) select any_actors.full_name, any_actors.gender from any_actors");
