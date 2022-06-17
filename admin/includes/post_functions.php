<?php 
// Post variables
$post_id = 0;
$isEditingPost = false;
$published = 0;
$title = "";
$post_slug = "";
$body = "";
$featured_image = "";
$post_topic = "";



/* - - - - - - - - - - 
-  Post functions
- - - - - - - - - - -*/
// get all posts from DB
function getAllPosts()
{
	global $conn;
	
	// Admin can view all posts
	// Author can only view their posts
	if ($_SESSION['user']['role'] == "Admin") {
	    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
	} elseif ($_SESSION['user']['role'] == "Author") {
		$user_id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM posts WHERE user_id=$user_id";
				
	}
	$result = mysqli_query($conn, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}
// get the author/username of a post
function getPostAuthorById($user_id)
{
	global $conn;
	$sql = "SELECT username FROM users WHERE id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result)['username'];
	} else {
		return null;
	}
}


// if user clicks the create post button
if (isset($_POST['create_post'])) { createPost($_POST); }
// if user clicks the Edit post button
if (isset($_GET['edit-post'])) {
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}
// if user clicks the update post button
if (isset($_POST['update_post'])) {
	updatePost($_POST);
}
// if user clicks the Delete post button
if (isset($_GET['delete-post'])) {
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
}

/* - - - - - - - - - - 
-  Post functions
- - - - - - - - - - -*/
function createPost($request_values)
	{
		global $conn, $errors, $title, $featured_image, $category_id, $body, $published,$author;
		$title = esc($request_values['title']);
		$author = esc($request_values['author']);
		$body = htmlentities(esc($request_values['body']));
		if (isset($request_values['category_id'])) {
			$category_id = esc($request_values['category_id']);
		}
		if (isset($request_values['publish'])) {
			$published = esc($request_values['publish']);
		}
		// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
		$post_slug = makeSlug($title);
		// validate form
		if (empty($title)) { array_push($errors, "Post title is required"); }
		if (empty($body)) { array_push($errors, "Post body is required"); }
		if (empty($category_id)) { array_push($errors, "Post category is required"); }
		// Get image name
	  	$featured_image = $_FILES['featured_image']['name'];
	  	if (empty($featured_image)) { array_push($errors, "Featured image is required"); }
	  	// image file directory
	  	$target = "../uploads/posts/" . basename($featured_image);
	  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  		array_push($errors, "Failed to upload image. Please check file settings for your server");
	  	}
		// Ensure that no post is saved twice. 
		$post_check_query = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1";
		$result = mysqli_query($conn, $post_check_query);

		if (mysqli_num_rows($result) > 0) { // if post exists
			array_push($errors, "A post already exists with that title.");
		}
		// create post if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO posts (user_id, title, slug, image, body, published, created_at, updated_at) VALUES('$author', '$title', '$post_slug', '$featured_image', '$body', $published, now(), now())";
			if(mysqli_query($conn, $query)){ // if post created successfully
				$inserted_post_id = mysqli_insert_id($conn);
				// create relationship between post and topic
				$sql = "INSERT INTO post_category (post_id, category_id) VALUES($inserted_post_id, $category_id)";
				mysqli_query($conn, $sql);

				$_SESSION['message'] = "Post created successfully";
				header('location: posts.php');
				
				
				sendEmail($title,$featured_image,$post_slug);
				
				exit(0);
				
			

				
				
			}
		}
	}

	/* * * * * * * * * * * * * * * * * * * * *
	* - Takes post id as parameter
	* - Fetches the post from database
	* - sets post fields on form for editing
	* * * * * * * * * * * * * * * * * * * * * */
	function editPost($role_id)
	{
		global $conn, $title, $post_slug, $body, $published, $isEditingPost, $post_id;
		$sql = "SELECT * FROM posts WHERE id=$role_id LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$post = mysqli_fetch_assoc($result);
		// set form values on the form to be updated
		$title = $post['title'];
		$body = $post['body'];
		$published = $post['published'];
	}

	function updatePost($request_values)
	{
		global $conn, $errors, $post_id, $title, $featured_image, $category_id, $body, $published;

		$title = esc($request_values['title']);
		$body = esc($request_values['body']);
		$post_id = esc($request_values['post_id']);
		if (isset($request_values['category_id'])) {
			$category_id = esc($request_values['category_id']);
		}
		// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
		$post_slug = makeSlug($title);

		if (empty($title)) { array_push($errors, "Post title is required"); }
		if (empty($body)) { array_push($errors, "Post body is required"); }
		// if new featured image has been provided
		if (isset($_POST['featured_image'])) {
			// Get image name
		  	$featured_image = $_FILES['featured_image']['name'];
		  	// image file directory
		  	$target = "../static/images/" . basename($featured_image);
		  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
		  		array_push($errors, "Failed to upload image. Please check file settings for your server");
		  	}
		}

		// register topic if there are no errors in the form
		if (count($errors) == 0) {
			$query = "UPDATE posts SET title='$title', slug='$post_slug', views=0, body='$body', published=$published, updated_at=now() WHERE id=$post_id";
			// attach topic to post on post_topic table
			if(mysqli_query($conn, $query)){ // if post created successfully
				if (isset($category_id)) {
					$inserted_post_id = mysqli_insert_id($conn);
					// create relationship between post and topic
					$sql = "INSERT INTO post_category (post_id, category_id) VALUES($inserted_post_id, $category_id)";
					mysqli_query($conn, $sql);
					$_SESSION['message'] = "Post created successfully";
					header('location: posts.php');
					exit(0);
				}
			}
			$_SESSION['message'] = "Post updated successfully";
			header('location: posts.php');
			exit(0);
		}
	}
	// delete blog post
	function deletePost($post_id)
	{
		global $conn;
		$sql = "DELETE FROM posts WHERE id=$post_id";
		if (mysqli_query($conn, $sql)) {
			$_SESSION['message'] = "Post successfully deleted";
			header("location: posts.php");
			exit(0);
		}
	}

    // if user clicks the publish post button
