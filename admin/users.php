<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php 
	// Get all admin users from DB
	$admins = getAdminUsers();
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
    
    <style>
        
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
	<!-- admin navbar -->

		<?php include(ROOT_PATH . '/includes/navbar.php') ?>
		
	<div class="container content">
		<!-- Left side menu -->
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>
		<!-- Middle form - to create and edit  -->
		
		
		<div class="row">
<!--    <div class="col-md-12 col-12">-->
<!--	<div class="action">-->
<!--			<h1 class="page-title">Create/Edit Admin User</h1>-->

<!--			<form method="post" action="<?php echo BASE_URL . 'admin/users.php'; ?>" >-->

				<!-- validation errors for the form -->
<!--				<?php include(ROOT_PATH . '/includes/errors.php') ?>-->

				<!-- if editing user, the id is required to identify that user -->
<!--				<?php if ($isEditingUser === true): ?>-->
<!--					<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">-->
<!--				<?php endif ?>-->


<!--      <div class="input-group mb-3">-->
<!--      <div class="form-group text-center" >-->
            
<!--            <input type="file" name="profileImage"  id="profileImage" value="<?php echo $profileImage; ?>" class="form-control" >-->
<!--          </div>-->
<!--</div>-->

<!--				<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">-->
				
<!--                <div class="input-group mb-3">-->
<!--          <input type="text" class="form-control" placeholder="Real names as per ID or passport..." value="<?php echo $fullname; ?>" name="fullname" >-->
<!--          <div class="input-group-append">-->
<!--            <div class="input-group-text">-->
<!--              <span class="fas fa-user"></span>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->

<!--                <input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">-->
				
<!--                <div class="form-group">-->
<!--                    <label for="exampleInputFile">Sample of an article</label>-->
<!--                    <div class="input-group">-->
<!--                        	<?php if ($isEditingUser === true): ?>-->
<!--				<img src="" />-->
<!--				<?php endif ?>-->
				
<!--                      <div class="custom-file">-->
<!--                        <input type="file" class="custom-file-input" id="exampleInputFile" value="<?php echo $articlesample ?>" name="articlesample">-->
                     
<!--                      </div>-->
                      
<!--                    </div>-->
<!--                  </div>-->

<!--                  <div class="form-group">-->
<!--                  <label>Academic Background</label>-->
<!--                  <select class="form-control select2" style="width: 100%;" value="<?php echo $academicBackground ?>" name="academicBackground">-->
<!--                    <option selected="selected">None</option>-->
<!--                    <option>College</option>-->
<!--                    <option>Degree</option>-->
<!--                    <option>Masters</option>-->
<!--                    <option>PHD</option>-->
                   
<!--                  </select>-->
<!--                </div>-->


               
<!--                          <input type="file" name="idphoto" value="<?php echo $idphoto ?>" id="profileIage">-->
                      
            


             
<!--          <input type="number"  placeholder="ID Number .." value="<?php echo $IDNo ?>" name="IDNo">-->
          


<!--        <div class="form-group">-->
<!--                  <label>Payment Methods</label>-->
<!--                  <select class="form-control select2" style="width: 100%;" value="<?php echo $paymentmethod ?>" name="paymentmethod">-->
<!--                    <option selected="selected">None</option>-->
<!--                    <option>Mpesa</option>-->
<!--                    <option>Bank</option>       -->
<!--                  </select>-->
<!--                </div>-->


               
<!--          <input type="number"  placeholder="Active Phone Number ..." name="phone" value="<?php echo $phone ?>">-->
         

<!--                <input type="password" name="password" placeholder="Password">-->
<!--				<input type="password" name="passwordConfirmation" placeholder="Password confirmation">-->
<!--				<select name="role" value="<?php echo $role ?>">-->
<!--					<option  selected disabled>Assign role</option>-->
<!--					<?php foreach ($roles as $key => $role): ?>-->
<!--						<option value="<?php echo $role; ?>"><?php echo $role; ?></option>-->
<!--					<?php endforeach ?>-->
<!--				</select>-->

<!--                <select value="<?php echo $approval ?>" name="approval">-->
<!--					<option  disabled>Approve author</option>-->
<!--						<option value="Yes">yes</option>-->
<!--						<option value="No">No</option>-->
<!--				</select>-->

				<!-- if editing user, display the update button instead of create button -->
