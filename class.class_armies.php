
<!-- begin of generated class -->
<?php


include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class class_armies
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT


var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function class_armies()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


// **********************
// SETTER METHODS
// **********************


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM armies WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysqlii_fetch_object($result);


}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM armies WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO armies (  ) VALUES (  )";
$result = $this->database->query($sql);
$this->id = mysqlii_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE armies SET   WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
<!-- end of generated class -->
