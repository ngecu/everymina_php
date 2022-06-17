<?php 
	//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


// Admin user variables
$admin_id = 0;
$isEditingUser = false;
$username = "";
$role = "";
$email = "";
// general variables
$errors = [];


// Topics variables
$category_id = 0;
$isEditingCategory = false;
$category_name = "";


/* - - - - - - - - - - 
-  Admin users actions
- - - - - - - - - - -*/
// if user clicks the create admin button
if (isset($_POST['create_admin'])) {
	createAdmin($_POST);
}
// if user clicks the Edit admin button
if (isset($_GET['edit-admin'])) {
	$isEditingUser = true;
	$admin_id = $_GET['edit-admin'];
	editAdmin($admin_id);
}
// if user clicks the update admin button
if (isset($_POST['update_admin'])) {
	updateAdmin($_POST);
}
// if user clicks the Delete admin button
if (isset($_GET['delete-admin'])) {
	$admin_id = $_GET['delete-admin'];
	deleteAdmin($admin_id);
}


/* - - - - - - - - - - 
-  Topic actions
- - - - - - - - - - -*/
// if user clicks the create topic button
if (isset($_POST['create_category'])) { createCategory($_POST); }
// if user clicks the Edit topic button
if (isset($_GET['edit-category'])) {
	$isEditingCategory = true;
	$category_id = $_GET['edit-category'];
	editCategory($category_id);
}
// if user clicks the update topic button
if (isset($_POST['update_category'])) {
	updateCategory($_POST);
}
// if user clicks the Delete topic button
if (isset($_GET['delete-category'])) {
	$category_id = $_GET['delete-category'];
	deleteCategory($category_id);
}



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
* - Returns all admin users and their corresponding roles
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function getAdminUsers(){
	global $conn, $roles;
	$sql = "SELECT * FROM users WHERE role IS NOT NULL";
	$result = mysqli_query($conn, $sql);
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $users;
}
/* * * * * * * * * * * * * * * * * * * * *
* - Escapes form submitted value, hence, preventing SQL injection
* * * * * * * * * * * * * * * * * * * * * */
function esc(String $value){
	// bring the global db connect object into function
	global $conn;
	// remove empty space sorrounding string
	$val = trim($value); 
	$val = mysqli_real_escape_string($conn, $value);
	return $val;
}
// Receives a string like 'Some Sample String'
// and returns 'some-sample-string'
function makeSlug(String $string){
	$string = strtolower($string);
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}

