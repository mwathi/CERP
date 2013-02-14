<?php 
  $host = "localhost";
  $user = "root";
  $pass = "";

  $databaseName = "cerp";
  $tableName = "pledges";


  $member_number = $_REQUEST['id'];
  $cause = $_REQUEST['cause'];
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $result = mysql_query("SELECT SUM(Pledge) AS Pledge, Member_Number, Name, Telephone, Address, Email FROM $tableName WHERE Member_Number = $member_number AND Cause = $cause GROUP BY Member_Number ");          
  $array = mysql_fetch_row($result);                       

  echo json_encode($array);

?>