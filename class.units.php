
<!-- begin of generated class -->
<?php


include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class units
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $id_faction;   // (normal Attribute)
var $nombre;   // (normal Attribute)
var $mov;   // (normal Attribute)
var $m;   // (normal Attribute)
var $r;   // (normal Attribute)
var $dmg;   // (normal Attribute)
var $def;   // (normal Attribute)
var $dex;   // (normal Attribute)
var $h;   // (normal Attribute)
var $a;   // (normal Attribute)
var $wp;   // (normal Attribute)
var $precio;   // (normal Attribute)
var $traits;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function units()
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

function getid_faction()
{
return $this->id_faction;
}

function getnombre()
{
return $this->nombre;
}

function getmov()
{
return $this->mov;
}

function getm()
{
return $this->m;
}

function getr()
{
return $this->r;
}

function getdmg()
{
return $this->dmg;
}

function getdef()
{
return $this->def;
}

function getdex()
{
return $this->dex;
}

function geth()
{
return $this->h;
}

function geta()
{
return $this->a;
}

function getwp()
{
return $this->wp;
}

function getprecio()
{
return $this->precio;
}

function gettraits()
{
return $this->traits;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setid_faction($val)
{
$this->id_faction =  $val;
}

function setnombre($val)
{
$this->nombre =  $val;
}

function setmov($val)
{
$this->mov =  $val;
}

function setm($val)
{
$this->m =  $val;
}

function setr($val)
{
$this->r =  $val;
}

function setdmg($val)
{
$this->dmg =  $val;
}

function setdef($val)
{
$this->def =  $val;
}

function setdex($val)
{
$this->dex =  $val;
}

function seth($val)
{
$this->h =  $val;
}

function seta($val)
{
$this->a =  $val;
}

function setwp($val)
{
$this->wp =  $val;
}

function setprecio($val)
{
$this->precio =  $val;
}

function settraits($val)
{
$this->traits =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM units WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);


$this->id = $row->id;

$this->id_faction = $row->id_faction;

$this->nombre = $row->nombre;

$this->mov = $row->mov;

$this->m = $row->m;

$this->r = $row->r;

$this->dmg = $row->dmg;

$this->def = $row->def;

$this->dex = $row->dex;

$this->h = $row->h;

$this->a = $row->a;

$this->wp = $row->wp;

$this->precio = $row->precio;

$this->traits = $row->traits;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM units WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO units ( id_faction,nombre,mov,m,r,dmg,def,dex,h,a,wp,precio,traits ) VALUES ( '$this->id_faction','$this->nombre','$this->mov','$this->m','$this->r','$this->dmg','$this->def','$this->dex','$this->h','$this->a','$this->wp','$this->precio','$this->traits' )";
$result = $this->database->query($sql);
$this->id = mysqli_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE units SET  id_faction = '$this->id_faction',nombre = '$this->nombre',mov = '$this->mov',m = '$this->m',r = '$this->r',dmg = '$this->dmg',def = '$this->def',dex = '$this->dex',h = '$this->h',a = '$this->a',wp = '$this->wp',precio = '$this->precio',traits = '$this->traits' WHERE id = $id ";

$result = $this->database->query($sql);



}
    function selectFromFaccion($id_faccion)
    {

       $sql = "SELECT id FROM units WHERE id_faction = '$id_faccion' ;";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $array_fila = array();
        while ($array_fila = mysqli_fetch_array($result)) {
            $this->select($array_fila["id"]);

            $array_faccion[] = clone $this;
        }

        return ($array_faccion);


    }


} // class : end

?>
<!-- end of generated class -->