/* - - - - - - - - - - - -
-  Admin users functions
- - - - - - - - - - - - -*/
/* * * * * * * * * * * * * * * * * * * * * * *
* - Receives new admin data from form
* - Create new admin user
* - Returns all admin users with their roles 
* * * * * * * * * * * * * * * * * * * * * * */
function createAdmin($request_values){
	global $conn, $errors, $role, $username, $email,$fullname;
	$username = esc($request_values['username']);
	$profileImage = esc($request_values['profileImage']);
	$fullname = esc($request_values['fullname']);
	$email = esc($request_values['email']);
	$articlesample = esc($request_values['articlesample']);
	$academicBackground = esc($request_values['academicBackground']);
	$idphoto = esc($request_values['idphoto']);
	$IDNo = esc($request_values['IDNo']);
	$paymentmethod = esc($request_values['paymentmethod']);
$phone = esc($request_values['phone']);
	$password = esc($request_values['password']);
	$passwordConfirmation = esc($request_values['passwordConfirmation']);
	$approval = esc($request_values['approval']);
	if(isset($request_values['role'])){
		$role = esc($request_values['role']);
	}
	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Uhmm...We gonna need the username"); }
	if (empty($email)) { array_push($errors, "Oops.. Email is missing"); }
	if (empty($role)) { array_push($errors, "Role is required for admin users");}
	if (empty($password)) { array_push($errors, "uh-oh you forgot the password"); }
	if ($password != $passwordConfirmation) { array_push($errors, "The two passwords do not match"); }
	if (empty($profileImage)) { array_push($errors, "Uhmm...We gonna need the profile pic"); }
	if (empty($fullname)) { array_push($errors, "Uhmm...We gonna need the fullname"); }
	if (empty($articlesample)) { array_push($errors, "Uhmm...We gonna need the articlesample"); }
	if (empty($academicBackground)) { array_push($errors, "Uhmm...We gonna need the academicBackground"); }
	if (empty($idphoto)) { array_push($errors, "Uhmm...We gonna need the idphoto"); }
	if (empty($IDNo)) { array_push($errors, "Uhmm...We gonna need the IDNo"); }
	if (empty($paymentmethod)) { array_push($errors, "Uhmm...We gonna need the paymentmethod"); }
	if (empty($phone)) { array_push($errors, "Uhmm...We gonna need the phone"); }
	// Ensure that no user is registered twice. 
	// the email and usernames should be unique
	$user_check_query = "SELECT * FROM users WHERE username='$username' 
							OR email='$email' LIMIT 1";
	$result = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	if ($user) { // if user exists
		if ($user['username'] === $username) {
		  array_push($errors, "Username already exists");
		}

		if ($user['email'] === $email) {
		  array_push($errors, "Email already exists");
		}
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		echo $fullname,$profileImage,$articlesample,$academicBackground,$idphoto,$IDNo,$paymentmethod,$username,$email,$phone,$role,$password;
		$password = md5($password);//encrypt the password before saving in the database

		$xyz = "INSERT INTO users (profilepic, username, realname, email, samplearticle, academicbackground, IDphoto,IDNumber,paymentmethod,categories,phone,password,role) 
		VALUES ('$profileImageName','$username','$realname','$email','$articlesampleName','$academicBackground','$IDImageName','$IDNo','$paymentMethod','Entertainment,Bussiness,Education','$phone','$password','$role')";

		

mysqli_query($conn, $xyz);

		mysqli_query($conn, $query);

		$_SESSION['message'] = "Admin user created successfully";
		header('location: users.php');
		exit(0);
	}
}

/* - - - - - - - - - - 
-  Topics functions
- - - - - - - - - - -*/
// get all topics from DB
function getAllCategories() {
	global $conn;
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($conn, $sql);
	$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $categories;
}
function createCategory($request_values){
	global $conn, $errors, $category_name;
	$category_name = esc($request_values['category_name']);
	// create slug: if topic is "Life Advice", return "life-advice" as slug
	$category_slug = makeSlug($category_name);
	// validate form
	if (empty($category_name)) { 
		array_push($errors, "Category name required"); 
	}
	// Ensure that no topic is saved twice. 
	$category_check_query = "SELECT * FROM categories WHERE slug='$category_slug' LIMIT 1";
	$result = mysqli_query($conn, $category_check_query);
	if (mysqli_num_rows($result) > 0) { // if topic exists
		array_push($errors, "Category already exists");
	}
	// register topic if there are no errors in the form
	if (count($errors) == 0) {
		$query = "INSERT INTO categories (name, slug) 
				  VALUES('$category_name', '$category_slug')";
		mysqli_query($conn, $query);

		$_SESSION['message'] = "Category created successfully";
		header('location: categories.php');
		exit(0);
	}
}


/* * * * * * * * * * * * * * * * * * * * *
* - Takes topic id as parameter
* - Fetches the topic from database
* - sets topic fields on form for editing
* * * * * * * * * * * * * * * * * * * * * */
function editCategory($category_id) {
	global $conn, $category_name, $isEditingCategory, $category_id;
	$sql = "SELECT * FROM categories WHERE id=$category_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$category = mysqli_fetch_assoc($result);
	// set form values ($topic_name) on the form to be updated
	$category_name = $category['name'];
}
function updateCategory($request_values) {
	global $conn, $errors, $category_name, $category_id;
	$category_name = esc($request_values['category_name']);
	$category_id = esc($request_values['category_id']);
	// create slug: if topic is "Life Advice", return "life-advice" as slug
	$category_slug = makeSlug($category_name);
	// validate form
	if (empty($category_name)) { 
		array_push($errors, "category name required"); 
	}
	// register topic if there are no errors in the form
	if (count($errors) == 0) {
		$query = "UPDATE categories SET name='$category_name', slug='$category_slug' WHERE id=$category_id";
		mysqli_query($conn, $query);

		$_SESSION['message'] = "category updated successfully";
		header('location: categories.php');
		exit(0);
	}
}
// delete topic 
function deleteCategory($category_id) {
	global $conn;
	$sql = "DELETE FROM categories WHERE id=$category_id";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "category successfully deleted";
		header("location: categories.php");
		exit(0);
	}
}

