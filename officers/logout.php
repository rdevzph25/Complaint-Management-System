<?php
session_start();
$_SESSION['ologin']=="";
session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="../users/index.php";
</script>