<?php

include_once("class.user.php");
include_once("class.factions.php");
$faction = new factions();
$faction->select(1);
$faction->getid();
$test = new user();
$test->select(1);
print $test->getnombre();
?>