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
	<link href="../css/easyTree.css" rel="stylesheet">
		
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
	<script src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/select2.full.min.js"></script>
	<script type="text/javascript" src="../js/easyTree.js"></script>
	
	
	<script type="text/javascript">
		$(document).ready(function() {

			$("#add-capabilitydetailcontainer").hide();

			//Load List
			$("#add-parentcapability").load( "../api/CapabilitiesList.php", function( data ) {
				
			});

			//Set dynamic search feature
			$("#add-parentcapability").select2({
	  			placeholder: 'Select Top-Level Category'  				
	  		});

			//Show Capability details on select
  			$('#add-parentcapability').on('select2:select', function (evt) {
  	  			var selectObj = $("#add-parentcapability").select2().val();  	
  				$("#add-capabilitydetail").load( "../api/GetCapabilityDetails.php?id="+selectObj, function(data) {
  					$("#add-capabilitydetailcontainer").show();
  				}); 
  			}); 

  			//Form Actions
  			$("#add-cap").on( "click", function() {
  		        
  		    });

  			//Load Capability Table
			$("#capabilitytable").load( "../api/ui/CapabilitiesTree.php", function( data ) {
				$('.2capability-tree').EasyTree({
	                addable: false,
	                editable: false,
	                deletable: false
	            });
			});
			 			
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
          		<form class="form-inline" role="form" action="#" method="post">
          		    <div class="row">  
	                	<div class="form-group col-sm-5">
	                		<label class="" for="Enclosing Capability">Encompassing Capability:</label>
	                    	<!-- <input required="required" type="text" class="form-control" id="parentcapability" name="parentcapability" placeholder="Select Parent Capability">-->
	                    	<select class="form-control js-example-basic-single" id="add-parentcapability" name="parentcapability">
	                    		<option id="0">Select Top-Level Capability             .</option>
	                    	</select> 
	                    	<div class="row" id="add-capabilitydetailcontainer">
	                    	<br />
								<div class="col-sm-12">
									<div class="panel panel-info">
										<div class="panel-heading">
											<h3 class="panel-title">Selected Capability Hierarchy (bottom-up):</h3>
										</div>
								 		<div id="add-capabilitydetail" class="panel-body">
								 			 	<!--  Parent Capability detail: -->
								 		</div>	 	
							 		</div>	
						 		</div>	
							</div>
	                	</div>
	        	        
	            		<div class="form-group col-sm-3">
	                		<label for="Capability">Capability:</label>
	                	    <input required="required" type="text" id="add-capability" class="form-control" name="capability" placeholder="Enter Capability">
	            	    </div>
	           			
	           			<div class="col-sm-2">
	           				<br>
	        	       		<button type="submit" id="add-cap" class="btn btn-primary">Add</button>
	        	       	</div>
	        	       	
	        	       	<div class="col-sm-2">
	        	       		
	        	       	</div>
	               	</div>
	            </form>
        	</div>
			
			<br>
			<br>
			
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading">Capability List:</div>
			  <div class="panel-body" id="capabilitytable">
			   		
			  </div>			
			  <!-- Table -->
			  <table class="table">
			    
			  </table>
			</div>
			
        </div>
      </div>
    </div>
  </body>
</html>
