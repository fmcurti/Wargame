
<?php


include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class armies
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $id_user;   // (normal Attribute)
var $id_unit;   // (normal Attribute)
var $nombre;

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function armies()
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

function getid_user()
{
return $this->id_user;
}

function getid_unit()
{
return $this->id_unit;
}
function getnombre()
{
    return $this->nombre;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setid_user($val)
{
$this->id_user =  $val;
}

function setid_unit($val)
{
$this->id_unit =  $val;
}

function setnombre($val)
{
    $this->nombre =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM armies WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);


$this->id = $row->id;

$this->id_user = $row->id_user;

$this->id_unit = $row->id_unit;

$this->nombre = $row->nombre;

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

$sql = "INSERT INTO armies ( id_user,id_unit,nombre ) VALUES ( '$this->id_user','$this->id_unit','$this->nombre' )";
$result = $this->database->query($sql);
$this->id = mysqli_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE armies SET  id_user = '$this->id_user',id_unit = '$this->id_unit' WHERE id = $id ";

$result = $this->database->query($sql);





}
    function selectFromUser($id_user)
    {

        $sql = "SELECT id FROM armies WHERE id_user = '$id_user' ;";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $array_fila = array();
        while ($array_fila = mysqli_fetch_array($result)) {
            $this->select($array_fila["id"]);

            $array_army[] = clone $this;
        }

        return ($array_army);


    }


} // class : end

?>

