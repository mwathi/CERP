<?php 
  $host = "localhost";
  $user = "root";
  $pass = "";

  $databaseName = "cerp";
  $tableName = "pledges";


  $member_number = $_REQUEST['id'];
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $result = mysql_query("SELECT * FROM $tableName WHERE Member_Number = $member_number");          
  $array = mysql_fetch_row($result);                       

  echo json_encode($array);

?>