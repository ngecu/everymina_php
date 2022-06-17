<style>
    @media (max-width: 800px) {
        .card-content{
            flex-direction:column !important;
        }
    }
</style>
<div class="menu">
	<div class="card">
		<div class="card-header">
			<h2>Actions</h2>
		</div>
		<div class="card-content d-flex p-2">
			<a href="<?php echo BASE_URL . 'admin/create_post.php' ?>" class="p-2" >Create Posts</a>
			
			<a href="<?php echo BASE_URL . 'admin/posts.php' ?>" class="p-2">Manage Posts</a>
			<?php if ($_SESSION['user']['role'] == "Admin"): ?>
			<a href="<?php echo BASE_URL . 'admin/users.php' ?>" class="p-2">Manage Users</a>
			<!--<a href="<?php echo BASE_URL . 'admin/create_user.php' ?>" class="p-2" >Create User</a>-->
			<a href="<?php echo BASE_URL . 'admin/categories.php' ?>" class="p-2">Manage Categories</a>
			<!--<a href="<?php echo BASE_URL . 'admin/complaints.php' ?>" class="p-2">Manage Complaints</a>-->
            <a href="<?php echo BASE_URL . 'admin/subscribers.php' ?>" class="p-2">Manage Subscribers</a>
			<?php endif ?>
			<!--<a href="<?php echo BASE_URL . 'admin/emails.php' ?>" class="p-2">Manage Emails</a>-->

		</div>
	</div>
</div>