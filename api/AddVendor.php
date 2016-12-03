<?php 

	//Request: http://localhost/CapabilityMatrix/api/AddVendor.php?vendor=&url=

	include 'lib/config/database.php';
	if(@$_REQUEST['vendor']!="")
	{
		$vendor = @$_REQUEST['vendor'];
		$url = @$_REQUEST['url'];
		
		$mySqlObj = new MysqlDBConfig();
		$mySqlConn = $mySqlObj->getConnection();
		
		$query = 'INSERT INTO vendors (Vendor, Url) VALUES ("'.$vendor.'","'.$url.'");';
		//echo $query;
		if(!$mySqlConn->query($query))
		{
			echo "Insert failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
		echo "Vendor Added";
		mysqli_close($mySqlConn);
	}
?>