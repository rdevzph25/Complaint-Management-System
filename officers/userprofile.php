<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['ologin'])==0)
  { 
header('location:index.php');
}
else{

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
<title>User Profile</title>
   <!-- Bootstrap core CSS -->
    <link href="../users/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../users/assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../users/assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="../users/assets/css/style.css" rel="stylesheet">
    <link href="../users/assets/css/style-responsive.css" rel="stylesheet">
</head>
<body>

<div class="container" style="padding-top: 25px">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 

$ret1=mysqli_query($bd, "select * FROM users where id='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
  
		
    <tr>
      <td colspan="2"><b><?php echo $row['fullName'];?>'s profile</b></td>
      
    </tr>
    
    
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Reg Date:</b></td>
      <td><?php echo htmlentities($row['regDate']); ?></td>
    </tr>
    <tr height="50">
      <td><b>User Email:</b></td>
      <td><?php echo htmlentities($row['userEmail']); ?></td>
    </tr>


      <tr height="50">
      <td><b>User Contact no:</b></td>
      <td><?php echo htmlentities($row['contactNo']); ?></td>
    </tr>
    


        <tr height="50">
      <td><b>Address:</b></td>
      <td><?php echo htmlentities($row['address']); ?></td>
    </tr>



        <tr height="50">
      <td><b>State:</b></td>
      <td><?php echo htmlentities($row['State']); ?></td>
    </tr>


        <tr height="50">
      <td><b>Country:</b></td>
      <td><?php echo htmlentities($row['country']); ?></td>
    </tr>


        <tr height="50">
      <td><b>Pincode:</b></td>
      <td><?php echo htmlentities($row['pincode']); ?></td>
    </tr>  


        <tr height="50">
      <td><b>Last Updation:</b></td>
      <td><?php echo htmlentities($row['updationDate']); ?></td>
    </tr>
     <tr height="50">
      <td><b>Status:</b></td>
      <td><?php if($row['status']==1)
      { echo "Active";
} else{
  echo "Block";
}
        ?></td>
    </tr>
    
    <tr>
  
      <td colspan="2">   
      <input name="Submit2" type="submit" class="btn btn-primary" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   
    <?php } 

 
    ?>
 
</table>
 </form>
</div>

</body>
</html>

     <?php } ?>