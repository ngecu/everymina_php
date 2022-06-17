<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>

<?php 
$allAuthors = getAllAuthors();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Everymina - Authors</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="static/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="static/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    	<?php include('includes/navbar.php'); ?>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Authors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Authors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
               <?php foreach ($allAuthors as $author): ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Digital Strategist
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $author['realname']; ?></b></h2>
                      <!--<p class="text-muted text-sm"><b>About: </b> <?php echo $author['phone']; ?> </p>-->
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: <?php echo $author['email']; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php echo $author['phone']; ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="static/dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <!--<a href="#" class="btn btn-sm bg-teal">-->
                    <!--  <i class="fas fa-comments"></i>-->
                    <!--</a>-->
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach ?>
          </div>
        </div>
        <!-- /.card-body -->
        <!--<div class="card-footer">-->
        <!--  <nav aria-label="Contacts Page Navigation">-->
        <!--    <ul class="pagination justify-content-center m-0">-->
        <!--      <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
        <!--      <li class="page-item"><a class="page-link" href="#">2</a></li>-->
        <!--      <li class="page-item"><a class="page-link" href="#">3</a></li>-->
        <!--      <li class="page-item"><a class="page-link" href="#">4</a></li>-->
        <!--      <li class="page-item"><a class="page-link" href="#">5</a></li>-->
        <!--      <li class="page-item"><a class="page-link" href="#">6</a></li>-->
        <!--      <li class="page-item"><a class="page-link" href="#">7</a></li>-->
        <!--      <li class="page-item"><a class="page-link" href="#">8</a></li>-->
        <!--    </ul>-->
        <!--  </nav>-->
        <!--</div>-->
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="static/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="static/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="static/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="static/dist/js/demo.js"></script>-->
</body>
</html>