<?php  include('../config.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/head_section.php'); 
	
	if (!isset($_SESSION['user']['username'])) {
    echo '<script>window.location = "http://everymina.com/login.php";</script>';

} 
	?>
	<title>Admin | Dashboard</title>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="<?php echo BASE_URL .'admin/dashboard.php' ?>">
				<h1>EveryMina - Admin</h1>
			</a>
		</div>
		<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp; 
				<a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">logout</a>
			</div>
		<?php endif ?>
	</div>
	<div class="container dashboard">
		<h1>Welcome</h1>
		<div class="stats">
			<a href="users.php" class="first">
				<span>43</span> <br>
				<span>registered users</span>
			</a>
			<a href="posts.php">
				<span>43</span> <br>
				<span>Published posts</span>
			</a>
			<a>
				<span>43</span> <br>
				<span>Published comments</span>
			</a>
		</div>
		<br><br><br>
		<div class="buttons">
			<a href="create_post.php">Create Posts</a>
			<a href="posts.php">Manage Posts</a>
			<?php if ($_SESSION['user']['role'] == "Admin"): ?>
			<a href="users.php">Manage Users</a>
			<a href="categories.php">Manage Categories</a>
			<a href="complaints.php">Manage Complaints</a>

			<?php endif ?>
			<a href="emails.php">Manage Emails</a>
		</div>
	</div>
</body>
</html>
