<?php 
  $host = "localhost";
  $user = "root";
  $pass = "";

  $databaseName = "cerp";
  $tableName = "partakings";


  $bank_account= $_REQUEST['registered_banks'];
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $result = mysql_query("SELECT transaction_value,transaction_value FROM $tableName WHERE bank_account = $bank_account ORDER BY id DESC LIMIT 1");          
  $array = mysql_fetch_row($result);                       

  echo json_encode($array);

?>