<?php 
	
	//Request : http://localhost/CapabilityMatrix/api/EditCapability.php?capability=&parentcapability=&cno=
	
	include 'lib/config/database.php';
	if(@$_REQUEST['capability']!="")
	{
		$cno = @$_REQUEST['cno'];
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
		
		$query = 'UPDATE capabilities SET Capability = "'.$capability.'", Level = '.$level.' , TopLevel = '.$parent.' WHERE CNo = '.$cno.';';
		//echo $query;
		if(!$mySqlConn->query($query))
		{
			echo "Update failed: (" . $mySqlConn->errno . ") " . $mySqlConn->error;
		}
		else{
			echo "Capability Updated!";
		}
		mysqli_close($mySqlConn);
	}
?>