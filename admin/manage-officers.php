
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

if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$query=mysqli_query($bd, "insert into officers(fullName,username,password) values('$fullname','$username','$password')");
}

if(isset($_GET['del']))
		  {
			      $officerID=$_GET['id'];
		          mysqli_query($bd, "delete from officers where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Officer deleted !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Manage Officers</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
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
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
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
								<h3>Create Officer</h3>
							</div>
							<div class="module-body">
							<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
									<strong>Well done! Registration successful !!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>

									<br />
<form class="form-horizontal row-fluid" name="Category" method="post" >
								
<div class="control-group">
<label class="control-label" for="basicinput">Officer Full Name</label>
<div class="controls">
<input type="text" placeholder="Enter officer full name" name="fullname" class="span8 tip" required>
</div>
</div>

							
<div class="control-group">
<label class="control-label" for="basicinput">Officer ID</label>
<div class="controls">
<input type="text" placeholder="Enter officer ID" id="username" onBlur="userAvailability()" name="username" class="span8 tip" required>
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
</div>
								
<div class="control-group">
<label class="control-label" for="basicinput">Officer password</label>
<div class="controls">
<input type="text" placeholder="Enter officer password"  name="password" class="span8 tip" required>
</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" id="submit" name="submit" class="btn">Create</button>
											</div>
										</div>
									</form>
							</div>
						</div>
							<div class="module-head">
								<h3>Manage Officers</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Officer Name</th>
											<th>Officer ID</th>
											<th>Registration date</th>
											<th>Action</th>
										
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($bd, "select * from officers");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['fullName']);?></td>
											<td><?php echo htmlentities($row['username']);?></td>
											<td><?php echo htmlentities($row['regDate']);?></td>

											<td>
											<a href="update-officer.php?id=<?php echo $row['id']?>">
											 <button type="button" class="btn btn-primary">Update</button></a>
                                             <a href="manage-officers.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete this officer?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
										
											</a></td>
											
										<?php $cnt=$cnt+1; } ?>
										
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
</body>
<?php } ?>