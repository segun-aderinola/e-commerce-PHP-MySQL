<?php

class connectDB
{
	private $DBHOST;
	private $DBUSER;
	private $DBPASS;
	private $DATABASE;
	
	public $con;
	
	function connectionString ($host  = 'localhost', $user = 'root', $pass = '', $dbase = 'hafiz_lanzile' )
	{
		$con = @mysqli_connect($host, $user, $pass);
		$select_db = @mysqli_select_db($con, $dbase);

		try{
			if(!$con) throw new Exception("Error Processing Request : Unable to connect to the //HOST//", 1);
			else if(!$select_db) throw new Exception("Error Processing Request: Unable to select a //DATABASE//", 1);
			//If connection is successful
			else return $con;
		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}
	
	
	
?>