
<!-- begin of generated class -->
<?php


include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class factions
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $name;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function factions()
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

function getname()
{
return $this->name;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setname($val)
{
$this->name =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM factions WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);


$this->id = $row->id;

$this->name = $row->name;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM factions WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO factions ( name ) VALUES ( '$this->name' )";
$result = $this->database->query($sql);
$this->id = mysqli_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE factions SET  name = '$this->name' WHERE id = $id ";

$result = $this->database->query($sql);



}
    function selectAll()
    {

        $sql = "SELECT id FROM factions;";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $array_fila = array();
        while ($array_fila = mysqli_fetch_array($result)) {
            $this->select($array_fila["id"]);

            $array_factions[] = clone $this;
        }

        return ($array_factions);


    }


} // class : end

?>
<!-- end of generated class -->
