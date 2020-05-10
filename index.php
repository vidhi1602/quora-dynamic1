<?php
session_start();
include_once 'connection.php';
$result = mysqli_query($conn,"SELECT * FROM categories");
$record = mysqli_query($conn,"SELECT * FROM categories");

$a = $_GET['id'];
if (isset($a)) {

$inner = mysqli_query($conn,"SELECT post.id, admin.user_name, post.createdat, post.title, post.content FROM post INNER JOIN admin ON post.user_id=admin.id  WHERE category_id=$a");
} else {
$inner = mysqli_query($conn,"SELECT post.id, admin.user_name, post.createdat, post.title, post.content FROM post INNER JOIN admin ON post.user_id=admin.id");      
}
?>
<!DOCTYPE html>
<html>
<head> 
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!-- <script src="https://kit.fontawesome.com/8610fe7368.js" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
   
</head>
<body>
  
			<nav class="navbar navbar-expand-lg navbar-light bg-light nav-1 fixed-top desk-nav">
        <div class="container">
				<div class="col-md-2 col-lg-2">	
  				<a class="navbar-brand ttl" href="#">Quora</a>
  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
				</div>

  				<div class="row">	
  				<form class="form-inline">
      			<div class="col-md-2 col-lg-2">	
      				<img src="assets/img/profile.png" width="40px" height="40px">
              <strong class="u_name text-center"><?php if (isset($_SESSION['username'])) { echo $_SESSION['u_name']; } ?></strong>
      			</div>
            <div class="col-md-4 col-lg-4 pr-0 text-center"> 
              <?php 
              if(isset($_SESSION['username'])) { 
                ?>
               <a href=login.php?logout class="btn btn-primary mt-0">Logout</a>

              <?php 
              } else { 
              ?>
              
              <button class="btn btn-primary mt-0" type="button" data-toggle="modal" data-target="#staticBackdrop">Login</button>
              
              <?php 
              } 
              ?>
             
            </div>
            <div class="col-md-6 col-lg-6 pl-0 text-center"> 
      			 <button class="btn btn-danger" type="button" data-toggle="modal" data-target=<?php if (!isset($_SESSION['username'])) { echo "#staticBackdrop"; } else { echo "#staticBackdrop1"; } ?> >Create Blog</button>
            </div>
    			</form>
  				</div>
           </div>
			</nav>
      






      <!-- mobile responsive navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-nav">
    <div class="container-fluid">

<div class="col-6 img1">
<a class="navbar-brand ttl" href="#">Quora</a>
</div>
<div class="col-6 btn-nav">   
<a href="#" target="_blank" class="btn btn-danger" type="button" data-toggle="modal" data-target="#staticBackdrop">Post</a>
</div>


</div>    
</nav>

        <!--LOGIN Modal -->


<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title ttl" id="staticBackdropLabel">User Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">

        <form method="post" action="login.php">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="pwd" class="form-control" placeholder="Enter password" required>
          </div>
          <div class="text-center">
            <button type="submit" name="login" class="btn btn-danger">Sign In</button>
          </div>
        </form>

      </div>
      
      <div class="modal-footer text-center">
        <a class="l1" type="button" data-toggle="modal" data-target="#signup">Create New Account ?</a>
      </div>
    </div>
  </div>
</div>


<!-- End OF LOGIN MOdal -->


<!--SIGN UP Modal -->


<div class="modal fade" id="signup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title ttl" id="signupLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="post" action="insert.php">
          <div class="form-row">
            <div class="col">
              <label>First Name</label>
              <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="col">
              <label>Last Name</label>
              <input type="text" class="form-control" name="last_name" required>
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col">
              <label>Age</label>
              <input type="number" name="age" value="age" required>
            </div>
            <div class="col text-center">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
              <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
              <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
          </div>
            
          </div>
          <br>
          <div class="form-group">
            <label>User Name</label>
            <input type="text" name="user_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="text-center">
            <button type="submit" name="save" class="btn btn-danger">Sign Up</button>
          </div>
        </form>
        

      </div>
      
      <div class="modal-footer text-center">
        <a class="l1" type="button">Create New Account ?</a>
      </div>
    </div>
  </div>
</div>


<!-- End OF sign up MOdal -->



<!-- end of mobile responsive navbar -->
      <br>    
      <br>
      <br>
      <br>
      <div class="container">
        <div class="row">
        <div class="sidebar-wrapper row" id="nav">
        
                <ul class="sidebar-nav pl-4">
                    <?php include_once "categories.php"; ?>
                    <hr>
                    <li class="text-muted">About - Careers - Terms - Privacy - Acceptable Use - Business</li>
                </ul>
                </div>
 <!-- Tab panes -->      
              
        <div class="col-md-10 col-lg-10 middle ml-auto" id="content">
             


          
                <!-- Cards -->
                <div class="card-1">
                  <?php
                    if (isset($_SESSION['username'])) {
                    
                    while ($info=mysqli_fetch_array($inner)) {
                  ?>
                  <div class="card" style="width: 35rem;">
                    <div class="row">
                    
                    <div class="col text-left">
                      <h5 class="text-uppercase"><?php echo $info['user_name']; ?></h5>
                    </div>
                    <div class="col text-right">
                      <p class="text-muted"><?php echo $info['createdat']; ?></p>
                    </div>

                    </div>

                    <div class="card-body">
                      <h5 class="card-title"><?php echo $info['title']; ?></h5>
                      <p class="card-text"><?php echo $info['content']; ?></p>
                      <a href="#" class="btn btn-primary"><i class="fas fa-user-tag"></i> Follow - 45.3m</a>
                    </div>
                   
                  </div>
                  <br>
                  <?php
                  }
                }
                  ?>

                </div>
                <br>
                <!-- End of cards -->
              </div>
          </div>
          </div> 
     

<!--POST Modal -->


<div class="modal fade" id="staticBackdrop1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center ttl" id="staticBackdropLabel">Create Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="insert.php">
          
          <div class="form-group">

            <label for="exampleFormControlSelect1">Categories</label>
             
            <select class=" form-control" id="exampleFormControlSelect1" name="category_id">
             <?php
              while ($rw = mysqli_fetch_array($record)) {
              ?>
              <option value="<?php echo $rw["id"]; ?>"><?php echo $rw["name"]; ?></option>
              <?php
              }
              ?>
             

            </select>

          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Title</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="title">
  </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
          </div>

          <input type="hidden" name="user_id" value="<?php echo $rw["id"]; ?>">
           <div class="text-center">
            <button type="submit" name="save" class="btn btn-danger">Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- END OF POST MODAL -->


      
      
	</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>