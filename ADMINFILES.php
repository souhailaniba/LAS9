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
<?php
include("ADMINNAVBAR.html");
?>
<!--
<nav class="navbar navbar-light  navbar-expand-lg shadow  p-2 mb-2 bg-light  fixed-top">
    <div class="container-fluid">
                 <a href="#" class=" navbar-brand">ENSAM TUTO</a>
                <a href="-%20index.php" class=" navbar-brand"><img src="img/logo.png" height="70px" alt="LAS9"></a>
                <button class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <div class="navbar-toggler-icon" ></div>
                </button>
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-padding   nav-item"><a href="-%20index.php" class="nav-link ">Home</a></li>
                        <li class="nav-padding   nav-item"><a href="-%20admin.php" class="nav-link ">Users</a></li>
                        <li class="nav-padding  nav-item active"><a href="-%20adminfiles.php" class="nav-link active">Files</a></li>



                        <li class="nav-padding  nav-item d-none"id="toshowbutton" ><a  class="nav-link  text-nowrap "  href="#">Deconnexion </a></li>


                    </ul>
                    <a id="tobehiddenbutton"class=" nav-link text-nowrap " href="#">Deconnexion  </a>
                    <a id="tobehiddenbutton" href="offreprof.html"><button class=" btn btn-lg btn-primary rounded ms-auto "  >Get Started<i class="bi bi-arrow-right "></i> </button></a>
					</div>		
		</div>
	</nav>
	-->
	<section class="padding container" id="section-1">
		<div class="row">
			<div class="col-md-8"><h2>Files</h2></div>
			<!--<div class="col-md-4"><a id=""><button class=" btn  rounded  text-nowrap "id="addresume"  href="addresume.html">Add File  <i class="bi bi-plus "></i> </button></a></div> -->
		</div>
        <?php
        include('database.php'); #connexion avec la base de données

        # function to connect & execute the query
        function filterTab($query)
        {
            $con2=mysqli_connect("localhost","root","","example");
            $filter_result=mysqli_query($con2,$query);
            return $filter_result;
        }

        $query="SELECT * FROM `files`";
        $search_result=filterTab($query);

        ?>
		
<table class="table table-hover">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title </th>
      <th scope="col">Uploaded By</th>
      <th scope="col">Type</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
    <?php while($row = mysqli_fetch_array($search_result)):?>
  <tbody>
    <tr>
        <form method="GET" action="DELETEAFILE.php">
      <th scope="row"><?php  echo $row['fid']; ?></th>
      <td><?php  echo $row['titre']; ?></td>
      <td>
          <?php
          $id=$row['pid'];
          $sql=mysqli_query($con,"SELECT * FROM users WHERE sid='$id'");
          $result=mysqli_fetch_array($sql);
          echo $result['fname'] . ' ' . $result['lname'];
          ?>
      </td>
      <td><?php  echo $row['type']; ?></td>
            <td><a href="DELETEAFILE.php?id=<?php echo $row['fid']; ?>"><i name="deletebtn" class="bi bi-trash-fill"></i></a>
              <!--<a href=""><i class="bi bi-pencil-square"></i></a></td>-->
      </form>


    </tr>
   
  </tbody>
    <?php endwhile; ?>
</table>
  
 
		  
		</section>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>
</html>