<?php 

	//Request : http://localhost/CapabilityMatrix/api/AddCapability.php?capability=&parentcapability=

	include 'lib/config/database.php';
	if(@$_REQUEST['capability']!="")
	{
		$capability = @$_REQUEST['capability'];
		$parent = @$_REQUEST['parentcapability'];
		$level = 0;
		
		$mySqlObj = new MysqlDBConfig();
		$mySqlConn = $mySqlObj->getConnection();
		
		if($parent!=""){
			//Placeholder
			$tempResults = $mySqlConn->query("SELECT Level FROM capabilities WHERE CNo = ".$parent.";");
			$tempResult = mysqli_fetch_array($tempResults);
			$level = $tempResult["Level"]+1;
		}else{
			$parent=0;
		}
		
		$query = 'INSERT INTO capabilities (`Capability`,`Level`,`TopLevel`) VALUES ("'.$capability.'",'.$level.','.$parent.');';
		//echo $query;
		if(!$mySqlConn->query($query))
		{
			echo "Insert failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
		else{
			echo "Capability Added!";
		}
		mysqli_close($mySqlConn);
	}
?>