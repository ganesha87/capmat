<?php 
	include '../api/lib/config/database.php';
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
		mysqli_close($mySqlConn);
	}
	
	$edit_cno="";
	$edit_Capability="";
	$edit_Parent="";
	
	if(@$_REQUEST['id']!="")
	{
		$edit_cno = @$_REQUEST['id'];
		
		$mySqlObj = new MysqlDBConfig();
		$mySqlConn = $mySqlObj->getConnection();
		
		$tempResults = $mySqlConn->query("SELECT Capability, TopLevel FROM capabilities WHERE CNo = ".$edit_cno.";");
		$tempResult = mysqli_fetch_array($tempResults);
		$edit_Capability = $tempResult["Capability"];
		$edit_Parent = $tempResult["TopLevel"];
		
		mysqli_close($mySqlConn);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>Capability Matrix Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/jquery-ui.min.css">
    
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
	<link href="../css/theme.css" rel="stylesheet">
	<link href="../css/select2.min.css" rel="stylesheet">
		
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
	<script src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/select2.full.min.js"></script>
	
	
	<script type="text/javascript">
		$(document).ready(function() {
			
			var data = <?php include('../api/CapabilitiesList.php'); ?>;
  			$("#parentcapability").select2({
  				data: data,
  				placeholder: 'Select Top-Level Category'  				
  			}); 			

  			$('select').on('select2:select', function (evt) {
  				// Do something
  				var $selectObj = $("#parentcapability").select2().val();  	
  				$("#capabilitydetail").load( "../api/GetCapabilityDetails.php?id="+$selectObj, function(data) {
  					//alert($("#caplevel").val());  					
  				}); 
  			}); 

  			$("#parentcapability").select2().val("<?php echo $edit_Parent; ?>").trigger("change");			
		});		
	</script>

 </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Capability Matrix</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<li><a href="capabilitymatrix.php">Capability Matrix</a></li>
			<li><a href="capabilities.php">Capabilities</a></li>
            <li><a href="vendors.php">Vendors</a></li>
            <li><a href="../help.html">Help</a></li>
          </ul>          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="capabilities.php">Capabilities</a></li>
            <li><a href="vendors.php">Vendors</a></li>
            <li><a href="capabilitymatrix.php">Matrix</a></li>
          </ul>          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <div class="page-header">Add Capability</div>
          
          	<div class="panel-content">          	
          		<form class="form-inline" role="form" action="EditCapability.php" method="post">
          		    <div class="row">  
	                	<div class="form-group col-sm-5">
	                		<label class="" for="Enclosing Capability">Encompassing Capability:</label>
	                    	<!-- <input required="required" type="text" class="form-control" id="parentcapability" name="parentcapability" placeholder="Select Parent Capability">-->
	                    	<select class="form-control js-example-basic-single" id="parentcapability" name="parentcapability">
	                    		
	                    	</select> 
	                	</div>
	        	        
	            		<div class="form-group col-sm-3">
	                		<label for="Capability">Capability:</label>
	                	    <input required="required" type="text" class="form-control" name="capability" placeholder="Enter Capability" value="<?php echo $edit_Capability; ?>" >
	            	    </div>
	           			
	           			<div class="col-sm-2">
	           				<br>
	        	       		<button type="submit" class="btn btn-primary">Save</button>
	        	       	</div>
	        	       	
	        	       	<div class="col-sm-2">
	        	       		<input type="hidden" name="cno" value="<?php echo $edit_cno; ?>" >
	        	       	</div>
	               	</div>
	            </form>
        	</div>
			<div class="row">
 			 <div id="capabilitydetail" class="col-sm-5">
 			 	<!--  Parent Capability detail: -->
 			 </div>
			</div>
			<br>
		
        </div>
      </div>
    </div>
       
  </body>
</html>
