<?php
session_start();
if (isset($_SESSION["ID"])){
	
}
else{
	die("you're not connected");

}
 include('DATABASE.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Bootstrap Link-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!--Bootstrap icons  Link-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<!-- FA -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<!--CUSTOM CSS-->
	<link rel="stylesheet" href="css/style4.css">
<script type="text/javascript" src="js/script.js"></script>
	<title>Mes fichiers</title>
</head>
<body>
	<?php 
		if( $_SESSION["type"]==="user"){
			include("NORMALNAVBAR.html");
		}
		if( $_SESSION["type"]==="admin"){
			include("adminnavbar.html");
		}
	?>
	<!-- <nav class="navbar navbar-light  navbar-expand-lg shadow  p-2 mb-2 bg-light  fixed-top">
		<div class="container-fluid">
				
					<a href="index.html" class=" navbar-brand"><img src="img/logo.png" height="70px" alt="LAS9"></a>
					<button class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navmenu">
						<div class="navbar-toggler-icon" ></div>
					</button>
					<div class="collapse navbar-collapse" id="navmenu">
						<ul class="navbar-nav mx-auto ">
							<li class="nav-padding   nav-item"><a href="index.html" class="nav-link ">Home</a></li>
							<li class="nav-padding active  nav-item"><a href="resumes.html" class="nav-link active">Mes fichiers</a></li>
							<li class="nav-padding  nav-item"><a href="recherche.html" class="nav-link">Les LAS9s</a></li>
							
							<li class="nav-padding  nav-item"><a href="profile.html" class="nav-link">Mon profile</a></li>
							<li class="nav-padding  nav-item"><a href="EDIT.html" class=" nav-link">Edit Profile</a></li>

							<li class="nav-padding  nav-item d-none"id="toshowbutton" ><a  class="nav-link  text-nowrap "  href="#">Deconnexion </a></li>

						
						</ul>
						<a id="tobehiddenbutton"class=" nav-link text-nowrap " href="#">Deconnexion  </a>
						
					</div>		
		</div>
	</nav> -->
	
	<!--Section 1-->
	<section class="padding container" id="section-1">
        <div class="row">
            <div class="col-md-8"><h2>Your files</h2></div>
            <div class="col-md-4"><a id="" href="ADDRESUME.php"><button name="addafilebtn" class=" btn  rounded  text-nowrap "id="addresume"  >Add file  <i class="bi bi-plus "></i> </button></a></div>
        </div>
		<?php
		$id=$_SESSION['ID'];
		$query=mysqli_query($con,"SELECT * FROM `files` WHERE pid="."$id");
    while($obj = $query->fetch_object()){
            
            echo  '<div class="card row h-auto"><div class="card-body">
  	<div class="row">
  		<div class="col-9">
  	<h5 class="card-title ">'.$obj->titre.'</h5></div>
    <div class="col-3">
    	<a href="DELETEAFILEBYAUSER.php?id='.$obj->fid.'"><i class="bi bi-trash-fill"></i></a>
    	<!--<a href="ADDRESUME.php"><i class="bi bi-pencil-square"></i></a>-->
    </div>
    </div>
    <p class="card-text">Année: '.$obj->annee.' </p>
    <p class="card-text">Niveau: '.$obj->major.' </p>
    <p class="card-text">Commentaire: '.$obj->commentaire.'</p>
    <a href="file_upload/'.$obj->fichier.'" download = "file_upload/'.$obj->fichier.'" class="btn btn-primary">Download</a>
    </div>
</div>';
        } 
			
?>
		  
		</section>


	<!-- footer -->
	<footer class="padding" id="aboutus">
		<div class="container ">
			<img src="img/logo.png" height="140px" alt="LAS9">
			<p class="intro"> LAS9 arts and crafts is a space that is keen on passing down informations and experience through the generations of the students of ENSAM Casablanca by providing the best LAS9 and support for our future engineers. </p>
			<div class="row pt-2">
				<div class="col-md-4 col-sm-6">
					
					<h3 class="text-center">Contact:</h3>


					 if you have any questions feel free to contact us using:
					<p class="text-center phone-number">+212587856841</p>
					Or Social Media:

					<ul class=" mt-2 d-flex align-items-center justify-content-center footer-list">
					    <li> <a href="https://facebook.com/"><i class="fab fa-facebook-f icon "></i></a></li>
				        <li><a href="https://instagram.com/"><i class="fab fa-instagram icon "></i></a></li>
					    <li> <a href="https://whatsapp.com/"><i class="fab fa-whatsapp icon "></i></a></li>
				    </ul>

				</div>
				<div class="col-md-4 col-sm-6">
					
					<h3 class="text-center">Services:</h3>
					<ul class="footer-list text-center">
						<li class="m-2"><a href="offreprof.html">Teacher service</a></li>
						<li class="m-2"><a href="offreetudient.html">Student service</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13299.072142994411!2d-7.5661469!3d33.5594027!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x569d5bec37f7f81a!2sENSAM%20CASABLANCA!5e0!3m2!1sfr!2sma!4v1637187425813!5m2!1sfr!2sma"  allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
	
			
			<hr>
			<div class="text-center row d-flex align-items-center">
				<div class="col-7">ENSAMTUTO 2021</div>
				<div class="col-5">
					<ul class="d-flex align-items-center footer-list">
					    <li> <a href="https://facebook.com/"><i class="fab fa-facebook-f icon "></i></a></li>
				        <li><a href="https://instagram.com/"><i class="fab fa-instagram icon "></i></a></li>
					    <li> <a href="https://whatsapp.com/"><i class="fab fa-whatsapp icon "></i></a></li>
				    </ul>
				</div>
				
			</div>
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>
</html>