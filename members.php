<?php 
  $host = "localhost";
  $user = "root";
  $pass = "";

  $databaseName = "cerp";
  $tableName = "flock";


  $member_id = $_REQUEST['id'];
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $result = mysql_query("SELECT * FROM $tableName WHERE id = $member_id AND Member_Number != '10000' ");          
  $array = mysql_fetch_row($result);                       

  echo json_encode($array);

?>