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
	<title>Add</title>
</head>
<body>
	<!--insert navbar with php-->
	<?php 
		if( $_SESSION["type"]==="user"){
			include("normalnavbar.html");
		}
		if( $_SESSION["type"]==="admin"){
			include("adminnavbar.html");
		}?>
	<!--Section 1-->
	<section class="padding container" id="section-1">
		<div class="   vh-md-100 row">
		<div class=" col-sm-12">
		<h2>Add a Las9</h2>
		 <form  enctype="multipart/form-data" method="post">
		 			
		        	<label for="exampleFormControlInput1" class="form-label">Title</label>
  					<input name="titre" type="text" class="form-control"  placeholder="electromagnetisme">
					<label for="exampleFormControlInput1" class="form-label">Type</label>
					<select name="type" class="form-select">
						<option value="TD">TD</option>
						<option value="TP">Resume</option>
						<option value="Examen">Examen</option>
						<option value="Controle">Controle</option>
						
					</select>
					<label for="exampleFormControlInput1" class="form-label">Major</label>
					<select name="major" class="form-select">
						<option value="IAGI">IAGI</option>
						<option value="MSEI">MSEI</option>
						<option value="GEM">GEM</option>
						<option value="GM">GM</option>
						<option value="GI">GI</option>
						<option value="API1">API1</option>
						<option value="API2">API2</option>
					</select>
					<label for="exampleFormControlInput1" class="form-label">Year</label>
  					<input name="annee" type="text" class="form-control"  placeholder="2022">


					<label for="exampleFormControlInput1" class="form-label">File</label>
	  				<input name="fichier" type="file" class="form-control"  />
	  				<label for="exampleFormControlInput1" class="form-label">Comment</label>
	  				<textarea name="commentaire" type="text" class="form-control" rows=3></textarea>
  					<button name="uploadbtn" type="submit" class="btn btn-primary">Upload</button>
		        </form>
            <?php
             #connexion avec la base de données
            if(isset($_POST['commentaire']))
            {
                #$countmsg="";
                #$time=time()-30;
                #$check_files_row=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total_count from files where pid="."$id"));
                #$total_count=$check_files_row['total_count'];

                #$uploader_fname=$_POST['fname']; #khass kifash tdouz l'id dyal user li dakhel bash thett hna smiyto
                #$uploader_lname=$_POST['lname'];

                $titre=$_POST['titre'];
                $type=$_POST['type'];
                $major=$_POST['major'];
                $annee=$_POST['annee'];
                //$fichier=$_POST['fichier'];
                $filename = $_FILES['fichier']["name"];
                $ext=$_=pathinfo($filename, PATHINFO_EXTENSION);;
               
   				$tempfile = $_FILES["fichier"]["tmp_name"];
   				$filenameWithDirectory = "file_upload/".basename($tempfile).".$ext";
   				$short_name=basename($tempfile).".$ext";
                $commentaire=$_POST['commentaire'];
                $ID=$_SESSION['ID'];


                $sql=mysqli_query($con,"INSERT INTO `files`(`titre`,`type`,`major`,`annee`,`fichier`,`commentaire`,`pid`) VALUES('$titre','$type','$major','$annee','$short_name','$commentaire','$ID')");
                if($sql==true && move_uploaded_file($tempfile, $filenameWithDirectory)) 
                {
                    echo '
                            <script>
                            alert("Successfully uploaded!");
                         window.location="RESUMES.php";
                            </script>
                    ';
                }
                else
                {
                    echo '
                            <script>
                            alert("Error in the upload!");
                            
                            </script>
                    ';
                }

            }
            ?>
		</div>
		
		</div>
		  
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