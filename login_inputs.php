<?php
$conn = mysqli_connect("localhost", "everymin_user", "sc200/0195/2018", "everymin_everymina");

if(isset($_POST['ingia'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (empty($username)) { array_push($errors, "Username required"); }
		if (empty($password)) { array_push($errors, "Password required"); }
		
		if (empty($errors)) {
			$password = md5($password); // encrypt password
			$sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";

			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// get id of created user
				$reg_user_id = mysqli_fetch_assoc($result)['id']; 

				// put logged in user into session array
				$_SESSION['user'] = getUserById($reg_user_id); 

				// if user is admin, redirect to admin area
				if ( in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
				    
					// redirect to admin area
					header('location: /admin/dashboard.php');
					
					exit(0);
				} else {
					$_SESSION['message'] = "You are now logged in";
					// redirect to public area
					header('location: index.php');				
					exit(0);
				}
			} else {
				array_push($errors, 'Wrong credentials');
			}
		}
    
}
				?>