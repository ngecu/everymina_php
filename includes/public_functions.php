<?php 
/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts,users WHERE published=true and users.id=posts.user_id ORDER BY views ASC  ";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['category'] = getPostCategory($post['id']); 
			$post['author']= getPostAuthorById($post['user_id']);
		$post['published']= getAuthorImage($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}


function timeago($date) {
	   $timestamp = strtotime($date);	
	   
	   $strTime = array("second", "minute", "hour", "day", "month", "year");
	   $length = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if($currentTime >= $timestamp) {
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			return $diff . " " . $strTime[$i] . "(s) ago ";
	   }
	}
	

function getAllPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts ORDER BY created_at DESC";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['category'] = getPostCategory($post['id']); 
			$post['author']= getPostAuthorById($post['user_id']);
		$post['published']= getAuthorImage($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getAllAuthors() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM users ORDER BY created_at DESC";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$authors = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $authors;
}

function getPostByAuthor($id) {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE user_id=$id ORDER BY created_at DESC";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['category'] = getPostCategory($post['id']); 
			$post['author']= getPostAuthorById($post['user_id']);
		$post['published']= getAuthorImage($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getRandomPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM `posts` ORDER BY rand() LIMIT 3";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['category'] = getPostCategory($post['id']); 
			$post['author']= getPostAuthorById($post['user_id']);
		$post['published']= getAuthorImage($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getTrendingPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY created_at DESC LIMIT 4";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['category'] = getPostCategory($post['id']); 
			$post['author']= getPostAuthorById($post['user_id']);
		$post['published']= getAuthorImage($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}


function getHeadlinePost() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 1";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$post = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $post;
}

function updateViews($id) {
	// use global $conn object in function
	global $conn;
	$sql = "UPDATE posts SET views=views + 1 WHERE title=$id";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts

	return $result;
}
/* * * * * * * * * * * * * * *
* Receives a post id and
* Returns topic of the post
* * * * * * * * * * * * * * */
function getPostCategory($post_id){
	global $conn;
	$sql = "SELECT * FROM categories  WHERE id=
			(SELECT category_id FROM post_category WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$category = mysqli_fetch_assoc($result);
	return $category;
}

/* * * * * * * * * * * * * * * *
* Returns all posts under a topic
* * * * * * * * * * * * * * * * */
function getPublishedPostsByCategory($category_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps  
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_category pt 
				WHERE pt.category_id=$category_id GROUP BY pt.post_id 
				 ORDER BY created_at DESC  )";
				$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['category'] = getPostCategory($post['id']); 
				$post['author']= getPostAuthorById($post['user_id']);
		$post['published']= getAuthorImage($post['user_id']);
		array_push($final_posts, $post);
	};
	return $final_posts;
}
/* * * * * * * * * * * * * * * *
* Returns topic name by topic id
* * * * * * * * * * * * * * * * */
function getCategoryNameById($id)
{
	global $conn;
	$sql = "SELECT name FROM categories WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	$category = mysqli_fetch_assoc($result);
	return $category['name'];
}

/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */


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

function getAuthorImage($user_id)
{
	global $conn;
	$sql = "SELECT profilepic FROM users WHERE id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result)['profilepic'];
	} else {
		return null;
	}
}

function getPost($slug){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['category'] = getPostCategory($post['id']);
		$post['author']= getPostAuthorById($post['user_id']);
		$post['published']= getAuthorImage($post['user_id']);
	}
	
	// Page ID needs to exist, this is used to determine which comments are for which page


	return $post;
}

function getAuthor($id){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];

	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$author = mysqli_fetch_assoc($result);

	
	// Page ID needs to exist, this is used to determine which comments are for which page


	return $author;
}



