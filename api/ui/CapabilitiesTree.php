<?php
	include '../lib/config/database.php';
	$mySqlObj = new MysqlDBConfig();
	$mySqlConn = $mySqlObj->getConnection();
	
	$capabilities = $mySqlConn->query("SELECT CNo, Capability,Level FROM capabilities WHERE TopLevel = 0;");
	echo '<div class="row" >';
	while ($capbility = mysqli_fetch_array($capabilities)) {		
		echo '<div class="col-sm-3">';		
	 							
			echo '<ul class="capability-tree">';
				echo '<h2 class="btn btn-app">';
					echo '<a href="EditCapability.php?id='.$capbility['CNo'].'"><b>'.$capbility['Capability'].'</b></a>';
					//ListChildren($capbility['CNo'],1);
				echo '</h2>';
				ListChildren($capbility['CNo'],1);
			echo '</ul>';
							
		echo '</div>';	
	}
	echo '</div>';
	mysqli_close($mySqlConn);
	
	function ListChildren($CNo, $indent){
		$sqlObj = new MysqlDBConfig();
		$sqlConn = $sqlObj->getConnection();
		$children = $sqlConn->query("SELECT CNo, Capability,Level FROM capabilities WHERE TopLevel = ".$CNo.";");
		
		while ($child = mysqli_fetch_array($children)) {
			echo '<ul>';
				echo '<li>';
					//for($i=0;$i<$indent;$i++){
					//	echo '&nbsp;&nbsp;';
					//}
					echo '<a class="link" href="EditCapability.php?id='.$child['CNo'].'">'.$child['Capability'].'</a>';
					ListChildren($child['CNo'],$indent+1);
				echo '</li>';
				//ListChildren($child['CNo'],$indent+1);
			echo '</ul>';
		}
		
		mysqli_close($sqlConn);
	}
?>