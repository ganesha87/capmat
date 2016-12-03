<?php 
	include '../api/lib/config/database.php';
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
    
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
	<link href="../css/theme.css" rel="stylesheet">

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
            <li><a href="capabilities.php">Capabilities</a></li>
            <li class="active"><a href="vendors.php">Vendors</a></li>
            <li><a href="capabilitymatrix.php">Matrix</a></li>
          </ul>          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <div class="page-header"><b>Add Vendor</b></div>
          
          	<div class="panel-content">          	
          		<form class="form-inline" role="form" action="vendors.php" method="post">
          		    <div class="row">  
	                	<div class="form-group col-sm-3">
	                		<label class="" for="Vendor name">Vendor:</label>
	                    	<input class="form-control" type="text" required="required" name="vendor" placeholder="Provide Vendor name"> 
	                	</div>
	        	        
	            		<div class="form-group col-sm-3">
	                		<label for="url">Url:</label>
	                	    <input type="url" class="form-control" name="url" placeholder="Provide reference Url">
	            	    </div>
	           			
	           			<div class="col-sm-3">	 
	           				<br>          				
	        	       		<button type="submit" class="btn btn-primary">Add</button>
	        	       	</div>
	        	       	
	        	       	<div class="col-sm-3">
	        	       		
	        	       	</div>
	               	</div>
	            </form>
        	</div>
        	<br>
        	<br>
          	<div class="row">
          		<?php include '../api/VendorsTable.php'; ?>
          	</div>
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>    
  </body>
</html>
