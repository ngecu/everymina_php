<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>

<!-- Get all admin posts from DB -->
<?php $subs = getAllSubscribers(); 
if (!isset($_SESSION['user']['username'])) {
    echo '<script>window.location = "http://everymina.com/login.php";</script>';

} ;


function viewPostCount($ps){
    	global $conn;
    $sql = "SELECT COUNT(*) as count FROM ipdb WHERE post_slug='$ps'";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$count = mysqli_fetch_assoc($result)['count'];

return $count;
};

?>
	<title>Admin | Manage Posts</title>
</head>

<style>
    .menu{
        width: 100% !important;
        padding:0 !important;
    }
    .table-div{
        width:100% !important;
    }
    .table-div table {
    width: 100% !important;
}

.card-img-top {
  border-radius: 12px !important;
}
.card {
  width: 100%;
  margin-top: 5%;
  color: #fff;
  border-radius: 12px !important;
  text-align: left;
  padding: 20px;
}
.card-title {
  font-weight: bolder;
}
.card-text {
  color: white;
}
.muted-text{
  color: #000;
}
.card button {
  /*padding: 8px 12px;*/

  margin-right: 2%;
  border: none;
  border-radius: 6px;
  box-shadow: -2px -2px 3px #ffffff70, 2px 2px 3px #00000070;
}
.card button:hover {
  background-color: #ed642b;
  box-shadow: inset -2px -2px 3px #ffffff70, inset 2px 2px 3px #00000070;
}
.card button:focus, .card button:active {
  outline: none;
  border: none;
}
.card-buttons button:last-child {
  float: right;
  margin-right: 0%;
}

</style>
<body>
	<!-- admin navbar -->
	<?php include(ROOT_PATH . '/includes/navbar.php'); ?>

	<div class="container content">
		<!-- Left side menu -->
	
	<div class="row">
    <div class="col-md-12  col-12">
	<?php include(ROOT_PATH . '/admin/includes/menu.php'); ?>
    </div>
    <div class="col-md-12 col-12">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <!--<th scope="col">Status</th>-->
      <!--<th scope="col"></th>-->
      
    </tr>
  </thead>
  <tbody>
      	<?php foreach ($subs as $key => $sub): ?>
    <tr>
      <th scope="row">	<?php echo ($key + 1) ?></th>
      <td><? echo $sub['name']; ?> </td>
       <td><? echo $sub['email']; ?> </td>

    
    </tr>
    	<?php endforeach ?>
 
   
  </tbody>
</table>

    </div>
</div>

	

		<!-- Display records from DB-->
	
		<!-- // Display records from DB -->
	</div>
</body>
</html>