<?php 

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="profStyle.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="icon" href="https://logosvector.net/wp-content/uploads/2013/04/pontiac-firebird-vector-logo.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<title>Profile</title>
</head>
<body>

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color bg-primary" id="navo">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="profile.php">Friends.com</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="notification.php">Notifiqation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="friends.php">My Friends</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="edit.php">Edit profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="photo.php" id="seephoto">Photos</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="index.php" id="logout">Log Out</a>
      </li>

      <!-- Dropdown -->
<!--       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a id="edit" class="dropdown-item" href="#">Edit profile</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->

    </ul>
     
    <!-- Links -->

    <form class="form-inline fr">
      <div class="md-form my-0">
        <input id="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      </div>
    </form>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
<div class="main-content">



         <div id="result"></div>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="https://www.creative-tim.com/product/argon-dashboard" target="_blank"><img src="https://logosvector.net/wp-content/uploads/2013/04/pontiac-firebird-vector-logo.png" width="100" height="100"></a>
        <!-- Form -->
       <!--  <form   class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto fr">
          <div  class="form-group mb-0"> -->
            <!-- <button id="getFriend" class="btn btn-info">Get Friends</button> -->
            <!-- <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div> -->
              <!-- <input id="search" class="form-control" placeholder="Search" type="text"> -->
              
              <!-- <button id="search" class="btn btn-info">Search</button> -->
            <!-- </div>
 -->          <!-- </div>
        </form> -->
       
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle span_picture">
                  
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold div_anun"> </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://scontent.fevn6-2.fna.fbcdn.net/v/t1.0-9/82571707_2588301081414936_5427464233954574336_n.jpg?_nc_cat=110&_nc_oc=AQlexa05GdtJNCaLqjdKLiw-PXVzuKlEPhSSiwBBJeUV4BWgRj9tkDf57ky5tvg-98I&_nc_ht=scontent.fevn6-2.fna&oh=85bcfb0bff6e0dd5888c5558882de266&oe=5ECB973D); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            
            <p class="text-white mt-0 mb-5 p_anun">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <!-- <button id="edit" class="btn btn-info">Edit profile</button> -->
            <!-- <button id="logout" class="btn btn-info">Logout</button> -->
          </div>
        </div>
      </div>
    </div>



    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">


        <div class="col-xl-4 order-xl-1 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#" class="a_picture">
                    
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <!-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a> -->
                <!-- <a href="#" class="btn btn-sm btn-info float-right">Message</a> -->
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3 class="h3_hihi">

                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
                <hr class="my-4">
                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                <a href="#">Show more</a>
              </div>
            </div>
          </div>
        </div>



 <div class="col-xl-8 order-xl-2" id="posts">
  <div class="card bg-secondary shadow">
     <div class="card-header bg-white border-0">
      <div class="row align-items-center">
        <!-- <div class="col-8">
          <h3 class="mb-0">My account</h3>
        </div>
        <div class="col-4 text-right">
          <a href="#!" class="btn btn-sm btn-primary">Settings</a>
        </div> -->
      </div>
    </div> 
    <!-- <div class="card-body"> -->
     
        <!-- <h6 class="heading-small text-muted mb-4">User information</h6> -->
        <!-- <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Add Photo</label>
                <form action="server.php" method="post" enctype="multipart/form-data">
                  <input type="file" accept="image/*" name="photo" id="input-username" class="form-control form-control-alternative">
                  <button class="btn btn-info" id="addphoto" name="photobtn">+</button>
                </form>
              </div>

            </div>
          </div>
        </div>
      
    </div>
    <br> -->



        <!-- <form class="card-body" action="server.php" method="post" enctype="multipart/form-data"> -->
     
        <!-- <h6 class="heading-small text-muted mb-4">User information</h6> -->
       <!--  <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group focused">
                <label class="form-control-label" for="input-username">Status</label> -->
                <!-- <form action="server.php" method="post" enctype="multipart/form-data"> -->
               <!--    <textarea placeholder="Write status....." name="mind" id="status-mind" class="form-control form-control-alternative"></textarea>
                  <input type="file" accept="image/*" name="photos" id="status-photo" class="form-control form-control-alternative">
                  <button class="btn btn-info" id="addStatus" name="postBtn">+</button> -->
                <!-- </form> -->
              </div>
              
            </div>
          </div>
        </div>
    </form>

        <!-- <div class="card-body">     
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group focused">
                  <div class="post1p">
                      <img src="https://images.pexels.com/photos/744667/pexels-photo-744667.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"height="30"/>
                      <p3>Rani Mukharji </p3><br><br>
                      <img src="https://images.pexels.com/photos/744667/pexels-photo-744667.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" height="411" width="580"/><br><br>
                      
                    <div>
                      <img src="http://localhost/HAM/prof.png"height="30"/>
                      <input type="textarea" placeholder="comment"/>
                    </div>
                  </div> -->




  </div>
</div> 
      </div>
    </div>
  </div>
<input type="hidden" id="my_id" value="<?php print $_GET["id"] ?>">
</body>
  <script src="usersPageScript.js"></script>
  <script src="potoScript.js"></script>   
</html>
