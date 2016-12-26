
<?php
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');
include_once("class.factions.php");
include_once("class.user.php");
include_once("class.units.php");
include_once("class.armies.php");
include_once("class.items.php");
include_once("class.items_armies.php");
include_once("class.traits.php");
include_once("class.traits_armies.php");
if(isset($_GET['id'])) {$id_unit = $_GET['id'] ; } else {$id_unit = $_POST['id_unit']; }
if (isset($_POST['id_item'])) {
    $new_item = new items_armies();
    $new_item->setid_army($_POST['id_unit']);
    $new_item->setid_item($_POST['id_item']);
    $new_item->insert();

}
if (isset($_GET['remover'])) {
    $delete = new items_armies();
    $delete->delete($_GET['remover']);
}
$items = new items();
$array_items = $items->selectAll();
$item_count = count($array_items);
$army = new armies();
$army->select($id_unit);
$unit = new units();
$unit->select($army->getid_unit());
$items_unit = new items_armies();
$array_items_unit= $items_unit->selectFromUnit($id_unit);
$items_unit_count = count($array_items_unit)

?>

<html lang="es">
<style>
    div {
        
    }
</style>
<head>
    <title>Army Builder - El Wargame de Los Pibes</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="page-header">
    <h1>El Wargame de Los Pibes <small>Items</small></h1>
</div>
<div class="container">
    <h2>Items de <?=$unit->getnombre() ?> </h2>
    <p></p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        </thead>
        <tbody>
        <? for ($i=0;$i<$items_unit_count;$i++){
        $item = new items();
        $item->select($array_items_unit[$i]->id_item); ?>
            <tr>
                <td><?= $item->getname()?></td>
                <td><?= $item->getdes() ?></td>
                <td><?= $item->getprecio() ?></td>
                <td><a href="items.php?id=<?=$id_unit?>&remover=<?=$array_items_unit[$i]->id?>"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        <? } ?>
            <form action="items.php" method="POST">
                <input type="hidden" name="id_unit" value="<?= $id_unit ?>"
            <tr>
                <td><select name="id_item">
                        <? for ($i=0;$i<$item_count;$i++) { ?>
                                <option value="<?=$array_items[$i]->id?>" ><?=$array_items[$i]->name?></option>
                        <? } ?>
                    </select>
                </td>
                <td></td>
                <td></td>
                <td><input type="submit"></td>
            </tr>
            </form>
        </tbody>
    </table>
    <a href="index.php">Index</a>