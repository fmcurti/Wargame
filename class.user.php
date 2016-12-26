
<!-- begin of generated class -->
<?php


include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class user
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $nombre;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function user()
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

function setnombre($val)
{
$this->nombre =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM user WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);


$this->id = $row->id;

$this->nombre = $row->nombre;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM user WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO user ( nombre ) VALUES ( '$this->nombre' )";
$result = $this->database->query($sql);
$this->id = mysqli_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE user SET  nombre = '$this->nombre' WHERE id = $id ";

$result = $this->database->query($sql);



}

    function selectAll()
    {

        $sql = "SELECT id FROM user;";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $array_fila = array();
        while ($array_fila = mysqli_fetch_array($result)) {
            $this->select($array_fila["id"]);

            $array_users[] = clone $this;
        }

        return ($array_users);


    }
}

?>
<!-- end of generated class -->
