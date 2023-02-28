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
            <title>LAS9 arts and crafts</title>
        </head>
        <body>
	        <!-- <nav class="navbar navbar-light  navbar-expand-lg shadow  p-2 mb-2 bg-light  fixed-top">
		        <div class="container-fluid">
					
					<a href="-%20index.php" class=" navbar-brand"><img src="img/logo.png" height="70px" alt="LAS9"></a>
					<button class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navmenu">
						<div class="navbar-toggler-icon" ></div>
					</button>
					<div class="collapse navbar-collapse" id="navmenu">
						<ul class="navbar-nav mx-auto ">
							<li class="nav-padding   nav-item"><a href="-%20index.php" class="nav-link ">Home</a></li>
							<li class="nav-padding   nav-item"><a href="-%20resumes.html" class="nav-link ">Mes fichiers</a></li>
							<li class="nav-padding  active nav-item"><a href="-%20recherche.php" class="nav-link active">Les LAS9s</a></li>
							
							<li class="nav-padding  nav-item"><a href="-%20profile.php" class="nav-link">Mon profile</a></li>
							<li class="nav-padding  nav-item"><a href="-%20editprofile.php" class=" nav-link">Edit Profile</a></li>

							<li class="nav-padding  nav-item d-none"id="toshowbutton" ><a  class="nav-link  text-nowrap "  href="#">Deconnexion </a></li>

						
						</ul>
						<a id="tobehiddenbutton"class=" nav-link text-nowrap " href="#">Deconnexion  </a>
					<a id="tobehiddenbutton" href="offreprof.html"><button class=" btn btn-lg btn-primary rounded ms-auto "  >Get Started<i class="bi bi-arrow-right "></i> </button></a>
					</div>		
		        </div>
	</nav> -->
	<?php 
		if( $_SESSION["type"]==="user"){
			include("NORMALNAVBAR.html");
		}
		if( $_SESSION["type"]==="admin"){
			include("adminnavbar.html");
		}
	?>
	<!--MODAL-->
	<div class="modal " tabindex="-1" id="registerModal">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Registration Form</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form>
		        	<label for="exampleFormControlInput1" class="form-label">First Name</label>
  					<input type="email" class="form-control"  placeholder="Ex:Salah">
  					<label for="exampleFormControlInput1" class="form-label">Last Name</label>
  					<input type="email" class="form-control" placeholder="Ex:Aniba">
  					<label for="exampleFormControlInput1" class="form-label">Email address</label>
  					<input type="email" class="form-control" placeholder="name@example.com">
  					<label for="exampleFormControlInput1" class="form-label">Password</label>
  					<input type="email" class="form-control" type="password" placeholder="Password">
  					<label for="exampleFormControlInput1" class="form-label">Repeat Password</label>
  					<input type="email" class="form-control" type="password" placeholder="Password">
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Register</button>
		      </div>
		    </div>
		  </div>
	</div>
	<!--Section 1-->
	<section class="padding" id="section-1">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12 d-flex align-items-center">
					<div class=" ">
						<h5> The space of LAS9  </h5>
						<p class="lead"> And here, students can find the best cheatsheets (LAS9s)  
 that are compatible with their needs  </p>
					</div>
				</div>
				<div class="col-md-6 d-md-flex d-none  align-items-center justify-content-end">
					<img src="img/std.svg" class="img-fluid">
				</div>
			</div>
			

		</div>
		
	</section>
	<!--filters bar -->
	<form  action=""  method="POST">
	<div class="container mt-3  ">
		<div class="row ">
            <div id="search" class="input-group col-10  ">

                <input name="ValueToSearch" type="text" class="form-control " placeholder="Rechercher" >
			    <button name="searchbtn" class="btn input-group-text" type="submit" id="basic-addon2" ><i class="  fas fa-search"></i></span></button>
            </div>

			<button name="filterbtn" class="col-1 btn " id="filter_btn" type="button" data-bs-toggle="collapse"data-bs-target="#filters" aria-expanded="false" aria-controls="collapseExample">
				    <i class="fas fa-filter"></i>
			</button>
			<div id="filters" class="collapse row my-2 ">
				<h5>Filters:  </h5>
				<select name="type_f" class="col-2 form-select ">
						<option value="0">Choose</option>
						<option value="TD">TD</option>
                        <option value="TD">TP</option>
						<option value="Examen">Examen</option>
						<option value="Resume">Resume</option>
					</select>
				<select name="filiere_f" class="col-2 form-select ">
						<option value="0">Choose</option>
						<option value="IAGI">IAGI</option>
						<option value="MSEI">MSEI</option>
						<option value="GEM">GEM</option>
						<option value="GM">GM</option>
						<option value="GI">GI</option>
						<option value="API1">API1</option>
						<option value="API2">API2</option>
					</select>
				
			</div>

        <?php
        # function to connect & execute the query
       

        if(isset($_POST['ValueToSearch']))
        {

            $ValueToSearch=$_POST['ValueToSearch'];
            $filiere_f=$_POST["filiere_f"];
            $type_f=$_POST["type_f"];
            //$query="SELECT * FROM `users` WHERE CONCAT(`firstname`, `lastname`,`matiere`, `filiere`, `niveau`, `prix`) LIKE '%".$ValueToSearch."%'" ;
            $query="SELECT * FROM `files` WHERE  titre LIKE '%".$ValueToSearch."%' ";
            $search_result=mysqli_query($con,$query);

        }


        
        ?>
        </div>
	</div>	
	</form>			
	
	<!-- section-2 -->
	<section class="p-2 container" id="section2">

        <?php
        if (isset($search_result)){
            while($obj = $search_result->fetch_object()){
            if(!empty($type_f) or !empty($filiere_f)){
                #echo "HHHHHHHHHHHHHHHHHHHH";

                if($obj->type == $type_f or $obj->major == $filiere_f){
                    echo  '<div class="card row h-auto">
                <div class="card-body">
  	                <div class="row">
  		                <div class="col-9">
                            <h5 class="card-title ">'.$obj->titre.'</h5></div>
                            <!--<div class="col-3">
                                <a href=""><i class="bi bi-trash-fill"></i></a>
                                <a href="-%20addresume.php"><i class="bi bi-pencil-square"></i></a>
                            </div>-->
                        </div>
                    <p class="card-text">Type: '.$obj->type.'</p>
                    <p class="card-text">Filière: '.$obj->major.'</p>
                    <form method="get" action="DOWNLOADAFILE.php">
                         <!--<a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>"> Download</a>-->
                         <a href="file_upload/'.$obj->fichier.'" download = "file_upload/'.$obj->fichier.'" class="btn btn-primary">Download</a>
  
                        <button name="downloadbtn" type="submit" class="btn btn-primary">Get</button>-->
                    </form>
                    
                </div>
            </div>';
                }
            }
            else{
                echo  '<div class="card row h-auto">
                <div class="card-body">
  	                <div class="row">
  		                <div class="col-9">
                            <h5 class="card-title ">'.$obj->titre.'</h5></div>
                            <!--<div class="col-3">
                                <a href=""><i class="bi bi-trash-fill"></i></a>
                                <a href="-%20addresume.php"><i class="bi bi-pencil-square"></i></a>
                            </div>-->
                        </div>
                    <p class="card-text">Type:'.$obj->type.'</p>
                    <p class="card-text">Filière: '.$obj->major.'</p>
                    <form method="get" action="DOWNLOADAFILE.php">
                         <!--<a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>"> Download</a>-->
                         <a href="file_upload/'.$obj->fichier.'" download = "file_upload/'.$obj->fichier.'" class="btn btn-primary">Download</a>
  
                        <!--<button name="downloadbtn" type="submit" class="btn btn-primary">Get</button>-->
                    </form>
                    
                </div>
            </div>';
            }
        } 
           }
            ?>
           

		  <nav >
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
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
                            <li><a href="https://facebook.com/"><i class="fab fa-instagram icon "></i></a></li>
                            <li> <a href="https://facebook.com/"><i class="fab fa-whatsapp icon "></i></a></li>
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