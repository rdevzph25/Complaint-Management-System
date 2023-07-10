<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else {
  if(isset($_POST['update']))
  {
   $extension = pathinfo($_FILES["compfile"]["name"], PATHINFO_EXTENSION);

if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif')
{
$complaintnumber=$_GET['cid'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$compfile=$_FILES["compfile"]["name"];

if (move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"])) {
    $msg="Proof of work submitted successfully";
} else {
   $err="No proof of work submitted"; 
}

$rt=mysqli_query($bd, "select * from tblcomplaints where tblcomplaints.complaintNumber='$complaintnumber'");
while($row=mysqli_fetch_array($rt))
{
$barangay = $row['state'];

$query=mysqli_query($bd, "insert into complaintremark(complaintNumber,status,remark,barangay,proofFile) values('$complaintnumber','$status','$remark', '$barangay','$compfile')");
$sql=mysqli_query($bd, "update tblcomplaints set status='$status' where complaintNumber='$complaintnumber'");

echo "<script>alert('Complaint details updated successfully');</script>";
   
  }
}else{
	 $err="Oh Snap! Uploaded file is not an image!"; 
	}
}

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Complaint</title>
   <!-- Bootstrap core CSS -->
    <link href="../users/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../users/assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../users/assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="../users/assets/css/style.css" rel="stylesheet">
    <link href="../users/assets/css/style-responsive.css" rel="stylesheet">
    
    <style>
 img{
   max-height:200px;
   max-width:200px;
}
img[src=""] {
   display: none;
}
input[type=file]{
   padding:5px;}
</style>
</head>
<body>
<div class="container">
 <form name="updateticket" id="updatecomplaint" method="post" enctype="multipart/form-data"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <p style="color: green">
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?>


		        </p>
		    <p style="color: red">
		        	<?php if($err){
echo htmlentities($err);
		        		}?>


		        </p>
    <tr height="50">
      <td><b>Complaint Number: </b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" class="form-control" required="required">
      <option value="">Select Status</option>
      <option value="in process">In Process</option>
    <option value="closed">Closed</option>
        
      </select></td>
    </tr>


      <tr height="50">
      <td><b>Remark</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>
    
      <tr height="50">
      <td><b>Proof of work (Take a picture)</b></td>
      <td>
  <img id="imagepreview" src="" alt="File Not Supported" style="padding-top:5px;" />
<input type="file" name="compfile" class="form-control" value="" onchange="readURL(this);" required>
<p>Allowed file types: .jpg, .jpeg, .png, and .gif</p>
</td>
    </tr>
    


        <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" class="btn btn-primary" value="Submit"></td>
    </tr>



       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   
      <input name="Submit2" type="submit" class="btn btn-primary" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   

 
</table>
 </form>
</div>


	
<!-- js placed at the end of the document so the pages load faster -->
    <script src="../users/assets/js/jquery.js"></script>
    <script src="../users/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../users/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../users/assets/js/jquery.scrollTo.min.js"></script>
    <script src="../users/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../users/assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="../users/assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="../users/assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="../users/assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="../users/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../users/assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="../users/assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="../users/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="../users/assets/js/form-component.js"></script>    
    

<script type="text/javascript">
       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imagepreview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>
</body>
</html>
<?php } ?>