<?php

	//Request: http://localhost/CapabilityMatrix/api/CapabilitiesList.php
	
	include 'lib/config/database.php';
	
	$mySqlObj = new MysqlDBConfig();
	$mySqlConn = $mySqlObj->getConnection();
	
	$capabilities = $mySqlConn->query("call GetCapabilities();");
	
	/*
	 * Use to return options list
	 */
	//echo '<select>';
	while ($capbility = mysqli_fetch_array($capabilities)) {		
		echo '<option value="' . $capbility['CNo'] . '">';
		echo $capbility['Capability'] . '</option>';
	}
	//echo '</select>';
	
	/*
	 * Use to return an array
	echo '[';
	while ($capbility = mysqli_fetch_array($capabilities)) {
		echo '{ text:"' . $capbility['Capability'] . '",';
		echo 'id: "' . $capbility['CNo'] . '"},';
	}
	echo '{ value: "", id: "0" }]';
	*/
	
	mysqli_close($mySqlConn);
	
?>