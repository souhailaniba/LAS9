<?php
include("DATABASE.php");
include("ADMINFILES.php");
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM `files` WHERE fid='$id'");
if ($sql == true){
    echo '
	    <script>
	    alert("File deleted successfully!");
        window.location="RESUMES.php";
	    </script>
	';
}
else {
    echo '
	    <script>
	    alert("Oops.. Error!");
        window.location="RESUMES.php";
	    </script>
	';
}
?>