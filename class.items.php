
<!-- begin of generated class -->
<?php


include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class items
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $id_faction;   // (normal Attribute)
var $name;   // (normal Attribute)
var $mov;   // (normal Attribute)
var $m;   // (normal Attribute)
var $r;   // (normal Attribute)
var $dmg;   // (normal Attribute)
var $def;   // (normal Attribute)
var $dex;   // (normal Attribute)
var $h;   // (normal Attribute)
var $att;   // (normal Attribute)
var $wp;   // (normal Attribute)
var $precio;   // (normal Attribute)
var $des;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function items()
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

function getname()
{
return $this->name;
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

function getatt()
{
return $this->att;
}

function getwp()
{
return $this->wp;
}

function getprecio()
{
return $this->precio;
}

function getdes()
{
return $this->des;
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

function setname($val)
{
$this->name =  $val;
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

function setatt($val)
{
$this->att =  $val;
}

function setwp($val)
{
$this->wp =  $val;
}

function setprecio($val)
{
$this->precio =  $val;
}

function setdes($val)
{
$this->des =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM items WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysqli_fetch_object($result);


$this->id = $row->id;

$this->id_faction = $row->id_faction;

$this->name = $row->name;

$this->mov = $row->mov;

$this->m = $row->m;

$this->r = $row->r;

$this->dmg = $row->dmg;

$this->def = $row->def;

$this->dex = $row->dex;

$this->h = $row->h;

$this->att = $row->att;

$this->wp = $row->wp;

$this->precio = $row->precio;

$this->des = $row->des;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM items WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO items ( id_faction,name,mov,m,r,dmg,def,dex,h,att,wp,precio,des ) VALUES ( '$this->id_faction','$this->name','$this->mov','$this->m','$this->r','$this->dmg','$this->def','$this->dex','$this->h','$this->att','$this->wp','$this->precio','$this->des' )";
$result = $this->database->query($sql);
$this->id = mysqli_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE items SET  id_faction = '$this->id_faction',name = '$this->name',mov = '$this->mov',m = '$this->m',r = '$this->r',dmg = '$this->dmg',def = '$this->def',dex = '$this->dex',h = '$this->h',att = '$this->att',wp = '$this->wp',precio = '$this->precio',des = '$this->des' WHERE id = $id ";

$result = $this->database->query($sql);



}

function selectAll()
{

    $sql = "SELECT id FROM items;";
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
