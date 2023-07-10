
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Dashboard</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="css/dashboard.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
	
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
<style>
[pointer-events="bounding-box"] {
    display: none
}
</style>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
              <?php include('include/sidebar.php');?>				
			     <div class="span9">
					<div class="content">

	                    <div class="module">
							<div class="module-head">
								<h3><i class="menu-icon icon-dashboard"></i> Admin | Dashboard</h3>
							</div>
							
							
								<div class="grid-container">			
									
									  <div class="c-dashboardInfo col-lg-3 col-md-6">
										<div class="wrap">
										  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title"><i class="icon-group"></i> Citizens<svg
											  class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
											  </h4>
											<?php 
											$rt = mysqli_query($bd, "SELECT * from users");
  
                                             // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $rt );
    
                                               // Display result
										   {?><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo htmlentities($rowcount); ?></span>
											<?php } ?></div>
									  </div>
									  
									 
								  <div class="c-dashboardInfo col-lg-3 col-md-6">
										<div class="wrap">
										  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title"><i class="icon-group"></i> Officers<svg
											  class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
											</h4>
											<?php 
											$rt = mysqli_query($bd, "SELECT * from officers");
  
                                             // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $rt );
    
																		   // Display result
									   {?><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo htmlentities($rowcount); ?></span>
										<?php } ?>
								        </div>	
								   </div>
								
								  <div class="c-dashboardInfo col-lg-3 col-md-6">
										<div class="wrap">
										  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title"><i class="icon-inbox"></i> Complaints<svg
											  class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
											  </h4>
											<?php 
											$rt = mysqli_query($bd, "SELECT * from tblcomplaints");
  
                                             // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $rt );
    
																		   // Display result
									   {?><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo htmlentities($rowcount); ?></span>
										<?php } ?>
										</div>	
								   </div>
								
								  <div class="c-dashboardInfo col-lg-3 col-md-6">
										<div class="wrap">
										  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title"><i class="icon-home"></i> Barangay<svg
											  class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
											</h4>
											<?php 
											$rt = mysqli_query($bd, "SELECT * from state");
  
                                             // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $rt );
    
                                               // Display result
										   {?><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo htmlentities($rowcount); ?></span>
											<?php } ?>
                                        </div>
									  </div>
								    </div>
								
								<div class="grid-container-2">			
								  <div id="chart-container">
								  </div>
                                  <div id="chart-container1">
								  </div>
								  </div>
						        
							 
					   </div><!--/.module-->					 
					</div><!--/.content-->
				</div><!--/.span9-->
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.wrapper-->
<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script src="js/jquery-2.1.4.js"></script>
    <script src="js/fusioncharts.js"></script>
    <script src="js/fusioncharts.charts.js"></script>
    <script src="js/themes/fusioncharts.theme.zune.js"></script>
    <script src="js/themes/fusioncharts.theme.ocean.js"></script>
    <script src="js/themes/fusioncharts.theme.fint.js"></script>
    <script src="js/themes/fusioncharts.theme.carbon.js"></script>
    <script src="js/app.js"></script>
    
    <script src="js/fusioncharts.theme.accessibility.js"></script>
    <script src="js/themes/fusioncharts.theme.candy.js"></script>
    <script src="js/themes/fusioncharts.theme.fusion.js"></script>
    <script src="js/themes/fusioncharts.theme.gammel.js"></script>
    <script src="js/themes/fusioncharts.theme.umber.js"></script>
   <!-- <script src="js/app-2.js"></script>-->
    
    <script type="text/javascript">
    FusionCharts.ready(function() {
  var visitChart1 = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container1',
    width: '100%',
    height: '300',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "theme": "fusion",
        "caption": "Complaints Report",
        "subCaption": "Year 2022",
        "xAxisName": "Complaints",
        "yAxisName": "Complaint Numbers",
        "decimals":"0",
        "baseFontSize": "11",
        "showValues": "1"
      },
      
      <?php 
	  $rt1 = mysqli_query($bd, "SELECT * FROM tblcomplaints where status is null");
      $notprocess = mysqli_num_rows( $rt1 );
	   ?>
		<?php 
	  $rt2 = mysqli_query($bd, "SELECT * FROM tblcomplaints where status =  'in Process'");
      $inprocess = mysqli_num_rows( $rt2 );
	   ?>
		<?php 
	  $rt3 = mysqli_query($bd, "SELECT * FROM tblcomplaints where status = 'closed'");
      $closed = mysqli_num_rows( $rt3 );
	   ?>
      
      
      "data": [{
          "label": "Not Processed Yet",
          "value": '<?php echo $notprocess?>'
        },
        {
          "label": "In Process",
          "value": '<?php echo $inprocess?>'
        },
        {
          "label": "Closed",
          "value": '<?php echo $closed?>'
        }
      ]
    }
  }).render();

});

    </script>
</body>
<?php } ?>