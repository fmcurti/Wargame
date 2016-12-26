
<!-- begin of generated class -->
<?php

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class traits_armies
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $id_trait;   // (normal Attribute)
var $id_army;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function traits_armies()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid()
{
return $this->id;
}

function getid_trait()
{
return $this->id_trait;
}

function getid_army()
{
return $this->id_army;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setid_trait($val)
{
$this->id_trait =  $val;
}

function setid_army($val)
{
$this->id_army =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM traits_armies WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);


$this->id = $row->id;

$this->id_trait = $row->id_trait;

$this->id_army = $row->id_army;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM traits_armies WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO traits_armies ( id_trait,id_army ) VALUES ( '$this->id_trait','$this->id_army' )";
$result = $this->database->query($sql);
$this->id = mysqli_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE traits_armies SET  id_trait = '$this->id_trait',id_army = '$this->id_army' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
<!-- end of generated class -->
