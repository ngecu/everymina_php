<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>

<!-- Get all admin posts from DB -->
<?php $posts = getAllPosts(); 
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
      <th scope="col">Title</th>
      <th scope="col">Views</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
      	<?php foreach ($posts as $key => $post): ?>
    <tr>
      <th scope="row">	<?php echo ($key + 1) ?></th>
      <td>	<a 	target="_blank" 
								href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>"><? echo $post['title']; ?> </a> </td>
      <td>
          <?php echo  viewPostCount($post['slug']) ?>
      </td>
      <td>
          <?php if ($_SESSION['user']['role'] == "Admin"): ?>
          	<?php if ($post['published'] == true): ?>
          <a class="badge  badge-success" href="posts.php?unpublish=<?php echo $post['id'] ?>">Published</a>
          <?php else: ?>
          			<a class="badge badge-danger"	href="posts.php?publish=<?php echo $post['id'] ?>">Unpublshed</a>
          			<?php endif ?>
      <?php endif ?>
      

          
      </td>
      <td style="display:flex;">
          
      <a class="btn btn-info btn-sm" href="create_post.php?edit-post=<?php echo $post['id'] ?>">
<i class="fas fa-pencil-alt">
</i>
Edit
</a>

<a class="btn btn-danger btn-sm" href="create_post.php?delete-post=<?php echo $post['id'] ?>">
<i class="fas fa-trash">
</i>
Delete
</a>
      </td>
    </tr>
    	<?php endforeach ?>
 
   
  </tbody>
</table>

<!--      <div class="row">-->
          
<!--          	<?php foreach ($posts as $key => $post): ?>-->
<!--    <div class="col-md-4  col-12">-->
<!--        <div class="card mb-3">-->
<!--            <div class="card-body">-->
<!--              <h5 class="card-title">-->
<!--                  								<a 	target="_blank" -->
<!--								href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>">-->
                  								    
<!--									<?php echo ($key + 1). " .".$post['title']; ?>	-->
<!--								</a>-->
<!--              </h5>-->
            
<!--              <p class="card-text"><small class="muted-text">By : <?php echo $post['author']; ?>  -- Views <?php echo  viewPostCount($post['slug']) ?></small></p>-->
<!--              <div class="card-buttons">-->
<!--                <button id="like-btn" class="card-btn" role="button">-->
<!--                  <span id="icon">-->
<!--                    	<?php if ($post['published'] == true): ?>-->
<!--                    	Undo-->
<!--									<a class="fa fa-check btn unpublish" style="padding: 0;"-->
<!--										href="posts.php?unpublish=<?php echo $post['id'] ?>">-->
<!--									</a>-->
<!--								<?php else: ?>-->
<!--								Pub-->
<!--									<a class="fa fa-times btn publish" style="padding: 0;"-->
<!--										href="posts.php?publish=<?php echo $post['id'] ?>">-->
<!--									</a>-->
<!--								<?php endif ?>-->
<!--                  </span>-->
<!--                </button>-->
<!--                <button class=" card-btn">-->
<!--                  <span id="cmt-icon">-->
<!--                      Edit-->
<!--                <a class="fa fa-pencil btn edit" style="padding: 0;"-->
<!--		href="create_post.php?edit-post=<?php echo $post['id'] ?>">-->
<!--								</a>-->
<!--                  </span>-->
<!--                </button>-->
<!--                <button class="card-btn" href="#">-->
<!--                    Del-->
<!--                  <span id="share-btn">	<a  class="fa fa-trash btn delete" style="padding: 0;"-->
<!--									href="create_post.php?delete-post=<?php echo $post['id'] ?>">-->
<!--								</a></span>-->
<!--                </button>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--    </div>-->
<!--	<?php endforeach ?>-->

    
<!--</div>-->

    
</div>
        
	<!--<div class="table-div">-->
			<!-- Display notification message -->
	<!--		<?php include(ROOT_PATH . '/includes/messages.php') ?>-->

	<!--		<?php if (empty($posts)): ?>-->
	<!--			<h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>-->
	<!--		<?php else: ?>-->
	<!--			<table class="table" style="width:100% !important">-->
	<!--					<thead>-->
					
	<!--					<th>Author</th>-->
	<!--					<th>Title</th>-->
	<!--					<th>Views</th>-->
						<!-- Only Admin can publish/unpublish post -->
	<!--					<?php if ($_SESSION['user']['role'] == "Admin"): ?>-->
	<!--						<th><small>Publish</small></th>-->
	<!--					<?php endif ?>-->
	<!--					<th><small>Edit</small></th>-->
	<!--					<th><small>Delete</small></th>-->
	<!--				</thead>-->
	<!--				<tbody>-->
	<!--				<?php foreach ($posts as $key => $post): ?>-->
	<!--					<tr>-->
						
	<!--						<td><?php echo $post['author']; ?></td>-->
	<!--						<td>-->
	<!--							<a 	target="_blank"-->
	<!--							href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>">-->
	<!--								<?php echo $post['title']; ?>	-->
	<!--							</a>-->
	<!--						</td>-->
	<!--						<td><?php echo  viewPostCount($post['slug']) ?></td>-->
							
							<!-- Only Admin can publish/unpublish post -->
	<!--						<?php if ($_SESSION['user']['role'] == "Admin" ): ?>-->
	<!--							<td>-->
	<!--							<?php if ($post['published'] == true): ?>-->
	<!--								<a class="fa fa-check btn unpublish"-->
	<!--									href="posts.php?unpublish=<?php echo $post['id'] ?>">-->
	<!--								</a>-->
	<!--							<?php else: ?>-->
	<!--								<a class="fa fa-times btn publish"-->
	<!--									href="posts.php?publish=<?php echo $post['id'] ?>">-->
	<!--								</a>-->
	<!--							<?php endif ?>-->
	<!--							</td>-->
	<!--						<?php endif ?>-->

	<!--						<td>-->
	<!--							<a class="fa fa-pencil btn edit"-->
	<!--								href="create_post.php?edit-post=<?php echo $post['id'] ?>">-->
	<!--							</a>-->
	<!--						</td>-->
	<!--						<td>-->
	<!--							<a  class="fa fa-trash btn delete" -->
	<!--								href="create_post.php?delete-post=<?php echo $post['id'] ?>">-->
	<!--							</a>-->
	<!--						</td>-->
	<!--					</tr>-->
	<!--				<?php endforeach ?>-->
	<!--				</tbody>-->
	<!--			</table>-->
	<!--		<?php endif ?>-->
	<!--	</div>-->
    </div>
</div>

	

		<!-- Display records from DB-->
	
		<!-- // Display records from DB -->
	</div>
</body>
</html>