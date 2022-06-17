<?php  include('config.php'); ?>
<?php  include('includes/registration_login.php'); ?>

<?php 
if (isset($_SESSION['user']['username'])) {
  header("Location:index.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EveryMina</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="static/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="static/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="static/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <a href="/"> 
	<!-- <span class="fa fa-plane-departure"></span>		 -->
	<!-- <img src="assets\img\logo.png" style="width: 100px; height:100%" />  -->
	<br/> <b>EveryMina  </a>
  </div>
  <!-- /.login-logo -->
  <?php
  if(isset($_SESSION['user']['username'])) {
    header('location: '. BASE_URL . '/index.php');	
  }
  else{
    ?>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login.php" method="post">
        <?php include('errors.php'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
			<span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php 

if(isset($_GET['code'])){ 
    $gClient->authenticate($_GET['code']); 
    $_SESSION['token'] = $gClient->getAccessToken(); 
    header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL)); 
} 
 else {
   echo "<a class='btn btn-danger btn-block m-2' href='".$gClient->createAuthUrl()."'>Login with google</a>";
 } 
?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
              	
            <button class="btn btn-primary btn-block"  type="submit" name="ingia">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register as a writer</a>
      </p>

   
    </div>

    
    <!-- /.login-card-body -->
    <?php } ?>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="static/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="static/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="static/js/adminlte.min.js"></script>
</body>
</html>