<?php
require_once 'DB/DB.php';

  $db= new DB();

  $valores= array("name"=>"Luisa", "lastname"=>"Rincon", "email"=>"lufe089@gmail.com", "age"=>25, "student"=>"true");
  $valorInsertado=$db->insertData("datos",$valores);
  getAllValues($db);

  //-------------------------->>>
  function getAllValues($db){
  	$result=$db->getDocumentos("datos");
  	foreach ($result as $res) {
      $id = $res['_id'];
      echo "<br>ID: ", $id['$oid'],"<br>";
      echo "Nombre: ", $res['name'] ,"<br>";
      echo "Apellido: ", $res['lastname'],"<br>";
      echo "Email: ", $res['email'],"<br>";
      echo "Edad: ", $res['age'],"<br>";
      echo "Estudiante: ", $res['student'],"<br>";
      echo "--------------------------------->>><br>";
  	}
  }
  //-------------------------->>>
?>
