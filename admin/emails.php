<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php 
	// Get all admin users from DB
	$admins = getAdminUsers();
	$emails = getEmails();

	$roles = ['Admin', 'Author'];				
?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); 

if (!isset($_SESSION['user']['username'])) {
    echo '<script>window.location = "http://everymina.com/login.php";</script>';

} 
?>
	<title>Admin | Manage users</title>
</head>
<body>
	<!-- admin navbar -->
	<?php include(ROOT_PATH . '/includes/navbar.php') ?>
	
	<div class="container content">
		<!-- Left side menu -->
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<!-- Middle form - to create and edit -->
		<div class="action">
			<h1 class="page-title">Send Email</h1>
			<form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/emails.php'; ?>" >
				<!-- validation errors for the form -->
				<?php include(ROOT_PATH . '/includes/errors.php') ?>

				<!-- if editing post, the id is required to identify that post -->
				
					<input type="hidden" name="email_id" value="<?php echo $email_id; ?>">
					<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
					<label for="">To</label>
					<select  class="form-select"  name="recepient">
                        <?php foreach ($admins as $user): ?>
                            
      <option value="<?php echo $user['username']; ?>"><?php echo $user['username']; ?></option>
      <?php endforeach ?>
                       
                          
                        </select>
				<!-- <input type="text" name="recepient"  placeholder="To .."> -->
				<input type="text" name="subject"  placeholder="Subject ..">
				
				<textarea name="body" id="body" cols="35" rows="10"></textarea>
				<input type="password" name="password"  placeholder="Email Password ..">
	
					<button type="submit" class="btn" name="update_post">Send</button>
			</form>
		</div>
		<!-- // Middle form - to create and edit -->

		<!-- Display records from DB-->
		<div class="table-div">
			<!-- Display notification message -->
			<?php include(ROOT_PATH . '/includes/messages.php') ?>
			<?php if (empty($categories)): ?>
				<h1>No Emails in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>N</th>
						<th>Subject</th>
						<th>From</th>
						<th>To</th>
						<th>Time</th>
						<th colspan="2">Action</th>
					</thead>
					<tbody>
					<?php foreach ($emails as $key => $email): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $email['subject']; ?></td>
							<td><?php echo $email['sender']; ?></td>
							<td><?php echo $email['receipent']; ?></td>
							<td><?php echo $email['sent_time']; ?></td>

							<td>
								<a class="fa fa-pencil btn edit"
									href="emails.php?edit-email=<?php echo $email['id'] ?>">
								</a>
							</td>
							<td>
								<a class="fa fa-trash btn delete"								
									href="emails.php?delete-email=<?php echo $email['id'] ?>">
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
<script>
	CKEDITOR.replace('body');
</script>
</html>
