<?php
session_start();
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
	<link rel="stylesheet" href="css/admin.css">
<script type="text/javascript" src="js/admin.js"></script>
	<title>Dashboard</title>
</head>
<body>
	<div class="row container-fluid vh-100 justify-content-center styledlogin" >
	<div class="col-lg-4 d-sm-none d-lg-flex justify-content-center align-items-center"><img src="img/admin.svg" alt="" class="img-fluid"></div>
	<div class="col-12 col-md-6 d-flex justify-content-center align-items-center  ">
		  <div class="modal-dialog styledlogin">
		    <div class="modal-content">
		      <div class="modal-header d-flex justify-content-center">
		       <h5 class="modal-title">Admin Login</h5> 
		      
		      </div>
		      </div>
		      <div class="modal-body"   id='loginform'>
		        <form method="post">
		        	<label for="exampleFormControlInput1" class="form-label">Email</label>
  					<input name="admuser" type="email" class="form-control"  placeholder="name@example.com">
  					
  					<label for="exampleFormControlInput1" class="form-label">Password</label>
  					<input name="admpassword" class="form-control" type="password" placeholder="Password">
  					<button name="admlogin" type="submit" class="btn btn-primary">login</button>

		        </form>
                  <?php
                  #include('database.php'); #connexion avec la base de données (I won't need it for 1 user, i'll just check CHAR inputs)
                  if(isset($_POST['admlogin']))
                  {
                      $user=$_POST['admuser'];
                      $password=$_POST['admpassword'];
                      #$query=mysqli_query($con,"SELECT * FROM `users` WHERE user='$user' and password='$password' ");
                      #$row=mysqli_num_rows($query);
                      #if($row==1)
                      if($user=='admin@ensam-casa.ma' and $password=='admin')
                      {
                          $_SESSION['database'] = 'database';
                          echo '
                            <script>
                            alert("Admin logged in!");
                            window.location="ADMINUSERS.php";
                            </script>
                            ';
                      }
                      else
                      {
                          echo '
                            <script>
                            alert("Error!");
                            </script>
                            ';
                      }
                  }
                  ?>
		      </div>
		      
		    </div>
		  </div>
	</div>
     
 	</div>
		      
		   
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>
</html>