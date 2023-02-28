<?php
include("DATABASE.php");
include("ADMINUSERS.php");
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM `users` WHERE sid='$id'");
if ($sql == true){
    echo '
	    <script>
	    alert("User deleted successfully!");
        window.location="ADMINUSERS.php";
	    </script>
	';
}
else {
    echo '
	    <script>
	    alert("Oops.. Error!");
        window.location="ADMINUSERS.php";
	    </script>
	';
}
?>