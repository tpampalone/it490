<!DOCTYPE html PUBLIC>


<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="styles.css">
		<script src="https://kit.fontawesome.com/7cfe348305.js" crossorigin="anonymous"></script>
		<title>Self-Taught Academia</title>
	</head>
<body>
	<nav class="navbar navbar-expand-sm fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#"></a>
				<!-- Login button -->
				<span class="navbar-text">Already have an account? <a href="" data-toggle="modal" data-target="#signinForm">Sign in</a> <i class="fas fa-user-circle"></i></span>
			</div>
		</nav>
		<!-- Pop-up (modal) sign in form METHOD POST-->
    <form class="modal fade" id="signinForm" action="rabbitmq/rabbitmqLogin.php" formmethod="post">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-header text-center">
            <h3 class="modal-title w-100 dark-grey-text font-weight-bold">Login</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">&times;</button>
          </div>


          <div class="modal-body mx-4">
            <!-- Email -->
            <div class="md-form mb-3">
              <input type="email" class="form-control validate" placeholder="Your Email" name="email">
            </div>
            <!-- Password -->
            <div class="md-form mb-3">
              <input type="password" class="form-control validate" placeholder="Your Password" name="password">
            </div>
          </div>

          <div class="modal-footer d-flex justify-content-center">
            <!-- Login button -->
            <button type="submit" class="btn btn-primary" formmethod="post">Login</button>
            <!-- Signup button -->
            <button class="btn btn-outline-secondary" data-dismiss="modal" aria-label="close" data-toggle="modal" data-target="#signupForm">Signup</button>
          </div>
		
		<!-- JS CDN -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



        </div>

      </div>
    </form>
<h1 class="welcome-text"><a href="index.html">Self-Taught Academia</a></h1>
	<div class="split right">
				<div id="carouselOurServices" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
					<li data-target="#carouselOurServices" data-slide-to="0" class="active"></li>
					<li data-target="#carouselOurServices" data-slide-to="1"></li>
					<li data-target="#carouselOurServices" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
					<div class="carousel-item active">
					  <img class="d-block w-100" src="images/services1.png">
					</div>
					<div class="carousel-item">
					  <img class="d-block w-100" src="images/services2.png">
					</div>
					<div class="carousel-item">
					  <img class="d-block w-100" src="images/services3.png">
					</div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselOurServices" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselOurServices" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
			  </div>
			</div>

<div class="split left">
<h2>Parent Forums</h2>
	<div id="menu">
		<a class="item" href="../forum/index.php">Home</a>
		<a class="item" href="../forum/create_topic.php">Create A Topic</a>
		<a class="item" href="../forum/create_cat.php">Create A Category</a>
		<a class="item" href="../forum/category.php">Category List</a>
	
	</div>
	
	<div id="content">
		
