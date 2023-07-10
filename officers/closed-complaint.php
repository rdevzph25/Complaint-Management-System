
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['ologin'])==0)
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
	<title>Officer | Closed Complaints</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

	<!-- jQuery UI CSS -->
    <link rel="stylesheet" href="ajax/libs/jquery-ui-1.13.2/jquery-ui.css">

     <!-- jQuery --> 
     <script src="ajax/libs/jquery-ui-1.13.2/jquery.min.js"></script>

      <!-- jQuery UI JS -->
     <script src="ajax/libs/jquery-ui-1.13.2/jquery-ui.min.js"></script>
      
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
								<h3>Closed Complaints</h3>
							</div>
							<div style="margin: 20px">
<h5>Download Reports</h5>
<form class="form-horizontal row-fluid" method='post' action='complaints_report_pdf.php'>
<div class="control-group">
<label class="control-label" for="basicinput">From Barangay (If none selected, it will show overall report from all barangays)</label>
<div class="controls">
<select name="from_barangay" id='from_barangay' class="form-control">
<option value="">Select Barangay</option>
<?php $sql=mysqli_query($bd, "select stateName from state ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['stateName']);?>"><?php echo htmlentities($rw['stateName']);?></option>
<?php
}
?>
</select>
</div>
   </div>
   
<div class="control-group">
  	<label class="control-label" for="basicinput">From Date</label>
     <div class="controls">
     <!-- Datepicker -->
     <input type='text' class='datepicker' placeholder="From date" name="from_date" id='from_date' readonly>
     </div>
    </div>
	
	<div class="control-group">
     <label class="control-label" for="basicinput">To Date</label>
     <!-- Datepicker -->
	 <div class="controls">
     <input type='text' class='datepicker' placeholder="To date" value = "" name="to_date" id='to_date' readonly>
     </div>
    </div>
     <br/>
	 <div class="controls">
     <!-- Export button -->
     <input type='submit' value='Export to PDF' name='Export' button class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-export"></i></button>
     </div>
	 
    </form> 
    </div>
    
							
							<div class="module-body table">


								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
									<thead>
										<tr>
											<th>Complaint No</th>
											<th>Complainant Name</th>
											<th>Reg Date</th>
											<th>Status</th>
											
											<th>Action</th>
											
										
										</tr>
									</thead>
								
<tbody>
<?php 
$st='closed';
$query=mysqli_query($bd, "select tblcomplaints.*,users.fullName as name from tblcomplaints join users on users.id=tblcomplaints.userId where tblcomplaints.status='$st'");
while($row=mysqli_fetch_array($query))
{
?>										
										<tr>
											<td><?php echo htmlentities($row['complaintNumber']);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['regDate']);?></td>
										
											<td><button type="button" class="btn btn-success">Closed</button></td>
											
											<td> <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>" class="btn btn-primary"> View Details</a> 
											<a href="convert_to_pdf.php?id=<?php echo htmlentities($row['complaintNumber']);?>" class="btn btn-danger">Download PDF</a>
                                            </td>
											</tr>

										<?php  } ?>
										</tbody>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
	<script>
    $(document).ready(function(){
	
   // From datepicker
   $("#from_date").datepicker({ 
      dateFormat: 'yy-mm-dd',
      changeYear: true,
      onSelect: function (selected) {
         var dt = new Date(selected);
         dt.setDate(dt.getDate() + 1);
         $("#to_date").datepicker("option", "minDate", dt);
      }
   });

   // To datepicker
   $("#to_date").datepicker({
      dateFormat: 'yy-mm-dd',
      changeYear: true,
      onSelect: function (selected) {
         var dt = new Date(selected);
         dt.setDate(dt.getDate() - 1);
         $("#from_date").datepicker("option", "maxDate", dt);
      }
   });
});
</script>
</body>
<?php } ?>