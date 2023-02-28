<?php
session_start();
if (isset($_SESSION["ID"])){
    echo '
	    <script>
	    alert("Admin logged out!");
        window.location="ADMINLOGIN.php";
	    </script>
	';
}
else{
    die("Admin not connected!");

}
session_destroy();
header("Location: ADMINLOGIN.php")

?>