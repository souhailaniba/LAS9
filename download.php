<?php
session_start();
if (isset($_SESSION["ID"])){
    
}
else{
    die("you're not connected");

}
include('DATABASE.php');

$id=$_GET["id"]
$file=mysqli_query($con,"SELECT fichier FROM files WHERE fid = '$id'");

echo $file;
/*
if (($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}
}*/
?>
