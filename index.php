<?php
session_start();
if (isset($_SESSION['alogin'])) {
    header('Location: ../admin/admin-dashboard.php');
    }
 else if (isset($_SESSION['ologin'])) {
    header('Location: ../officers/officer-dashboard.php');
    }
 else if (isset($_SESSION['login'])) {
    header('Location: ../users/check-email.php');
    }
  else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Primary Meta Tags -->
    <meta content="DPWH Sablayan | CMS is a Complaint Management System (CMS) for DPWH Sablayan, developed by a group of BSIT Students from Occidental Mindoro State College" name="description">
    <meta content="Complaint Management System" name="keywords">
    <!-- Favicons -->
    <link href="img/logo.jpg" rel="icon">
	
	<link rel="apple-touch-icon" sizes="180x180" href="img/logo.jpg">
	<link rel="icon" type="image/jpg" sizes="32x32" href="img/logo.jpg">
	<link rel="icon" type="image/jpg" sizes="16x16" href="img/logo.jpg">

    <title>DPWH | CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="users/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="users/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="users/assets/css/style.css" rel="stylesheet">
    <link href="users/assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      	
	
        
		        
  <section id="container" >
  	
 	<header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" style="color:white" data-placement="right" data-original-title=""></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>DPWH Sablayan | CMS</b></a>
                
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../users/">Login</a></li>
            	</ul>
            </div>
        </header>
		
	 <?php include("users/includes/sidebar_main.php");?>
        
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>About DPWH</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                          	
                           	  <p class="centered"><a href="../users/"><img src="img/logo.jpg" class="img-circle" width="100"></a></p>
                
              	  <h5 class="centered">Welcome to DPWH Sablayan Online Complaint Registration Portal</h5>
              	<h5 class="centered" style="padding: 15px">Are you a concerned citizen or wanted to complain regarding road problem in your area? You are in a right place, just register an account(if you don't have one) and submit your complain to us and wait for the response from DPWH Sablayan representative or employee.</h5>
                         <h4 style="padding-left: 5px">What is DPWH Sablayan | CMS?</h4>
                            <p style="padding: 15px">
                            	DPWH Sablayan | CMS is a Complaint Management System (CMS) for DPWH Sablayan, developed by a group of BSIT Students from Occidental Mindoro State College.
                            </p>
           
                          <h4 style="padding-left: 5px">Mandate</h4>
                            <p style="padding: 15px">
                            	The Department of Public Works and Highways (DPWH) is one of the three departments of the government undertaking major infrastructure projects. The DPWH is mandated to undertake (a) the planning of infrastructure, such as national roads and bridges, flood control, water resources projects and other public works, and (b) the design, construction, and maintenance of national roads and bridges, and major flood control systems.
                            </p>
                            
                                <h4 style="padding-left: 5px">Function</h4>
                            <p style="padding: 15px">
                            	The Department of Public Works and Highways functions as the engineering and construction arm of the Government tasked to continuously develop its technology for the purpose of ensuring the safety of all infrastructure facilities and securing for all public works and highways the highest efficiency and quality in construction. DPWH is currently responsible for the planning, design, construction and maintenance of infrastructure, especially the national highways, flood control and water resources development system, and other public works in accordance with national development objectives.
                            </p>
                            <h4 style="padding-left: 5px">Vision</h4>
                            <p style="padding: 15px">
                            	By 2030, DPWH is an effective and efficient government agency, improving the life of every Filipino through quality infrastructure.
                            </p>
                            
                            <h4 style="padding-left: 5px">Mission</h4>
                            <p style="padding: 15px">
                            	To provide and manage quality infrastructure facilities and services responsive to the needs of the Filipino people in the pursuit of national development objectives.
                            </p>
                            
                            <h4 style="padding-left: 5px">Quality Policy</h4>
                            <p style="padding: 15px">
                            	We commit to provide quality, safe, and environment-friendly public infrastructure facilities that will improve the life of every Filipino.  We commit to comply with all requirements and to continually improve effectiveness and efficiency in serving the public.  We endeavour to implement the RIGHT PROJECTS at the RIGHT COST determined through transparent and competitive bidding; with the RIGHT QUALITY, according to international standards; delivered RIGHT ON TIME through close monitoring of project implementation; and carried out by the RIGHT PEOPLE who are competent and committed to uphold the values of public service, integrity, professionalism, excellence, and teamwork.
                            </p>
                            <h4 style="padding-left: 5px">Core Values</h4>
                            <p style="padding: 15px">
                            	Public Service<br>
                            	Integrity<br>
                            	Professionalism<br>
                            	Excellence<br>
                            	Teamwork<br>
                            </p>
                            
                            

                            
                          </section>
                          
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  </section>
  <footer class="site-footer">
          <div class="text-center">
              &copy; 2022 CMS All rights reserved.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>


   
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="users/assets/js/jquery.js"></script>
    <script src="users/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="users/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="users/assets/js/jquery.scrollTo.min.js"></script>
    <script src="users/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="users/assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="users/assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="users/assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="users/assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="users/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="users/assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="users/assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="users/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="users/assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

<?php } ?>
