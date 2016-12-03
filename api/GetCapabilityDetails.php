<?php

	//Request: http://localhost/CapabilityMatrix/api/GetCapabilityDetails.php?id=14
	if(@$_REQUEST['id']!=""){
		$id = @$_REQUEST['id'];
		
		include 'lib/config/database.php';
		$mySqlObj = new MysqlDBConfig();
		$mySqlConn = $mySqlObj->getConnection();
		//echo "Selected Capability Hierarchy (bottom-up):<br />";
		ShowParent($id, $mySqlConn);
		mysqli_close($mySqlConn);
	}
	
	function ShowParent($id, $conn){
		$query = 'SELECT TopLevel, Capability FROM `capabilities` WHERE CNo = '.$id.';';
		$results = $conn->query($query);
		
		while($result = mysqli_fetch_array($results)){
			$parent = $result['TopLevel'];
			echo '<ul>';
			echo '<li>';
			echo '<b>'.$result['Capability'].'</b><br />';
			echo '</li>';
			if($parent!=0){
				ShowParent($parent, $conn);
			}
			echo '</ul>';
		}
	}
?>