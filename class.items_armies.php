
<!-- begin of generated class -->
<?php


include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class items_armies
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $id_army;   // (normal Attribute)
var $id_item;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function items_armies()
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

function getid_army()
{
return $this->id_army;
}

function getid_item()
{
return $this->id_item;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setid_army($val)
{
$this->id_army =  $val;
}

function setid_item($val)
{
$this->id_item =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM items_armies WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);


$this->id = $row->id;

$this->id_army = $row->id_army;

$this->id_item = $row->id_item;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM items_armies WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO items_armies ( id_army,id_item ) VALUES ( '$this->id_army','$this->id_item' )";
$result = $this->database->query($sql);
$this->id = mysqli_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE items_armies SET  id_army = '$this->id_army',id_item = '$this->id_item' WHERE id = $id ";

$result = $this->database->query($sql);



}
    function selectFromUnit($id_unit)
    {
        $sql = "SELECT id FROM items_armies WHERE id_army = '$id_unit' ;";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $array_fila = array();
        while ($array_fila = mysqli_fetch_array($result)) {
            $this->select($array_fila["id"]);

            $array_items[] = clone $this;
        }

        return ($array_items);


    }

} // class : end

?>
<!-- end of generated class -->
