<?php
error_reporting(0);
include_once("class.factions.php");
header('Content-Type: text/html; charset=UTF-8');
include_once("class.user.php");
include_once("class.units.php");
include_once("class.armies.php");
include_once("class.items.php");
include_once("class.items_armies.php");
include_once("class.traits.php");
include_once("class.traits_armies.php");

if(isset($_GET['id_faccion'])) {$id_faccion = $_GET['id_faccion'] ; } else {$id_faccion = $_POST['id_faccion']; }
if(isset($_GET['id_user'])) {$id_user = $_GET['id_user'] ; } else {$id_user = $_POST['id_user']; }
if (isset($_POST['id_unit'])) {
    $new_unit = new armies();
    $new_unit->setid_unit($_POST['id_unit']);
    $new_unit->setid_user($_POST['id_user']);
    $new_unit->setnombre($_POST['nombre']);
    $new_unit->insert();

}
if (isset($_GET['remover'])) {
    $delete = new armies();
    $delete->delete($_GET['remover']);
}
$user = new user();
$user->select($id_user);
$faccion = new factions();
$faccion->select($id_faccion);
$units = new units();
$array_units = $units->selectFromFaccion($id_faccion);
$units_count = count($array_units);
$army = new armies();
$array_army = $army->selectFromUser($id_user);
$army_count = count($array_army);



?>
<html lang="es">
    <head>
        <title>Army Builder - El Wargame de Los Pibes</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="page-header">
            <h1>El Wargame de Los Pibes <small>Army Builder</small></h1>
        </div>
        <div class="container">
            <h2>Army de <?=$user->getnombre()?></h2>
            <p><?= $faccion->getname() ?></p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>MOV</th>
                    <th>M</th>
                    <th>R</th>
                    <th>DMG</th>
                    <th>DEF</th>
                    <th>DEX</th>
                    <th>H</th>
                    <th>A</th>
                    <th>WP</th>
                    <th>Items</th>
                    <th>Traits</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                </tr>
                <form action="builder.php" method="post">
                    <input name="id_user" type="hidden" value="<?= $id_user?>">
                    <input name="id_faccion" type="hidden" value="<?= $id_faccion?>">

                <? for ($i=0;$i<$army_count;$i++){
                    $unit = new units();
                    $unit->select($array_army[$i]->id_unit);

                    $items = new items_armies();
                    $array_items = $items->selectFromUnit($array_army[$i]->id);
                    $mov = $unit->getmov();
                    $m  = $unit->getm();
                    $r = $unit->getr();
                    $dmg = $unit->getdmg();
                    $def = $unit->getdef();
                    $dex = $unit->getdex();
                    $h  = $unit->geth();
                    $a = $unit->geta();
                    $wp = $unit->getwp();
                    $precio = $unit->getprecio();
                    for ($j=0;$j<count($array_items);$j++) {
                        $item = new items();
                        $item->select($array_items[$j]->id_item);
                        $mov += $item->getmov();
                        $m  += $item->getm();
                        $r += $item->getr();
                        $dmg += $item->getdmg();
                        $def += $item->getdef();
                        $dex += $item->getdex();
                        $h  += $item->geth();
                        $a += $item->getatt();
                        $wp += $item->getwp();
                        $precio += $item->getprecio();

                    } $total += $precio;?>

                <tr>
                    <td><? if($array_army[$i]->nombre != '') { print $array_army[$i]->nombre . "<br> (" . $unit->getnombre() . ")" ;  } else { print $unit->getnombre(); } ?></td>
                    <td><?= $mov ?></td>
                    <td><?= $m ?></td>
                    <td><?= $r ?></td>
                    <td><?= $dmg ?></td>
                    <td><?= $def ?></td>
                    <td><?= $dex ?></td>
                    <td><?= $h ?></td>
                    <td><?= $a ?></td>
                    <td><?= $wp ?></td>
                    <td>
                        <ul class="">
                            <?   for ($j=0;$j<count($array_items);$j++) {
                            $item = new items();
                            $item->select($array_items[$j]->id_item); ?>
                            <li><?= $item->getname() ?></li>
                            <? } ?>
                            <li class=""><a href="items.php?id=<?= $array_army[$i]->id?>">Editar Items</a></li>
                        </ul>
                    </td>
                    <td></td>
                    <td><?= $precio ?></td>
                    <td><a href="builder.php?id_user=<?=$id_user?>&id_faccion=<?=$id_faccion?>&remover=<?=$array_army[$i]->id?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
<? } ?>
                    <td>
                        <select name="id_unit">
                            <? for ($i=0;$i<$units_count;$i++) { ?>
                                <option value="<?= $array_units[$i]->id ?>" > <?= $array_units[$i]->nombre ?>  </option>
                            <? } ?>
}
                        </select>
                        <br>
                        <input type="text" name="nombre">
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input class="btn" type="submit"></td>

                </tr>
              </form>
                </tbody>
            </table>
            Puntaje total utilizado: <?= $total ?><br>
            <a href="index.php">Index</a>
        </div>

        </div>

    </body>

</html>
