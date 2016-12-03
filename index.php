<?php 
	include 'api/lib/config/database.php';
	
		$vendor_count = 0;
		$capability_count = 0;
	
		$mySqlObj = new MysqlDBConfig();
		$mySqlConn = $mySqlObj->getConnection();
		
		$query = 'SELECT COUNT(*) as vendor_count FROM `vendors` WHERE Active=1';
		//echo $query;
		$results = $mySqlConn->query($query);
		$result = mysqli_fetch_array($results);
		$vendor_count=$result["vendor_count"];
		
		$query = 'SELECT COUNT(*) as capabilities_count FROM `capabilities` WHERE Active=1';
		//echo $query;
		$results = $mySqlConn->query($query);
		$result = mysqli_fetch_array($results);
		$capability_count = $result["capabilities_count"];
		
		mysqli_close($mySqlConn);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Capability Matrix - Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">

    
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Capability Matrix</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="dashboard\dashboard.php">Dashboard</a></li>
            <li><a href="help.html">Help</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
	<br>
	<br>
      <div class="starter-template well">
        <h1><b>Vendor Capability Matrix</b></h1>
        <p class="lead">lists the capabilities provided by IAGM as a service vendors in a comparision matrix</p>
      </div>
      
     <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="glyphicon glyphicon-plus"></i>
						<div class="count"><?php echo $capability_count; ?></div>
						<div class="title">Capabilities</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box orange-bg">
						<i class="glyphicon glyphicon-th"></i>
						<div class="count">0  %</div>
						<div class="title">Capability Coverage</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="glyphicon glyphicon-cloud"></i>
						<div class="count"><?php echo $vendor_count; ?></div>
						<div class="title">Vendors</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->				
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="glyphicon glyphicon-tasks"></i>
						<div class="count">Data</div>
						<div class="title">Analytics</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
	</div>
	
	<div class="row">
               	
				<div class="col-lg-6 col-md-12">	
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h2><strong>Capability Coverage:</strong></h2>							
						</div>
						<div class="panel-body">
							<table class="table bootstrap-datatable">
								<thead>
									<tr>
										<th>Capability Category</th>										
										<th>Vendor Coverage</th>
									</tr>
								</thead>   
								<tbody>
									<tr>
										<td>Operational Management</td>										
										<td>
											<div class="progress thin">
												<div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100" style="width: 27%">
											  	</div>
											</div>
											<span class="sr-only">73%</span>   	
										</td>
									</tr>
									<tr>
										<td>Identity Management</td>
										<td>
											<div class="progress thin">
												<div class="progress-bar" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%">
												</div>
											</div>
											<span class="sr-only">57%</span>   	
										</td>
									</tr>
									<tr>
										<td>Access Management</td>
										<td>
											<div class="progress thin">
												<div class="progress-bar" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 93%">
												</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width: 7%">
											  	</div>
											</div>
											<span class="sr-only">93%</span>   	
										</td>
									</tr>
									<tr>
										<td>Access Governance</td>
										<td>
											<div class="progress thin">
											  	<div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
											  	</div>
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
											  	</div>
											</div>
											<span class="sr-only">20%</span>   	
										</td>
									</tr>
									</tbody>
							</table>
						</div>
	
					</div>	

				</div>
				
				<div class="col-lg-3 col-md-12"></div>
				<!--/col-->
				
              </div>
	
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>
