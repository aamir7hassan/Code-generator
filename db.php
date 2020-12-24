<?php
	$con = mysqli_connect("localhost","username","pass","dbname");

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die;
	}
	
	function insert($table,$data)
	{
		global $con;
		$colNames = array_keys($data);
		$sql = "INSERT INTO ".$table." (".implode(',', $colNames).") VALUES('".implode("','", $data)."')";
		$result = mysqli_query($con,$sql) or die(' Error in query');
		return $result;
	}
	function getData($selector,$table,$where)
  	{
  		global $con;
  		$query 	= "select $selector from $table $where";
  		//var_dump($query);
  		//exit;
  		$res 	= mysqli_query($con,$query) or die('Error in query');
  		return $res;
  	}
 ?>