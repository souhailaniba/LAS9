<?php
session_start();
if (isset($_SESSION["ID"])){
	
}
else{
	die("You're not connected!");

}
 include('database.php');
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
	<title>Dashboard</title>
</head>
<body>
	<?php 
		if( $_SESSION["type"]==="user"){
			include("normalnavbar.html");
		}
		if( $_SESSION["type"]==="admin"){
			include("adminnavbar.html");
		}
	?>
	<!--<nav class="navbar navbar-light  navbar-expand-lg shadow  p-2 mb-2 bg-light  fixed-top">
		<div class="container-fluid">
					
					<a href="index.html" class=" navbar-brand"><img src="img/logo.png" height="70px" alt="LAS9"></a>
					<button class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navmenu">
						<div class="navbar-toggler-icon" ></div>
					</button>
					<div class="collapse navbar-collapse" id="navmenu">
						<ul class="navbar-nav mx-auto ">
							<li class="nav-padding   nav-item"><a href="index.html" class="nav-link ">Home</a></li>
							<li class="nav-padding   nav-item"><a href="resumes.html" class="nav-link ">Mes fichiers</a></li>
							<li class="nav-padding  nav-item"><a href="recherche.html" class="nav-link">Les LAS9s</a></li>
							
							<li class="nav-padding  nav-item"><a href="profile.html" class="nav-link">Mon profile</a></li>
							<li class="nav-padding active nav-item"><a href="editprofile.html" class="active nav-link">Edit Profile</a></li>

							<li class="nav-padding  nav-item d-none"id="toshowbutton" ><a  class="nav-link  text-nowrap "  href="#">Deconnexion </a></li>

						
						</ul>
						<a id="tobehiddenbutton"class=" nav-link text-nowrap " href="#">Deconnexion  </a>
					</div>		
		</div>
	</nav>
	-->
	<!--ADDD NAVBAR WITH  PHP -->
	<!--Section 1-->
	<section class="padding container" id="section-1">
        <?php
        #$id=$_GET(); KHASS NCHOUF ID MEN REDIRECTION LI AY3TI LIEN LI QBEL
        $id=$_SESSION["ID"];
        $sql=mysqli_query($con,"SELECT * FROM users WHERE sid='$id'");
        $result=mysqli_fetch_array($sql);
        ?>

		<div class="  vh-sm-200 vh-md-100 row">
		<div class=" padding col-md-6 col-sm-12">
		<h2>General Information</h2>
		 <form method="post">
		 			<label for="exampleFormControlInput1" class="form-label">Photo</label>
	  				<input name="nphoto[]" type="file" value="" class="form-control"  placeholder="Ex:Salah-pic.png" >
		        	<label for="exampleFormControlInput1" class="form-label">First Name</label>
  					<input name="nfname" ype="text" class="form-control"  placeholder="Ex:Salah" value="<?php echo $result['fname']; ?>">
  					<label for="exampleFormControlInput1" class="form-label">Last Name</label>
  					<input name="nlname" type="text" class="form-control" placeholder="Ex:Aniba" value="<?php echo $result['lname']; ?>">
  					<label for="exampleFormControlInput1" class="form-label">Email address</label>
  					<input name="nusername" type="email" class="form-control" placeholder="name@example.com" value="<?php echo $result['username']; ?>">
					<label for="exampleFormControlInput1" class="form-label">Major</label>
					<select name="nmajor" class="form-select" value="<?php echo $result['major']; ?>">
						<option value="IAGI">IAGI</option>
						<option value="MSEI">MSEI</option>
						<option value="GEM">GEM</option>
						<option value="GM">GM</option>
						<option value="GI">GI</option>
						<option value="API1">API1</option>
						<option value="API2">API2</option>
					</select>
	  				<label for="exampleFormControlInput1" class="form-label">Interests</label>
	  				<input name="ninterests" class="form-control" type="text" placeholder="PHP,HTML,Mecanique" value="<?php echo $result['interests']; ?>">
			 	     				
  					<button name="updatebtn" type="submit" class="btn btn-primary">Update</button>
		        </form>
            <?php
            ##################
            $phpFileUploadErrors=array(
                    0 => 'No error',
                    1 => 'Exceeds max',
                    2 => 'max size',
                    3 => 'parially uploaded',
                    4 => 'No upload',
                    6 => 'f missing',
                    7 => 'writing failed',
                    8 => 'upload stopped',
            );
            if(isset($_FILES['nphoto'])){
                $file_array=reArrayFiles($_FILES['nphoto']);
                //pre_r($file_array);
                for($i=0;$i<count($file_array);$i++){
                    if ($file_array[$i]['error'])
                    {
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            echo $file_array[$i]['name'],' - ',$phpFileUploadErrors[$file_array[$i]['error']];
                            ?>
                        </div>
                        <?php
                    }
                    else{
                        $extensions=array('jpg','png','gif','jpeg');

                        $file_ext=explode('.',$file_array[$i]['photo_name']);
                        $photo_name=$file_ext[0];
                        $photo_name=preg_replace("!-!"," ",$photo_name);

                        $file_ext=end($file_ext);

                        if(!in_array($file_ext,$extensions))
                        {
                            ?>
                            <div class="alert alert-danger">
                                <?php
                                echo "{$file_array[$i]['name']} - Invalid file extension!";
                                ?>
                            </div>
                            <?php
                        }
                        else{

                            $photo_dir='upPICTURES/'.$file_array[$i]['name'];
                            move_uploaded_file($file_array[$i]['name'],$photo_dir);

                            $sqlp="INSERT IGNORE INTO 'users' (photo_name,photo_dir) VALUES('$photo_name','$photo_dir')";
                            $con->query($sqlp) or die($con->error);
                            ?>
                            <div class="alert alert-success">
                                <?php
                                    #echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array$file_array[$i]['error']];
                                ?>
                            </div>
                            <?php
                        }
                    }
                }
            }
            function reArrayFiles(&$file_post){
                $file_ary=array();
                $file_count=count($file_post['name']);
                $file_keys=array_keys($file_post);

                for($i=0;$i<$file_count;$i++){
                    foreach ($file_keys as $key){
                        $file_ary[$i][$key]=$file_post[$key][$i];
                    }
                }

                return $file_ary;
            }

            function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
            ##################
            if(isset($_POST['updatebtn']))
            {

                $id=$_SESSION["ID"];
                $nphoto=$_POST['nphoto'];
                $nfname=$_POST['nfname'];
                $nlname=$_POST['nlname'];
                $nusername=$_POST['nusername'];
                $nmajor=$_POST['nmajor'];
                $ninterests=$_POST['ninterests'];
                $sql=mysqli_query($con,"UPDATE `users` SET `fname`='$nfname',`lname`='$nlname',`photo`='$nphoto',`username`='$nusername',`major`='$nmajor',`interests`='$ninterests', `photo_name`='$photo_name',`photo_dir`='$photo_dir' WHERE sid='$id' ");
                if($sql == true)
                {
                    echo '
                            <script>
                            alert("Informations updated successfully!");
                            window.location="PROFILE.php";
                            </script>
                            ';
                }
                else
                {
                    echo '
                            <script>
                            alert("Something is wrong in the update!");
                            </script>
                            ';
                }
            }
            ?>
		</div>
		<div class=" padding col-md-6 col-sm-12">

		<h2>Change Password</h2>
			<form method="post">
		        	
  					<label for="exampleFormControlInput1" class="form-label">Old Password</label>
  					<input name="opassword" class="form-control" type="password" placeholder="Old Password">
  					<label for="exampleFormControlInput1" class="form-label">New Password</label>
  					<input name="npassword" class="form-control" type="password" placeholder="New Password">
  					<label for="exampleFormControlInput1" class="form-label">Repeat Password</label>
  					<input name="npassword2" class="form-control" type="password" placeholder="Repeat Password">
  					<button name="pupdatebtn" type="submit" class="btn btn-primary">Update</button>
		 	     
		        </form>
            <?php
            if(isset($_POST['pupdatebtn']) and $_POST['npassword']==$_POST['npassword2'])
            {
                $id=$_SESSION["ID"];
                $npassword=$_POST['npassword'];

                $sql2=mysqli_query($con,"UPDATE `users` SET `password`='$npassword' WHERE sid='id' ");
                if($sql2 == true)
                {
                    echo '
                            <script>
                            alert("Password successfully updated!");
                            window.location="INDEX.php";
                            </script>
                            ';
                }
                else
                {
                    echo '
                            <script>
                            alert("Something is wrong in the update!");
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