<?php
session_start();
if (isset($_SESSION["ID"])){
	echo '
	    <script>
	    alert("You are logged out!");
	    </script>
	';
}
else{
	die("You're not connected!");

}
session_destroy();
header("Location: INDEX.php")

?>