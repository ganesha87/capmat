<?php
//include 'lib/config/database.php';
$mySqlObj = new MysqlDBConfig();
$mySqlConn = $mySqlObj->getConnection();

$vendors = $mySqlConn->query("SELECT VNo,Vendor,Url FROM vendors WHERE Active = 1;");

?>

<div class="col-sm-6 ">
<div class="panel-heading">
	<h2><i class="fa fa-flag-o red"></i><strong>Vendors:</strong></h2>							
</div>
<table id="vendorsTable" class="table bootstrap-datatable">
	<thead>
		<tr>
			<th>Vendor</th>
			<th>Url</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		while ($vendor = mysqli_fetch_array($vendors)) {
						
			echo '<tr>';
			echo '<td><a class="btn btn-app" href="EditVendor.php?id='.$vendor['VNo'].'">'.$vendor['Vendor'].'</a></td>';
			echo '<td><a href="'.$vendor['Url'].'">'.$vendor['Url'].'</a></td>';
			echo '</tr>';		
		}	
		mysqli_close($mySqlConn);
	?>
	</tbody>
</table>
</div>

<div class="col-sm-3"></div>
<div class="col-sm-3"></div>

