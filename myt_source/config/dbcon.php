<?

	$dbcon = mysql_connect("localhost","root","apmsetup");
	
	if(!$dbcon)
	{
		echo("#001.Database Connection Error !!!");
		exit;
	}
		
	$status = mysql_select_db("myLittleTrip", $dbcon);
		
	if(!$status)
	{
		echo("#002. Database Select Error !!!");
		exit;
	}
?>