/* * * * * * * * * * * * * * * * * * * * *
* - Takes admin id as parameter
* - Fetches the admin from database
* - sets admin fields on form for editing
* * * * * * * * * * * * * * * * * * * * * */
function editAdmin($admin_id)
{
	global $conn, $username, $role, $isEditingUser, $admin_id, $email;

	$sql = "SELECT * FROM users WHERE id=$admin_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$admin = mysqli_fetch_assoc($result);

	// set form values ($username and $email) on the form to be updated
	$username = $admin['username'];
	$email = $admin['email'];
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
* - Receives admin request from form and updates in database
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function updateAdmin($request_values){
	global $conn, $errors, $role, $username, $isEditingUser, $admin_id, $email;
	// get id of the admin to be updated
	$admin_id = $request_values['admin_id'];
	// set edit state to false
	$isEditingUser = false;


	$username = esc($request_values['username']);
	$email = esc($request_values['email']);
	$password = esc($request_values['password']);
	$passwordConfirmation = esc($request_values['passwordConfirmation']);
	if(isset($request_values['role'])){
		$role = $request_values['role'];
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		//encrypt the password (security purposes)
		$password = md5($password);

		$query = "UPDATE users SET username='$username', email='$email', role='$role', password='$password' WHERE id=$admin_id";
		mysqli_query($conn, $query);

		$_SESSION['message'] = "Admin user updated successfully";
		header('location: users.php');
		exit(0);
	}
}
// delete admin user 
function deleteAdmin($admin_id) {
	global $conn;
	$sql = "DELETE FROM users WHERE id=$admin_id";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "User successfully deleted";
		header("location: users.php");
		exit(0);
	}
}

function getEmails(){
	global $conn;
	$sql = "SELECT * FROM emails";
	$result = mysqli_query($conn, $sql);
	$emails = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $emails;
}

function createEmail($request_values){
	global $conn, $username, $role, $subject, $message, $sender, $receipient , $password;

	$username = esc($request_values['username']);
	$role = esc($request_values['role']);
	$subject = esc($request_values['subject']);

	$message = esc($request_values['message']);
	$sender = esc($request_values['sender']);
	$receipient = esc($request_values['receipient']);
	$password = esc($request_values['password']);


//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = $username;
//Set gmail password
	$mail->Password = $password;
//Email subject
	$mail->Subject = $subject;
//Set sender email
	$mail->setFrom($sender);
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "Greeting, Please receive the email form I,".$message."";
//Add recipient
	$mail->addAddress($receipient);
//Finally send email
	if ( $mail->send() ) {
		$query = "INSERT INTO emails (username,subject,message,sender,receipent) 
		VALUES('$username', '$subject',$message,$sender,$receipient)";
mysqli_query($conn, $query);
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
	}
//Closing smtp connection
	$mail->smtpClose();

}

    // if user clicks the publish post button
	if (isset($_GET['approve']) || isset($_GET['disapprove'])) {
		$message = "";
		if (isset($_GET['approve'])) {
			$message = "User approved successfully";
			$user_id = $_GET['approve'];
		} else if (isset($_GET['disapprove'])) {
			$message = "User successfully disapproved";
			$user_id = $_GET['disapprove'];
		}
		toggleApprovalUser($user_id, $message);
	}

function toggleApprovalUser($user_id, $message)
{
	global $conn;
	$sql = "UPDATE users SET approved=!approved WHERE id=$user_id";
	
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = $message;
		header("location: users.php");
		exit(0);
	}
}


function getAllSubscribers()
{
	global $conn;
	
	// Admin can view all posts
	// Author can only view their posts
	$sql = "SELECT * FROM newsletters";
	
	$result = mysqli_query($conn, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		array_push($final_posts, $post);
	}
	return $final_posts;
}

?>