 <?php 
 require 'config.php';
//Include required PHPMailer files
require 'admin/includes/PHPMailer.php';
require 'admin/includes/SMTP.php';
require 'admin/includes/Exception.php';
//Define name spacese
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



	ob_start();
	
	$errors = array(); 
	
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
				// 	header('location: /admin/dashboard.php');
					echo '<script> window.location.replace("/admin/posts.php"); </script>';
					
					exit(0);
				} else {
					$_SESSION['message'] = "You are now logged in";
					// redirect to public area
				// 	header('location: index.php');			
				echo '<script> window.location.replace("index.php"); </script>';
					exit(0);
				}
			} else {
				array_push($errors, 'Wrong credentials');
			}
		}
    
}






if (isset($_POST['reg_user'])) {
        $username = $_POST['username'];
        $realname = $_POST['realname'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $Summary = $_POST['summary'];
        
        $academicBackground = $_POST['academicBackground']; 
        $IDNo = $_POST['IDNo'];
        $phone = $_POST['phone'];
        $paymentMethod = $_POST['paymentMethod'];
        $categories = $_POST['categories'];
		$cat = implode(',',$categories);
        $password_1 = $_POST['pwd'];
        $password_2 =$_POST['pwd2'];
        
        
      
        $profileImageName =$_FILES["profileImage"]["name"];
        $profileImageTmpName =$_FILES["profileImage"]["tmp_name"];
        $profileImageSize =$_FILES["profileImage"]["size"];
        $profileImageError =$_FILES["profileImage"]["error"];
        $profileImageType =$_FILES["profileImage"]["type"];

		$articlesampleName =$_FILES["articlesample"]["name"];
		$articlesampleTmpName =$_FILES["articlesample"]["tmp_name"];
		$articlesampleSize =$_FILES["articlesample"]["size"];
		$articlesampleError =$_FILES["articlesample"]["error"];
		$articlesampleType =$_FILES["articlesample"]["type"];

		$IDImageName =$_FILES["idphoto"]["name"];
		$IDImageTmpName =$_FILES["idphoto"]["tmp_name"];
		$IDImageSize =$_FILES["idphoto"]["size"];
		$IDImageError =$_FILES["idphoto"]["error"];
		$IDImageType =$_FILES["idphoto"]["type"];

		
        $profileImageExt =explode('.',$profileImageName);
        $articlesampleExt = explode('.',$articlesampleName);
		$IDImageNameExt = explode('.',$IDImageName);


		$profileImageActualExt =strtolower(end($profileImageExt));
        $articlesampleActualExt = strtolower(end($articlesampleExt));
		$IDImageNameActualExt = strtolower(end($IDImageNameExt));

		$allowed = array('pdf','odt');

		if (in_array($articlesampleActualExt,$allowed)) {
			if($articlesampleError === 0){
				$fileNameNew = $articlesampleName;
				$fileDestination = "uploads/articles/".$fileNameNew;
				move_uploaded_file($articlesampleTmpName,$fileDestination);
			}
			else {
				echo "There was an error uploading your file!";
			}
		}
		else {
			echo "You cannot upload Files of this type!";
		}

        if ($role == "None") { array_push($errors, "Select role"); }
	  	if (empty($profileImageName)) { array_push($errors, "profile image is required"); }
	  	if (empty($articlesampleName)) { array_push($errors, "Article is required"); }
	  	if (empty($IDImageName)) { array_push($errors, "ID Image is required"); }
	  	if (strlen($phone) != 10) { array_push($errors, "Phone Number Incomplete"); }
	  	if (strlen($IDNo) != 8) { array_push($errors, "ID Number Incomplete"); }

	  			
		  if($profileImageError === 0){
			$fileNameNew = $profileImageName;
			$fileDestination = "uploads/profileimages/".$fileNameNew;
			move_uploaded_file($profileImageTmpName,$fileDestination);
		}
		else {
			echo "There was an error uploading your file!";
		}

		if($IDImageError === 0){
			$fileNameNew = $IDImageName;
			$fileDestination = "uploads/idPhotos/".$fileNameNew;
			move_uploaded_file($IDImageTmpName,$fileDestination);
		}
		else {
			echo "There was an error uploading your file!";
		}


//   if($_FILES['profileImage']['size'] > 200000) {
//    array_push($errors, "Image size should not be greated than 200Kb"); }
  

  // form validation: ensure that the form is correctly filled 
  // by adding (array_push()) corresponding error into $errors array
  if (empty($realname)) { array_push($errors, "Full Name is required"); }
  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {	array_push($errors, "The two passwords do not match");  }


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
			$password = md5($password_1);//encrypt the password before saving in the database
            
            $xyz = "INSERT INTO users ( profilepic, username, realname, email, samplearticle, academicbackground, IDphoto,IDNumber,paymentmethod,categories,phone,password,role,summary,user_code,approved) 
            VALUES ('$profileImageName','$username','$realname','$email','$articlesampleName','$academicBackground','$IDImageName','$IDNo','$paymentMethod','$cat','$phone','$password','$role','$Summary','0000',1)";

  	
   
	$result = mysqli_query($conn,$xyz);
if($result)
{
    			// get id of created user
			$reg_user_id = mysqli_insert_id($conn); 

			// put logged in user into session array
// 			$_SESSION['user'] = getUserById($reg_user_id);

				$_SESSION['message'] = "You are now logged in";
				// redirect to public area
					echo '<script> window.location.replace("approval.php"); </script>';
					sendNewRegistration();
					
}
else
{
    echo  mysqli_error($conn);
    // echo '<script> window.location.replace("error.php"); </script>';

}
	
		}
	}
	
	
	


	// Get user info from user id
	function getUserById($id)
	{
		global $conn;
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		// returns user in an array format: 
		// ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
		return $user; 
	}
	
