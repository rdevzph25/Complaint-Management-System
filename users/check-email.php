<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'Y-m-d H:i:s', time () );

if(strlen($_GET['msg']!=""))
  { 
  	$str = $_GET['msg'];
  	$code = base64_decode($str);
       
       $update=mysqli_query($bd, "update users set code='$code', updationDate='$currentTime' where userEmail='".$_SESSION['login']."'");
       
      $successmsg = "We've sent you a new verification code, please check your email, thank you.";
 }
 
$result=mysqli_query($bd, "select * from users where userEmail='".$_SESSION['login']."'");
 while($rw=mysqli_fetch_array($result)) 
 {
 if ($rw['status'] == 1){
 	header('location:register-complaint.php');
 }
 }

if(isset($_POST['submit']))
{
$sql=mysqli_query($bd, "SELECT code FROM  users where code='".$_POST['code']."' && userEmail='".$_SESSION['login']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($bd, "update users set status='1', updationDate='$currentTime' where userEmail='".$_SESSION['login']."'");

header('location:register-complaint.php?msg=Email verified successfully !!');
}
else
{
$errormsg="Verification code is invalid !!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | Verify Email</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>

  <section id="container" >
     <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" style="color:white" data-placement="right" data-original-title=""></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b>DPWH Sablayan | CMS</b></a>
        </header>
        <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="index.php"><img src="../img/logo.jpg" class="img-circle" width="60"></a></p>
                   
              	  <h5 class="centered">DPWH Sablayan | CMS</h5>
                  
                  <li class="sub-menu">
                      <a href="logout.php" >
                          <i class="fa fa-sign-out"></i>
                          <span>Logout</span>
                      </a>
                      
                  </li>          
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
        
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Verify Email</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> User Verify Email</h4>
                  <p style="padding-left: 10px">* Please check your email for verification code.</p>
                       <p style="padding-left: 10px">* We use email verification to verify your identity and to verify you are a not a robot.</p>
                       <p style="padding-left: 10px">* Although email verification is optional but it is more likely those verified users will get their complaints prioritized first.</p>

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Success!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
                      	
<?php $query=mysqli_query($bd, "select * from users where userEmail='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>
 
                      <form class="form-horizontal style-form" method="post" name="emailverify">
                      	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['userEmail']);?>" class="form-control" readonly>
                              </div>
                          </div>
                          <?php } ?>
                          
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Verification Code</label>
                              <div class="col-sm-10">
                                  <input type="number" name="code" required="required" class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:5% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>
 </form>
 
 <?php
 $result=mysqli_query($bd, "select * from users where userEmail='".$_SESSION['login']."'");
 while($rw=mysqli_fetch_array($result)) 
  {
 ?>
<div class="">           
Didn't recieve verification code? Check your spam folder (most cases)<br/>
		                <a
60,0);' href="https://rdevzph.000webhostapp.com/resend.php?name=<?php echo $rw['fullName'];?>&email=<?php echo $rw['userEmail'];?>&code=<?php echo base64_encode(mt_rand(100000,999999));?>">Resend code</div></a>
 <?php } ?>
 	
<div id="countdown">
		            </div>  <br/>     
		<div class="">
		                Do it later?<br/>
		                <a href="register-complaint.php">Continue to website</a>
<div id="countdown"></div>
		            </div>         
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script> 
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
