<?php

include('database.php');

                  if(isset($_POST['login']))
                  {
                      $user=$_POST['user'];
                      $password=$_POST['password'];
                      $query=mysqli_query($con,"SELECT * FROM `users` WHERE username='$user' and password='$password' ");
                      $row=mysqli_num_rows($query);
                      if($row==1) {
                          echo '
                            <script>
                            alert("Logged in.");
                           
                            </script>
                            ';

                      session_start();
                     $_SESSION['ID']  = $query->fetch_object()->sid;
                     echo "brrrrrrrr".$_SESSION['ID'];
                    header('Location: EDITPROFILE.php');
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
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>

	<title>LAS9 arts and crafts</title>
</head>
<body>
	<nav class="navbar navbar-light  navbar-expand-lg shadow  p-2 mb-2 bg-light  fixed-top">
		<div class="container-fluid">
					<!-- <a href="#" class=" navbar-brand">ENSAM TUTO</a> -->
					<a href="-%20index.php" class=" navbar-brand"><img src="img/logo.png" height="70px" alt="LAS9"></a>
					<button class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navmenu">
						<div class="navbar-toggler-icon" ></div>
					</button>
					<div class="collapse navbar-collapse" id="navmenu">
						<ul class="navbar-nav mx-auto ">
							<li class="nav-padding  active nav-item"><a href="" class="nav-link active">Home</a></li>
							<!--<li class="nav-padding  nav-item"><a href="offreprof.html" class="nav-link">For students</a></li>
							<li class="nav-padding  nav-item"><a href="offreetudient.html" class="nav-link">For teachers</a></li>-->
							<li class="nav-padding  nav-item"><a href="#faq-title" class="nav-link">FAQ</a></li>
							<li class="nav-padding  nav-item"><a href="#aboutus" class="nav-link">About us</a></li>
							
							<li class="nav-padding  nav-item d-none" id="toshowbutton"><a class="nav-link btn-link text-nowrap " data-bs-toggle="modal" data-bs-target="#registerModal" href="#">Get Started  <i class="bi bi-arrow-right "></i> </button></a></li>

						
						</ul>
						<a id="tobehiddenbutton"><button class=" btn  rounded  text-nowrap "id="signupbtn" data-bs-toggle="modal" data-bs-target="#registerModal" href="#">Get Started  <i class="bi bi-arrow-right "></i> </button></a>
						<!--<a id="tobehiddenbutton" href="offreprof.html"><button class=" btn btn-lg btn-primary rounded ms-auto "  >Get Started<i class="bi bi-arrow-right "></i> </button></a>-->
					</div>		
		</div>
	</nav>
	<!--MODAL-->
	<div class="modal " tabindex="-1" id="registerModal">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		      
		      	<button type="button" id="regfrommodal" onclick='toggleForms("Register")'class="registerformactive"  aria-label="Close">Register</button>
		      	<button type="button" id="loginfrommodal" onclick='toggleForms("Login")'   class="registerformdisabled"  aria-label="Close">Login</button>
		        <!-- <h5 class="modal-title">Registration Form</h5> -->
		      
		      </div>
		      <div class="modal-body"   id='registerform'>
		        <form method="post">
		        	<label for="exampleFormControlInput1" class="form-label">First Name</label>
  					<input name="fname" type="text" class="form-control"  placeholder="Ex:Salah">
  					<label for="exampleFormControlInput1" class="form-label">Last Name</label>
  					<input name="lname" type="text" class="form-control" placeholder="Ex:Aniba">
  					<label for="exampleFormControlInput1" class="form-label">Email address</label>
  					<input name="user" type="email" class="form-control" placeholder="name@example.com">
  					<label for="exampleFormControlInput1" class="form-label">Password</label>
  					<input name="password" class="form-control" type="password" placeholder="Password">
  					<label for="exampleFormControlInput1" class="form-label">Repeat Password</label>
  					<input name="password2" class="form-control" type="password" placeholder="Password">
  					<div class="modal-footer">
		       			 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		     			 <button name="register" type="submit" class="btn btn-primary">Register</button>
		 	     </div>
		        </form>
                  <?php
                   #connexion avec la base de données
                  if(isset($_POST['register']))
                  {
                      $fname=$_POST['fname'];
                      $lname=$_POST['lname'];
                      $user=$_POST['user'];
                      $password=$_POST['password'];
                      $password2=$_POST['password2'];
                      $sql=mysqli_query($con,"INSERT INTO `users`(`fname`,`lname`,`username`,`password`) VALUES('$fname','$lname','$user','$password')");
                      if($sql==true && $password === $password2)
                      {
                          echo '
                            <script>
                            alert("Successfully registered!");
                            
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
		      <div class="modal-body"   id='loginform'>
		        <form method="post">
		        	<label for="exampleFormControlInput1" class="form-label">Email</label>
  					<input name="user" type="email" class="form-control"  placeholder="name@example.com">
  					
  					<label for="exampleFormControlInput1" class="form-label">Password</label>
  					<input name="password" class="form-control" type="password" placeholder="Password">
  					<div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					        <button name="login" type="submit" class="btn btn-primary">Log in</button>
		      </div>
		        </form>
                 
		      </div>
		      
		    </div>
		  </div>
	</div>

	<section id ="main" class="padding">
		
				<div id="carousel" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-indicators">
						    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" ></button>
						    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" ></button>
						   
					</div>
					<div class="carousel-inner">
					    <div class="carousel-item active">
					    	<img class="img-fluid" id="main-image" src="img/banner.jpg">
					    	 <div class=" text-center d-block description">
					    	 		<h1 class=" display-1">  Education is soul crafting. </h1>
									<p class="lead">    Take ENSAM's LAS9 and ace your exams.  </p> 
									<div class="row">
										<div class="col-6 mx-auto ">
											<a href="#second-section" ><button class=" btn  rounded  text-nowrap "id="signupbtn"  >Learn More <i class="fas fa-angle-double-down"></i> </button></a>
											
										</div>
										
									</div>
								</div>
									
					    </div>
				
					    <div class="carousel-item">
					    	<img class="img-fluid" id="main-image" src="img/teacher.jpg">
					    	  <div class=" text-center d-block description">
					    	 		<h1 class=" display-2"> When one teaches, two learn.  </h1>
									<p class="lead"> Help other students  understand better their subjects and get paid to do it . </p> 
									<div class="row">
										<div class="col-6 mx-auto ">
											<a href="#fourth-section" ><button class=" btn  rounded  text-nowrap "id="signupbtn"  >Learn More <i class="fas fa-angle-double-down"></i> </button></a>
											
										</div>
										
									</div>
								</div>
					    
					</div> 
					
				</div>
				
				<!-- </div>-->
				 
			</div>
		
	</section>
	
	
	<section id="second-section" class="padding container-fluid">
		
		<div class="row">
			
			<div class="col-lg-5 col-sm-12">
				<h1  class="section-title">What will you gain from LAS9 as a student?  </h1>
				<hr>
				<dl id="student-list">
					
					<dt class="d-flex align-items-center"><i class="far fa-check-circle"></i> Flexible learning </dt>
					<dd>
						In this platform, students can choose how and when they want to take a dose of the best LAS9 in ENSAM. 
					</dd>

					<dt class="d-flex align-items-center"><i class="far fa-check-circle"></i>  Pressure free environment :  </dt>
					<dd>
						Students can take their time until they feel that they understand the subject completely. 
					</dd>
					<dt class="d-flex align-items-center"><i class="far fa-check-circle"></i> Freedom from worry : </dt>
					<dd>
						Las9 can help ENSAMians to feel more secure in their grasp of 
the material, with all the offered courses. 
					</dd>
					
					<!--<p>
						<i class="fas fa-chevron-circle-right"></i>All that will help the ENSAMians pave the way for improved 
self-esteem and better academic results in the long run. 
				</p>-->
			</div>

			<div class="col-lg-7 col-sm-12">
				<img class="img-fluid" src="img/team.jpg">
				
			</div>
		
		</div>
	</section>

	<section id="third-section" class="container padding mb-3">
		<h1 class="section-title "> Find courses according to your needs  </h1>
		<hr class="mb-5">
	    <div id="carousel2" class="carousel slide d-lg-block d-none " data-bs-ride="carousel">
				<div class="carousel-inner">
					    <div class="carousel-item active">
					    	<div class="row">
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="card" >
						  					<img src="img/api.jpeg" class="card-img-top" alt="...">					
											    <h5 class="card-title">API</h5>	
										</div>
									</div>
									<div class="col-lg-3 col-md-6  ">
										<div class="card" >
						  					<img src="img/iagi.jpeg" class="card-img-top" alt="...">
											<h5 class="card-title">IAGI</h5>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 ">
										<div class="card" >
						  					<img src="img/GM.jpeg" class="card-img-top" alt="...">
											<h5 class="card-title">GM</h5>
										</div>
										
									</div>
									<div class="col-lg-3 col-md-6 d-none d-md-flex">
										<div class="card" >
						  					<img src="img/msei.jpeg" class="card-img-top" alt="...">
											
											<h5 class="card-title">MSEI</h5>
											    
											
										</div>
									</div>
							</div>	
					    </div>

					    <div class="carousel-item">
					    	<div class="row">
									<div class="col-lg-3 col-md-6 ">
										<div class="card" >
						  					<img src="img/gem.jpeg" class="card-img-top" alt="...">
										
											<h5 class="card-title">GEM  </h5>
											    
											    
											
										</div>
									</div>
									<div class="col-lg-3 col-md-6 ">
										<div class="card" >
						  					<img src="img/gi.jpeg" class="card-img-top" alt="...">
											
											<h5 class="card-title">GI</h5>
											 
										</div>
									</div>
									
									
							</div>	
					    </div>
					    
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				</button>
		</div>
		<div id="carousel2-md" class="d-lg-none carousel slide d-md-block d-none " data-bs-ride="carousel">
				<div class="carousel-inner">
					    <div class="carousel-item active">
					    	<div class="row">
									<div class="col-lg-3 col-md-6 col-sm-12">
										<div class="card" >
						  					<img src="img/api.jpeg" class="card-img-top" alt="...">					
											    <h5 class="card-title">API</h5>	
										</div>
									</div>
									<div class="col-lg-3 col-md-6  ">
										<div class="card" >
						  					<img src="img/iagi.jpeg" class="card-img-top" alt="...">
											<h5 class="card-title">IAGI</h5>
										</div>
									</div>
									
							</div>	
					    </div>
					
					
						<div class="carousel-item ">
					    	<div class="row">
								   	<div class="col-lg-3 col-md-6 ">
													<div class="card" >
									  					<img src="img/GM.jpeg" class="card-img-top" alt="...">
														<h5 class="card-title">GM</h5>
													</div>
													
									</div>
									<div class="col-lg-3 col-md-6 d-none d-md-flex">
													<div class="card" >
									  					<img src="img/msei.jpeg" class="card-img-top" alt="...">
														
														<h5 class="card-title">MSEI</h5>
														    
														
													</div>
									</div>

							</div>
						</div>
					

					    <div class="carousel-item">
					    	<div class="row">
									<div class="col-lg-3 col-md-6 ">
										<div class="card" >
						  					<img src="img/gem.jpeg" class="card-img-top" alt="...">
										
											<h5 class="card-title">GEM  </h5>
											    
											    
											
										</div>
									</div>
									<div class="col-lg-3 col-md-6 ">
										<div class="card" >
						  					<img src="img/gi.jpeg" class="card-img-top" alt="...">
											
											<h5 class="card-title">GI</h5>
											 
										</div>
									</div>
									
									
							</div>	
					    </div>
					</div>
					    
				
				<button class="carousel-control-prev" type="button" data-bs-target="#carousel2-md" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carousel2-md" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				</button>
		</div>
		<div id="carousel2-sm" class="carousel slide d-md-none d-sm-block  " data-bs-ride="carousel">
				<div class="carousel-inner">
					    <div class="carousel-item active">
					    	<div class="card" >
						  			<img src="img/api.jpeg" class="card-img-top" alt="...">		<h5 class="card-title">API</h5>	
							</div>
						</div>
						<div class="carousel-item">
										<div class="card" >
						  					<img src="img/iagi.jpeg" class="card-img-top" alt="...">
											<h5 class="card-title">IAGI</h5>
										</div>
						</div>

						<div class="carousel-item">
										<div class="card" >
						  					<img src="img/GM.jpeg" class="card-img-top" alt="...">
											<h5 class="card-title">GM</h5>
										</div>
										
						</div>
						<div class="carousel-item">
								<div class="card" >
				  					<img src="img/msei.jpeg" class="card-img-top" alt="...">
									<h5 class="card-title">MSEI</h5>
											    
											
								</div>
						</div>
							

					    <div class="carousel-item">
					    	<div class="card" >
						  		<img src="img/gem.jpeg" class="card-img-top" alt="...">
								<h5 class="card-title">GEM  </h5>
							</div>
						</div>
						<div class="carousel-item">
							<div class="card" >
						  		<img src="img/gi.jpeg" class="card-img-top" alt="...">
											
								<h5 class="card-title">GI</h5>
											 
							</div>
						</div>
									
									
					</div>	
				
					    
			
				<button class="carousel-control-prev" type="button" data-bs-target="#carousel2-sm" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carousel2-sm" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				</button>
		</div>
		
		
	<!--SECTION4-->	
	</section>

	<section id="fourth-section" class="padding container-fluid">
		<h1  class="section-title ">What will you gain from LAS9 as a teacher?  </h1>
		<hr>
		<div class="row">
			<!-- <div class="col-lg-7 col-sm-12">
				<img class="img-fluid" src="img/prof2.jpg">
				
			</div> -->
			<div class=" col-sm-6">
					<h3 class="d-flex align-items-center justify-content-center"><i class="fas fa-money-bill-alt"></i> Earn Money </h3>
					<p class="lead">
						Las9 can help old ENSAMians (the substitute teachers in LAS9) earning money by 
providing an environement were they can pass down their knowledge to the new 
generation, flexibly at a reasonable price in return of their efforts.  
					</p>
			</div>
			<div class=" col-sm-6">
					<h3 class="d-flex align-items-center justify-content-center"><i class="fas fa-people-carry"></i> Help others </h3>
					<p class="lead">
						Summaries and LAS9s of the school subjects he is studying in his major, explaining to him 
the details of courses, seen from the perspective of a student (which is not doable by all teachers) may not change the whole world, but it could change the world for that one 
helped person.
					</p>
			</div>
			
					
			</div>
			<div class="row">
				<div class="col-sm-6 mx-sm-auto">
					<h3 class="d-flex align-items-center justify-content-center"><i class="fab fa-connectdevelop"></i> New Experience </h3>
					<p class="lead">
						Some engineering students might find themselves attracted to teaching at some point.. 
that’s why the LAS9 platform tries to provide to them a very appropriate and friendly 
environment where they can actually practise this second obsession.
					</p>
				</div>
			</div>

			
		
		</div>
	</section>
	<!--FAQ-->
	<section  id="faq-title" class="  padding mb-3">
		<div class="container-fluid">
			<h1 id=" ">Frequently asked questions</h1>
			<hr>
			<div class="accordion " id="accordionFlushExample">
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingOne">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
Why Use a new pateform and not existing ones like a Facebook group?
				      </button>
				    </h2>
				    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">Using our plateform has a lot more features to offer such as filtering by type</div>
				    </div>
				  </div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingTwo">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
				        Does the plateform benefit its owners in any way?
				      </button>
				    </h2>
				    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">We, the team of LAS9, get 20% of the price of given courses through our platform as a low, but significant price in regards of our efforts and so as to offer more and more tools in the future to improve the quality of our content.</div>
				    </div>
				  </div>
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="flush-headingThree">
				      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
				       Will the platform be working even in summer? Or does it stop as soon as college classes do..!
				      </button>
				    </h2>
				    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
				      <div class="accordion-body">Surprisingly, our platform is working non-stop even in Summer time when there is no college classes. Which is a great way for students to get those tough classes out of the way, get ahead, and save money while still having the flexibility and time to do all the fun summer activities! So don’t be afraid to utilize your time off to get ahead!</div>
				    </div>
				  </div>
			</div>
		</div>
	</section>
	<!--Footer-->
	<footer class="padding" id="aboutus">
		<div class="container ">
			<img  src="img/logo.png" height="140px" alt="LAS9">
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
				<div class="col-7">LASE9 2021</div>
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