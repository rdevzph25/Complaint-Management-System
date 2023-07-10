<?php 
require_once("include/config.php");
if(!empty($_POST["username"])) {
	$username= $_POST["username"];
	
		$result =mysqli_query($bd, "SELECT username FROM officers WHERE username='$username'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Officer with this ID already exists!</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'>ID is available for registration.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
