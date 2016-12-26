<?php
error_reporting(0);
include_once("class.user.php");
header('Content-Type: text/html; charset=UTF-8');
include_once("class.factions.php");
$user = new user();
$factions = new factions();
$array_factions = $factions->selectAll();
$array_users = $user->selectAll();
$user_count = count($array_users);
$factions_count = count($array_factions);

?>
<html>
<head>
    <script>
        function play(){
            var audio = document.getElementById("audio");
            audio.play();
        }
    </script>
    <title> Wargame </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<audio id="audio" src="deca.mp3" ></audio>
<div class="page-header">
    <h1>El Wargame  <small>Army Builder</small></h1>
</div>
<div class="container">


    <form action="builder.php" method="get">
    <table class="table">

        <tbody>
        <tr>
            <td>User</td>
            <td> <select name="id_user">
                    <?php  for ($k=0;$k<$user_count;$k++) { ?>
                    <option value="<?php print $array_users[$k]->id ?>">
                        <?php print $array_users[$k]->nombre ?>
                    </option>
                    <?php } ?>
                 </select>
            </td>

        </tr>
        <tr>
            <td>Facción</td>
            <td><select name="id_faccion">
                    <?php  for ($i=0;$i<$user_count;$i++) {?>
                    <option value="<?php print $array_factions[$i]->id ?>">
                        <?php print $array_factions[$i]->name ?>
                    </option>
                    <?php } ?>

                </select></td>

        </tr>
        <tr>
            <td><input type="submit"></td>
        </tr>
        </tbody>
    </table>
    </form>

</div>

</body>
</html>