if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
	$message = "";
	if (isset($_GET['publish'])) {
		$message = "Post published successfully";
		$post_id = $_GET['publish'];
	} else if (isset($_GET['unpublish'])) {
		$message = "Post successfully unpublished";
		$post_id = $_GET['unpublish'];
	}
	togglePublishPost($post_id, $message);
}
// delete blog post
function togglePublishPost($post_id, $message)
{
	global $conn;
	$sql = "UPDATE posts SET published=!published WHERE id=$post_id";
	
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = $message;
		header("location: posts.php");
		exit(0);
	}
}

function sendEmail($title,$picture,$slug)
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
                    <h1 style="font-size: 58px;color: #30323d; background: #FFFFFF; margin-top: 30px; margin-bottom: 0; text-transform: uppercase;">LATEST POST</h1>
                    <p style="margin: 0; padding-bottom: 30px; font-size:18px;">YOU MIGHT HAVE MISSED</p>
                </header>

                <div style="padding: 0 20px;">
                    <img src="https://everymina.com/uploads/posts/'.$picture.'" alt="email hero image"
                         style="display: block; background-size: cover; width: 100%;">
                </div>

                <h2 style="font-size: 32px; padding: 30px 20px 0 20px; margin-bottom: 0; text-transform: uppercase; color: #4A4A4A;">'.$title.'</h2>

                <ul style="padding: 0 20px;">
                        <li style="list-style-type: none; padding-bottom: 50px; margin-left: 0;color: #4d5061;">
                                </br><p></p>
                            <div style="flex-basis: 100%; padding-left: 20px; width: 100%;"
                                 class="remove-flex-basis-mobile">
                               
                                    </br>
                                    <a href="https://everymina.com/single_post.php?post-slug='.$slug.'" style="text-decoration: none; text-transform:
                                    uppercase; cursor: pointer; line-height: 1.1em; letter-spacing: 0; padding: 12px;
                                     background: red; color: #f0ebeb; border-radius: 8px; text-align: center;
                                     font-size: 16px; font-weight: bold; box-sizing: border-box;">READ MORE</a>
                                  </br>
                                <p></p>
                            </div>
                                </br>
                              


                        </li>


            </ul>

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
 
	if($posts){
	   foreach($posts as $sub){ 
	     
    if(mail($sub['email'], "EveryMina",$htmlContent, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}

   ; 
} 
	}


// 	return $posts;
}


?>