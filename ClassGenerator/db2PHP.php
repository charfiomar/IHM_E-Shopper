<?php
include '../Includes/Connexion.php';
$res = $bdd->query("SELECT table_name FROM information_schema.tables where table_schema='mybestdeal';")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DB2PHP GENERATOR</title>
</head>
<body>
<form method="post" action="Generator.php">
    <label>Selectionnez la table que vous voulez generer sa Classe PHP:</label>
    <br><br>
    <select name="taskOp">
        <?php for ($i=0;$i<count($res);$i+=1) {
            $table_name = $res[$i]['table_name'];
            echo "<option value='$table_name'> " . $table_name . "</option>";
        }?>
    </select>
    <br><br>
    <input type="submit" value="Generate">
</form>

</body>
</html>
<?php

?>