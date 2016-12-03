<?php

//Request: http://localhost/CapabilityMatrix/api/EditVendor.php?vendor=&url=&vno=

include 'lib/config/database.php';
if(@$_REQUEST['vendor']!="")
{
	$vendor = @$_REQUEST['vendor'];
	$url = @$_REQUEST['url'];
	$vno = @$_REQUEST['vno'];
	
	$mySqlObj = new MysqlDBConfig();
	$mySqlConn = $mySqlObj->getConnection();

	$query = 'UPDATE vendors SET Vendor="'.$vendor.'", Url= "'.$url.'" WHERE VNo = '.$vno.';';
	//echo $query;
	if(!$mySqlConn->query($query))
	{
		echo "Update failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
	}
	echo "Vendor Updated";
	mysqli_close($mySqlConn);
}
?>