<!--				<?php if ($isEditingUser === true): ?> -->
<!--					<button type="submit" class="btn" name="update_admin">UPDATE</button>-->
<!--				<?php else: ?>-->
<!--					<button type="submit" class="btn" name="create_admin">Save User</button>-->
<!--				<?php endif ?>-->
<!--			</form>-->
<!--		</div>-->
		<!-- // Middle form - to create and edit -->
<!--    </div>-->

    <div class="col-md-12  col-12">
        
 <!--       <div class="row">-->
 <!--           <?php foreach ($admins as $key => $admin): ?>-->
 <!--   <div class="col-md-4  col-12">-->
 <!--       <div class="card mb-3">-->
 <!--           <div class="card-body">-->
 <!--             <h5 class="card-title">-->
                  			
                  								    
 <!--                 								    	<?php echo ($key + 1). " .". $admin['username']; ?>, &nbsp;-->
	<!--							<?php echo $admin['email']; ?> ,-->
	<!--							<?php echo $admin['phone']; ?>	-->
                  								    
								
	<!--							</a>-->
 <!--             </h5>-->
            
 <!--             <p class="card-text"><small class="muted-text"><?php echo $admin['role']; ?></small></p>-->
 <!--             <div class="card-buttons">-->
 <!--                   <button id="like-btn" class="card-btn" role="button">-->
 <!--                 <span id="icon">-->
 <!--                   	<a 	href="author.php">-->
 <!--                   	    View-->
	<!--								</a>-->
 <!--                 </span>-->
 <!--               </button>-->
                
 <!--               <button id="like-btn" class="card-btn" role="button">-->
 <!--                 <span id="icon">-->
 <!--                   		<?php if ($admin['approved'] == true): ?>-->
	<!--								<a class="fa fa-check btn unpublish"-->
	<!--									href="users.php?disapprove=<?php echo $admin['id'] ?>">-->
	<!--								</a>-->
	<!--							<?php else: ?>-->
	<!--								<a class="fa fa-times btn publish"-->
	<!--									href="users.php?approve=<?php echo $admin['id'] ?>">-->
	<!--								</a>-->
	<!--							<?php endif ?>-->
 <!--                 </span>-->
 <!--               </button>-->
 <!--               <button class=" card-btn">-->
 <!--                 <span id="cmt-icon">-->
 <!--                     Edit-->
 <!--             <a class="fa fa-pencil btn edit"-->
	<!--								href="users.php?edit-admin=<?php echo $admin['id'] ?>">-->
	<!--							</a>-->
	<!--							</a>-->
 <!--                 </span>-->
 <!--               </button>-->
 <!--               <button class="card-btn" href="#">-->
 <!--                   Del-->
 <!--                 <span id="share-btn">	<a class="fa fa-trash btn delete" -->
	<!--							    href="users.php?delete-admin=<?php echo $admin['id'] ?>">-->
	<!--							</a></span>-->
 <!--               </button>-->
 <!--             </div>-->
 <!--           </div>-->
 <!--         </div>-->
 <!--   </div>-->
	<!--<?php endforeach ?>-->
 <!--       </div>-->
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      	<?php foreach ($admins as $key => $admin): ?>
    <tr>
      <th scope="row">	<?php echo ($key + 1) ?></th>
      <td><? echo $admin['realname']; ?> </td>
 
        <td class="float-right">
           <div class="card-buttons">
               <a class="btn btn-primary btn-sm" href="<?php echo BASE_URL . 'single_user.php?author=' . $admin['id'] ?>">
<i class="fas fa-folder">
</i>
View
</a>

<a class="btn btn-info btn-sm" href="<?php echo BASE_URL . 'single_user.php?edit-admin='. $admin['id'] ?>">
<i class="fas fa-pencil-alt">
</i>
Edit
</a>

<a class="btn btn-danger btn-sm" href="users.php?delete-admin=<?php echo $admin['id'] ?>">
<i class="fas fa-trash">
</i>
Delete
</a>
	<?php if ($admin['approved'] == true): ?>
