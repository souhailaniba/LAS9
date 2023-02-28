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
<
<nav class="navbar navbar-light  navbar-expand-lg shadow  p-2 mb-2 bg-light  fixed-top">
    <div class="container-fluid">
        <!-- <a href="#" class=" navbar-brand">ENSAM TUTO</a> -->
        <a href="-%20index.php" class=" navbar-brand"><img src="img/logo.png" height="70px" alt="LAS9"></a>
        <button class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navmenu">
            <div class="navbar-toggler-icon" ></div>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav mx-auto ">
                <li class="nav-padding   nav-item"><a href="INDEX.php" class="nav-link ">Home</a></li>
                <li class="nav-padding  active nav-item"><a href="ADMINUSERS.php" class="nav-link active">Users</a></li>
                <li class="nav-padding  nav-item"><a href="ADMINFILES.php" class="nav-link">Files</a></li>


                <li class="nav-padding  nav-item d-none"id="toshowbutton" ><a  class="nav-link  text-nowrap "  href="#">Deconnexion </a></li>


            </ul>
            <a id="tobehiddenbutton"class=" nav-link text-nowrap " href="ADMINLOGOUT.php">Admin log out  </a>
            <!--<a id="tobehiddenbutton" href="offreprof.html"><button class=" btn btn-lg btn-primary rounded ms-auto "  >Get Started<i class="bi bi-arrow-right "></i> </button></a>-->
        </div>
    </div>
</nav>
<section class="padding container" id="section-1">
    <div class="row">
        <div class="col-md-8"><h2>Add a user</h2></div>

    </div>
    <div class="modal-body"   id='registerform'>
        <form method="post">
            <label for="exampleFormControlInput1" class="form-label">First Name</label>
            <input name="fname" type="text" class="form-control"  placeholder="Ex: Souhail">
            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
            <input name="lname" type="text" class="form-control" placeholder="Ex: Admin">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input name="username" type="email" class="form-control" placeholder="name@example.com">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input name="password" class="form-control" type="password" placeholder="Password">
            <label for="exampleFormControlInput1" class="form-label">Repeat Password</label>
            <input name="password2" class="form-control" type="password" placeholder="Password">
            <div class="modal-footer">
                <a href="ADMINUSERS.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Return</button></a>
                <button name="register" type="submit" class="btn btn-primary">Add a user</button>
            </div>
        </form>
        <?php
        include('DATABASE.php'); #connexion avec la base de données
        if(isset($_POST['register']))
        {
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $password2=$_POST['password2'];
            $sql=mysqli_query($con,"INSERT INTO `users`(`fname`,`lname`,`username`,`password`) VALUES('$fname','$lname','$username','$password')");
            if($sql==true && $password === $password2)
            {
                echo '
                            <script>
                            alert("A new user successfully added!");
                            window.location="ADMINUSERS.php";
                            </script>
                          ';
            }
            else
            {
                echo '
                            <script>
                            alert("Error! User not added.");
                            
                            </script>
                          ';
            }

        }
        ?>
    </div>



</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>