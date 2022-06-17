<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); 

	if (!isset($_SESSION['user']['username'])) {
    echo '<script>window.location = "https://everymina.com/login.php";</script>';
} 

?>
<!-- Get all topics from DB -->
<?php $categories = getAllCategories();


?>
	<title>Admin | Manage category</title>
</head>
<body>
	<!-- admin navbar -->
	<?php include(ROOT_PATH . '/includes/navbar.php') ?>
	
	<div class="container content">
		<!-- Left side menu -->
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<!-- Middle form - to create and edit -->
		<div class="action">
			<h1 class="page-title">Create/Edit Categories</h1>
			<form method="post" action="categories.php" >
				<!-- validation errors for the form -->
				<?php include(ROOT_PATH . '/includes/errors.php') ?>
				<!-- if editing topic, the id is required to identify that topic -->
				<?php if ($isEditingCategory === true): ?>
					<input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
				<?php endif ?>
				<input type="text" name="category_name" value="<?php echo $category_name; ?>" placeholder="Category">
				<!-- if editing topic, display the update button instead of create button -->
				<?php if ($isEditingCategory === true): ?> 
					<button type="submit" class="btn" name="update_category">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_category">Save category</button>
				<?php endif ?>
			</form>
		</div>
		<!-- // Middle form - to create and edit -->

		<!-- Display records from DB-->
		<div class="table-div">
			<!-- Display notification message -->
			<?php include(ROOT_PATH . '/includes/messages.php') ?>
			<?php if (empty($categories)): ?>
				<h1>No categories in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>N</th>
						<th>category Name</th>
						<th colspan="2">Action</th>
					</thead>
					<tbody>
					<?php foreach ($categories as $key => $category): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $category['name']; ?></td>
							<td>
								<a class="fa fa-pencil btn edit"
									href="categories.php?edit-category=<?php echo $category['id'] ?>">
								</a>
							</td>
							<td>
								<a class="fa fa-trash btn delete"								
									href="categories.php?delete-category=<?php echo $category['id'] ?>">
								</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>