<a href="users.php?disapprove=<?php echo $admin['id'] ?>" class="btn btn-warning btn-sm">
    	<i class="fa-solid fa-xmark"></i>
    	</a>
    	
    	<?php else: ?>
    	
			<a href="users.php?disapprove=<?php echo $admin['id'] ?>" class="btn btn-warning btn-sm">
			    	<i class="fa-solid fa-check"></i>
    	<!--<i class="fa-solid fa-xmark"></i>-->
    	</a>
    	
    		<?php endif ?>
  
         <!--           <button id="like-btn " class="card-btn" role="button">-->
         <!--         <span id="icon">-->
         <!--           	<a 	href="author.php">-->
         <!--           	    View-->
									<!--</a>-->
         <!--         </span>-->
         <!--       </button>-->
                
        <!--        <button id="like-btn" class="card-btn" role="button">-->
        <!--          <span id="icon">-->
        <!--            		<?php if ($admin['approved'] == true): ?>-->
								<!--	<a class="fa fa-check btn unpublish"-->
								<!--		href="users.php?disapprove=<?php echo $admin['id'] ?>">-->
								<!--	</a>-->
								<!--<?php else: ?>-->
								<!--	<a class="fa fa-times btn publish"-->
								<!--		href="users.php?approve=<?php echo $admin['id'] ?>">-->
								<!--	</a>-->
								<!--<?php endif ?>-->
        <!--          </span>-->
        <!--        </button>-->
        <!--        <button class=" card-btn">-->
        <!--          <span id="cmt-icon">-->
        <!--              Edit-->
        <!--      <a class="fa fa-pencil btn edit"-->
								<!--	href="users.php?edit-admin=<?php echo $admin['id'] ?>">-->
								<!--</a>-->
								<!--</a>-->
        <!--          </span>-->
        <!--        </button>-->
        <!--        <button class="card-btn" href="#">-->
        <!--            Del-->
        <!--          <span id="share-btn">	<a class="fa fa-trash btn delete" -->
								<!--    href="users.php?delete-admin=<?php echo $admin['id'] ?>">-->
								<!--</a></span>-->
        <!--        </button>-->
              </div>
      </td>
    </tr>
    	<?php endforeach ?>
 
   
  </tbody>
</table>
      
    </div>
    
</div>

	

		<!-- Display records from DB-->
		<!--<div class="table-div">-->
			<!-- Display notification message -->
		<!--	<?php include(ROOT_PATH . '/includes/messages.php') ?>-->

		<!--	<?php if (empty($admins)): ?>-->
		<!--		<h1>No admins in the database.</h1>-->
		<!--	<?php else: ?>-->
		<!--		<table class="table">-->
		<!--			<thead>-->
		<!--				<th>N</th>-->
		<!--				<th>Admin</th>-->
		<!--				<th>Role</th>-->
		<!--				<th>Approved</th>-->

		<!--				<th colspan="2">Action</th>-->
		<!--			</thead>-->
		<!--			<tbody>-->
		<!--			<?php foreach ($admins as $key => $admin): ?>-->
		<!--				<tr>-->
		<!--					<td><?php echo $key + 1; ?></td>-->
		<!--					<td>-->
		<!--						<?php echo $admin['username']; ?>, &nbsp;-->
		<!--						<?php echo $admin['email']; ?> ,-->
		<!--						<?php echo $admin['phone']; ?>	-->

		<!--					</td>-->
		<!--					<td><?php echo $admin['role']; ?></td>-->
		<!--					<td>-->
		<!--						<?php if ($admin['approved'] == true): ?>-->
		<!--							<a class="fa fa-check btn unpublish"-->
		<!--								href="users.php?disapprove=<?php echo $admin['id'] ?>">-->
		<!--							</a>-->
		<!--						<?php else: ?>-->
		<!--							<a class="fa fa-times btn publish"-->
		<!--								href="users.php?approve=<?php echo $admin['id'] ?>">-->
		<!--							</a>-->
		<!--						<?php endif ?>-->
		<!--						</td>-->

		<!--					<td>-->
		<!--						<a class="fa fa-pencil btn edit"-->
		<!--							href="users.php?edit-admin=<?php echo $admin['id'] ?>">-->
		<!--						</a>-->
		<!--					</td>-->
		<!--					<td>-->
		<!--						<a class="fa fa-trash btn delete" -->
		<!--						    href="users.php?delete-admin=<?php echo $admin['id'] ?>">-->
		<!--						</a>-->
		<!--					</td>-->
		<!--				</tr>-->
		<!--			<?php endforeach ?>-->
		<!--			</tbody>-->
		<!--		</table>-->
		<!--	<?php endif ?>-->
		<!--</div>-->
		<!-- // Display records from DB -->
	</div>
</body>
</html>