if (isset($_POST['update_data'])) {
    $author_id = $_GET['edit-admin'];
    $username = $_POST['username'];
    
        $realname = $_POST['realname'];
        $email = $_POST['email'];
        $Summary = $_POST['summary'];
        
        $phone = $_POST['phone'];
        $paymentMethod = $_POST['paymentMethod'];
	

        
        
        if (empty($realname)) { array_push($errors, "Full Name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($Summary)) { array_push($errors, "Summary is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($paymentMethod)) { array_push($errors, "Payment Method is required"); }

  
  	if (count($errors) == 0) {
            $xyz = "UPDATE users SET username='$username', realname='$realname', email='$email',paymentmethod='$paymentMethod',phone='$phone',summary='$Summary' WHERE id=$author_id";
	$result = mysqli_query($conn,$xyz);
if($result)
{
    
				// redirect to public area
					echo '<script> window.location.replace("single_user.php?edit-admin='.$author_id.'); </script>';
					
}
else
{
    
    echo '<script> window.location.replace("error.php"); </script>';

}
	
		}
  
}

ob_end_flush();



function sendNewRegistration()
{
	global $conn;
	
	// Admin can view all posts
	// Author can only view their posts
	$sql = "SELECT * FROM newsletters";
	$result = mysqli_query($conn, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$subs = ['devngecu@gmail.com',"ngecu16@gmail.com"];
	    $headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
	
 
$htmlContent = ' 
 
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>For Edu or Org Design</title>

    <style>
        @media screen and (max-width: 600px) {
            .remove-flex-mobile {
                display: block !important;
            }
            .remove-flex-basis-mobile {
                flex-basis: unset !important;
                padding-left: 0 !important;
            }
            .display-grid-mobile {
                grid-template-columns: 1fr !important;
            }
            .reminders-list {
                padding-left: 15px !important;
                margin-top: 10px !important;
            }
            .reminders-table td {
                float: unset !important;
                display: block !important;
                width: unset !important;
                margin-left: 0 !important;
            }
            .second-item-order {
                flex-direction: column !important;
                align-items: flex-start !important;
            }
            .flex-order {
                order: 2 !important;
            }
            .list-header {
                padding-top: 20px !important;
            }
            .navigation-footer {
                text-align: center !important;
            }
            .navigation-footer li {
                display: list-item !important;
                padding: 10px 0 !important;
            }
            .social-media img {
                width: 30px !important;
            }
            .social-media a {
                padding: 0 3px 0 0 !important;
            }
            .social-media a:last-of-type {
                padding-right: 0 !important;
            }
        }
    </style>
</head>
<body style="margin:0;">
<table style="border: none; margin: 0 auto ; padding: 0;">
    <tr>
        <td style="padding: 0; background-color: #FFFFFF;">

            <div style="max-width: 600px; min-width: 200px; font-family: "Arial", sans-serif; font-size: 16px; background-color: #FFFFFF; line-height: 1.4; color: #4A4A4A; border: 1px solid #DFDFDF; border-radius: 10px; overflow: hidden;">

                <div style="background-color: white; height: 60px;text-align: center;">
                    <img src="https://everymina.com/static/images/ll.svg" style="height: 100%;" alt=""> 
                </div>

                <header style="text-align: center;">
                    <h1 style="font-size: 58px;color: #30323d; background: #FFFFFF; margin-top: 30px; margin-bottom: 0; text-transform: uppercase;">NEW MEMBER</h1>
                    <p style="margin: 0; padding-bottom: 30px; font-size:18px;"></p>
                </header>

                <div style="padding: 0 20px;">
                    <img src="https://newsroom.unl.edu/announce/files/file90505.png" alt="email hero image"
                         style="display: block; background-size: cover; width: 100%;">

                         <table>
                             <tr>
                                 <td>

                                 </td>
                                     <td>

                                 </td>
                             </tr>
                         </table>
                </div>


            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                        <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                                <span class="apple-link"
                                      style="color: #999999; font-size: 12px; text-align: center;">From my bed to
                                you in bed somewhere in the karantini. I"m this bored sigh</span>
                            <br> Don"t like these emails? <a
                                    style="text-decoration: underline; color: #999999;
                                                                 font-size: 12px; text-align: center;">You are stuck with them </a>.
                        </td>
                    </tr>
                    <tr>
                        <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                            Powered by <a href="http://htmlemail.io" style="color: #999999; font-size: 12px;
                                text-align: center; text-decoration: none;">My ability to adapt code to fit my needs</a>.
                        </td>
                    </tr>
                </table>
            </div>
            <!-- END FOOTER -->
        </td>
    </tr>
</table>
</body>
</html>
'; 
 
mail("andigammark1@gmail.com", "EveryMina- New Member",$htmlContent, $headers);
    

   
	


// 	return $posts;
}



	

?>