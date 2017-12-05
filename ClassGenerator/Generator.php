<?php
include '../Includes/Connexion.php';

$table_name = $_POST['taskOp'];

$res = $bdd->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='mybestdeal' AND TABLE_NAME='$table_name'")->fetchAll(PDO::FETCH_ASSOC);

$table_columns = array();

for ($i=0;$i<count($res);$i+=1){
    array_push($table_columns,$res[$i]['COLUMN_NAME']);
}
echo "/**<br>
Generated BY DB2PHP By CharfiOmar<br>
 **/<br>";

echo "class ".ucfirst($table_name)."<br>{";
$attributes ="";
foreach ($table_columns as $column){
    $attributes=$attributes."$".$column.",";
}
$attributes = rtrim($attributes,", ");

// --------------------------ATTRIBUTES--------------------------
echo "<br><br>&emsp;private $attributes;";
echo "<br><br>&emsp;";
// --------------------------CONSTRUCTOR--------------------------
echo "public function __construct($attributes){<br>";
foreach ($table_columns as $column){
    echo "&emsp;&emsp;$"."this"."->".$column." = $".$column.";<br>";
}
echo "&emsp;}";
//--------------------------Exec Attributes & values + PrimaryKey + SET values--------------------------
$exec_attributes ="";
foreach (array_slice($table_columns,1) as $column){
    $exec_attributes=$exec_attributes."".$column.",";
}
$exec_attributes = rtrim($exec_attributes,", ");

$exec_values ="";
foreach (array_slice($table_columns,1) as $column){
    $exec_values=$exec_values."'$"."this->".$column."',";
}
$exec_values = rtrim($exec_values,", ");

$primary_key=$table_columns[0];

$set_values="";
foreach (array_slice($table_columns,1) as $column){
    $set_values=$set_values." ".$column." = "."'$"."this->".$column."',";
}
$set_values = rtrim($set_values,", ");

// --------------------------ADD--------------------------
echo "<br><br>&emsp;";
echo "public function add_".ucfirst($table_name)."($"."bdd"."){<br>";
echo "&emsp;&emsp;";
echo "$"."bdd"."->"."exec(\"INSERT INTO ".$table_name."(".$exec_attributes.") VALUES($exec_values) \");<br>";
echo "&emsp;}";
// --------------------------LIST--------------------------
echo "<br><br>&emsp;";
echo "public function list_".ucfirst($table_name)."($"."bdd"."){<br>";
echo "&emsp;&emsp;";
echo "$"."res = "."$"."bdd"."->query(\"SELECT ".$exec_attributes." FROM ".$table_name."\")->fetchAll(PDO::FETCH_OBJ);<br>";
echo "&emsp;&emsp;";
echo "return "."$"."res;<br>";
echo "&emsp;}";
// --------------------------LIST1--------------------------
echo "<br><br>&emsp;";
echo "public function list1_".ucfirst($table_name)."($"."bdd"."){<br>";
echo "&emsp;&emsp;";
echo "$"."res = "."$"."bdd"."->query(\"SELECT ".$exec_attributes." FROM ".$table_name." WHERE ".$primary_key." ="."'$"."this"."->".$primary_key."' \")->fetch(PDO::FETCH_OBJ);<br>";
echo "&emsp;&emsp;";
echo "return "."$"."res;<br>";
echo "&emsp;}";
// --------------------------UPDATE--------------------------
echo "<br><br>&emsp;";
echo "public function update_".ucfirst($table_name)."($"."bdd"."){<br>";
echo "&emsp;&emsp;";
echo "$"."bdd"."->"."exec(\"UPDATE ".$table_name." SET ".$set_values." WHERE ".$primary_key." ="."'$"."this"."->".$primary_key."' \");<br>";
echo "&emsp;}";
// --------------------------DELETE--------------------------
echo "<br><br>&emsp;";
echo "public function delete_".ucfirst($table_name)."($"."bdd"."){<br>";
echo "&emsp;&emsp;";
echo "$"."bdd"."->"."exec(\"DELETE FROM ".$table_name." WHERE ".$primary_key." ="."'$"."this"."->".$primary_key."' \");<br>";
echo "&emsp;}";
echo "<br><br>}";
