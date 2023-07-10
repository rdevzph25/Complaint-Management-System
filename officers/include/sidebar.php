<div class="span3">
					<div class="sidebar">


<ul class="widget widget-menu unstyled">
	                         <li>
								<a href="officer-dashboard.php">
									<i class="menu-icon icon-dashboard"></i>
									<font color="#f0f0f0">Dashboard</font>
								</a>
							</li>
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									<font color="#f0f0f0">Manage Complaints</font>
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="notprocess-complaint.php">
											<i class="icon-tasks"></i>
											New Complaints
											<?php
$rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where status is null");
$num1 = mysqli_num_rows($rt);
{?>
		
											<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="inprocess-complaint.php">
											<i class="icon-tasks"></i>
											Pending Complaints
                   <?php 
  $status="in Process";                   
$rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="closed-complaint.php">
											<i class="icon-inbox"></i>
											Closed Complaints
	     <?php 
  $status="closed";                   
$rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
								</ul>
							</li>
						</ul>


						<ul class="widget widget-menu unstyled">
                                <li><a href="category.php"><i class="menu-icon icon-tasks"></i> <font color="#f0f0f0"> Add Category </font> </a></li>
                                <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i><font color="#f0f0f0"> Add Sub-Category </font> </a></li>
                                <li><a href="state.php"><i class="menu-icon icon-paste"></i><font color="#f0f0f0">Add Barangay</font></a></li>
                          
                        
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									<font color="#f0f0f0">Logout</font>
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