/* * * * * * * * * * * *
*  Returns all topics
* * * * * * * * * * * * */
function getAllCategories()
{
	global $conn;
	$sql = "SELECT * FROM categories ORDER BY rand()";
	$result = mysqli_query($conn, $sql);
	$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $categories;
}



	function searchData($title){ 
		global $conn;
	$sql = "SELECT * FROM `posts` WHERE `title` LIKE '%$title%' ORDER BY `title`";
	$result = mysqli_query($conn, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $posts;
	}

		// get post with id 1 from database
		$post_query_result = mysqli_query($conn, "SELECT * FROM posts WHERE id=1");
		$post = mysqli_fetch_assoc($post_query_result);
	
		// Get all comments from database
		$comments_query_result = mysqli_query($conn, "SELECT * FROM comments WHERE post_id=" . $post['id'] . " ORDER BY created_at DESC");
		$comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);

		

	function getReadTime($content = ''){
		$word = str_word_count(strip_tags($content));
		$m = floor($word / 230);
		$s = floor($word % 230 / (230 / 60));
		$estimateTime = $m . ' minute' . ($m == 1 ? '' : 's');
	
		return $estimateTime;
	}



	if (isset($_POST['comment'])) {
	    $post_slug = $_POST['post_slug'];
	    $commentor = mysqli_real_escape_string($conn, $_POST['commentor']);
	    $comment = mysqli_real_escape_string($conn, $_POST['comment_text']);
       
        if(empty($commentor)){
            $commentor = "Anonymous User";
        }
        
                if(empty($comment)){
            header('location: single_post.php?post-slug='.$post_slug.'#commentForm');				
				exit(0);
        }
        else{
            $xyz = "INSERT INTO comments (post_slug,name,message) VALUES ('$post_slug','$commentor','$comment')";

            mysqli_query($conn, $xyz);
            header('location: single_post.php?post-slug='.$post_slug.'#commentForm');				
				exit(0);
        }
              
			
	}


function commentCount($ps){
    	global $conn;
    $sql = "SELECT COUNT(*) as count FROM comments WHERE post_slug='$ps'";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$count = mysqli_fetch_assoc($result)['count'];

return $count;
}

function getPostComment($ps) {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM `comments` WHERE post_slug='$ps'";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_comments = array();
	foreach ($comments as $comment) {
	
		array_push($final_comments, $comment);
	}
	return $final_comments;
}





function viewCount($post_slug){
    	global $conn;
    	
    	$user_ip=$_SERVER['REMOTE_ADDR'];
    	$date = date("Y-m-d");
    	
    	$query = "SELECT * `unique_visitors` WHERE `post_slug`='$post_slug'";
    	
    	$result = mysqli_query($conn,$query);
    	
    	if($result->num_rows == 0){
    	    $insertQuery = "INSERT INTO `unique_visitors`(`date`,`ip`,`post_slug`) VALUES ('$date','$user_ip')";
    	    mysqli_query($conn,$insertQuery,$post_slug);
    	    
    	}
    	else{
    	    $row = $result->fetch_assoc();
    	    if(!preg_match('/'.$user_ip.'/i',$row['ip'])){
    	        
    	        $newIP = "$row[ip] $userIP";
    	        $updateQuery = "UPDATE `unique_visitors` SET `ip`=`$newIP`,`views`=`views`+ 1 WHERE  `post_slug`='$post_slug'";
    	        mysqli_query($conn,$updateQuery);
    	        
    	        
    	    }
    	}
   
  
  
}


function subscribeNewsLetter($request_values)
	{
		global $conn, $errors, $name, $email;
		$name = esc($request_values['name']);
		$email = esc($request_values['email']);

		// validate form
		if (empty($name)) { array_push($errors, "Name is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
	
		// Ensure that no post is saved twice. 
		$post_check_query = "SELECT * FROM newsletters WHERE email='$email' LIMIT 1";
		$result = mysqli_query($conn, $post_check_query);

		if (mysqli_num_rows($result) > 0) { // if post exists
			array_push($errors, "An email already exists with that title.");
		}
		// create post if there are no errors in the form
		
	
		
		if (count($errors) == 0) {
			$query = "INSERT INTO newsletters (name, email) VALUES('$name','$email')";
				if(mysqli_query($conn, $query)){ // if post created successfully
		
				$_SESSION['message'] = "Post created successfully";
					echo '<script> window.location.replace("thankyou.php"); </script>';
			
			sendThankyouScubscription($name,$email);
			
				exit(0);
			}
		}
	}


// if user clicks the create post button
if (isset($_POST['subscribe_email'])) { subscribeNewsLetter($_POST); }



function sendThankyouScubscription($name,$email)
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
                    <h1 style="font-size: 58px;color: #30323d; background: #FFFFFF; margin-top: 30px; margin-bottom: 0; text-transform: uppercase;">'.$name.', THANK YOU</h1>
                    <p style="margin: 0; padding-bottom: 30px; font-size:18px;">SUBSCRIPTION OFFICIALLY ACTIVATED</p>
                </header>

                <div style="padding: 0 20px;">
                    <img src="https://upjourney.com/wp-content/uploads/2020/04/how-to-respond-to-thank-you.jpg" alt="email hero image"
                         style="display: block; background-size: cover; width: 100%;">
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

    if(mail($email, "EveryMina- Thank You",$htmlContent, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}

   
	


// 	return $posts;
}




?>