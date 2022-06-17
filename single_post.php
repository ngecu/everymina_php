<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php 

	if (isset($_GET['post-slug'])) {
	    $asda = $_GET['post-slug'];
		$post = getPost($_GET['post-slug']);
		viewCount($_GET['post-slug']);
		
	}
	$postComments = getPostComment($_GET['post-slug']);
	    $counts = getPostComment($_GET['post-slug']);
	$categories = getAllCategories();
?>
<?php include('includes/head_section.php'); 
$randomPosts = getRandomPosts();
$randomX = getRandomPosts()[0];

?>

<style>
    
.comment-img {
  width: 3rem;
  height: 3rem;
}
.comment-replies .comment-img {
  width: 1.75rem;
  height: 1.75rem;
}
.jumbotron{
    background : white !important;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon.ico">
<link rel="icon" type="image/png" href="./assets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Source+Sans+Pro:400,700" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!-- Main CSS -->
<link href="static/css/mundana.css" rel="stylesheet"/>

</head>
<body>
    <script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>

<!--------------------------------------
NAVBAR
--------------------------------------->
<div class="container">
    	<?php include( ROOT_PATH . '/includes/navbar.php'); ?>


	<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subscribe our News</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
				<p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
                <form action="thankyou.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                    </div>
                    	<button type="submit" class="btn btn-primary" name="subscribe_email">Subscribe</button>
                   
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Navbar -->
    
<!--------------------------------------
HEADER
--------------------------------------->
<div class="container" style="padding-right: 15px !important;
padding-left: 15px !important;
margin-right: auto !important;
margin-left: auto !important;">
	<div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0  position-relative">
		<div class="h-100 tofront">
			<div class="row justify-content-between">
				<div class="col-md-6 pt-6 pb-6 pr-6 align-self-center">
					<p class="text-uppercase font-weight-bold">
						<a class="text-danger" href="#">Stories 
						
						
<?php function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function viewPostCount($ps){
    	global $conn;
    $sql = "SELECT COUNT(*) as count FROM ipdb WHERE post_slug='$ps'";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$count = mysqli_fetch_assoc($result)['count'];

return $count;
}


echo viewPostCount($asda). " Views";
 $ip = getUserIpAddr();
 echo "<br>";
?>


						<?php
						include('config.php');
		$qry = "SELECT * FROM `ipdb` WHERE `ip` = '$ip' AND `post_slug` = '$asda'";
		
		
		$result = mysqli_query($conn,$qry);
		$num = mysqli_num_rows($result);
		if ($num == 0){
			$qry3 = "INSERT INTO `ipdb`(`ip`,`post_slug`) VALUES ('$ip','$asda')";
			mysqli_query($conn,$qry3);
			//echo "new ip register";	
			$qry1 = "SELECT * FROM `counter` WHERE `id` = 0";
			$result1 = mysqli_query($conn,$qry1);
			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
			$count = $row1['visiters'];
			$count = $count + 1;
			//echo "<br>";
			//echo "number of unique visiters is $count";
			$qry2 = "UPDATE `counter` SET `visiters`='$count' WHERE `id`=0";
			$result2=mysqli_query($con,$qry2);
}else{
			$qry1 = "SELECT * FROM `counter` WHERE `id` = 0";
			$result1 = mysqli_query($con,$qry1);
			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
			$count = $row1['visiters'];
			//echo "<br>";
			//echo "number of unique visiters is $count";
}
  ?>
						</a>
					</p>
						<div class="d-flex align-items-center">
						<img class="rounded-circle" src="<?php echo BASE_URL . 'uploads/profileimages/'.$post['published'];  ?>" style="width:40px;height:40px;" >
						<small class="ml-2"><?php echo $post['author']; ?> <span class="text-muted d-block">A few hours ago &middot; <?php echo getReadTime(html_entity_decode($post['body'])) ?> read</span>
						</small>
					</div>
					<h1 class="display-4 secondfont mb-3 font-weight-bold"><?php echo $post['title']; ?></h1>
				
				
				</div>
				<div class="col-md-6 pr-0">
					<img src="<?php echo BASE_URL . '/uploads/posts/' . $post['image']; ?>" style="height:100%">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Header -->
    
<!--------------------------------------
MAIN
--------------------------------------->
<div class="container pt-4 pb-4 ">
	<div class="row justify-content-center">
		<div class="col-lg-2 pr-4 mb-4 col-md-12">
		   
			<div class="sticky-top text-center">
				<div class="text-muted">
					Share this
				</div>
				 <!--<span class="likebtn-wrapper" data-ef_voting="buzz" data-identifier="item_1"></span>-->
				<div class="share d-inline-block">
					 AddToAny BEGIN 
					<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
						<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
						<a class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
					</div>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
					 AddToAny END 
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-8">
			<article class="article-post p-4">
			  <?php echo html_entity_decode($post['body']); ?>
			  
			  <!--<span class="likebtn-wrapper" data-ef_voting="buzz" data-identifier="item_1"></span>-->
			</article>
			<!--<div class="border p-5 bg-lightblue">-->
			<!--	<div class="row justify-content-between">-->
			<!--		<div class="col-md-5 mb-2 mb-md-0" style="color:black;">-->
			<!--			<h5 class="font-weight-bold secondfont">Become a member</h5>-->
			<!--			 Get the latest news right in your inbox. We never spam!-->
			<!--		</div>-->
			<!--		<div class="col-md-7">-->
			<!--			<div class="row">-->
			<!--				<div class="col-md-12">-->
			<!--					<input type="text" class="form-control" placeholder="Enter your e-mail address">-->
			<!--				</div>-->
			<!--				<div class="col-md-12 mt-2">-->
			<!--					<button type="submit" class="btn btn-success btn-block">Subscribe</button>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</div>-->
		</div>
	</div>
</div>


 <div class="container" id="comment_section">
         	<p class="mb-3">
						Jambo.Thank you for taking your time to read through this post.Take part in the discussions
					</p>
					<?php if (isset($_SESSION['user']['username'])) { ?>
    <form action="single_post.php?post-slug=<?php echo $post  ?>" method="POST" id="commentForm" >
      <div class="form-group">
          <input type="text" class="form-control"  name="comment_text" placeholder="Enter your comment here..." requiired />
          <input type="hidden" class="form-control"  name="post_slug" value="<?php echo $_GET['post-slug']  ?>" />
      </div>
       <button type="submit" name="comment"   class="submit action-button btn btn-primary"/>Post </button>
    </form>
    <ul class="posts">
          <div class="bg-white rounded-3 shadow-sm p-4">

         <h4 class="mb-4"><?php echo count($counts) ?> Comment(s)</h4>

         <!-- Comment #1 //-->
         <div class="">
            <div class="py-3">
                <?php foreach ($postComments as $comment): ?>
                 
               <div class="d-flex comment">
                  <img class="rounded-circle comment-img"
                       src="https://via.placeholder.com/128/fe669e/ffcbde.png?text=A" />
                  <div class="flex-grow-1 ms-3">
                     <div class="mb-1"><a href="#" class="fw-bold link-dark me-1"><?php echo $comment['name'] ?></a> 
                     <!--<span class="text-muted text-nowrap">2 days ago</span>-->
                     
                     </div>
                     <div class="mb-2"><?php echo $comment['message'] ?></div>
                     <!--<div class="hstack align-items-center mb-2">-->
                     <!--   <a class="link-primary me-2" href="#"><i class="zmdi zmdi-thumb-up"></i></a>-->
                     <!--   <span class="me-3 small">55</span>-->
                     <!--   <a class="link-secondary me-4" href="#"><i class="zmdi zmdi-thumb-down"></i></a>-->
                     <!--   <a class="link-secondary small" href="#">REPLY</a>-->
                     <!--   <a class="link-danger small ms-3" href="#">DELETE</a>-->
                     <!--</div>-->
                     <!--<a class="fw-bold d-flex align-items-center" href="#">-->
                     <!--   <i class="zmdi zmdi-chevron-down fs-4 me-3"></i>-->
                     <!--   <span>Hide Replies</span>-->
                     <!--</a>-->
                  </div>
               </div>
               <?php endforeach ?>
            </div>

         
         </div>

      </div>
    </ul>
<?php }else{?>
<div class="alert alert-danger" role="alert">
 Sign in To Comment
</div>
 <?php } ?>
  </div>
  
  
    
<div class="container pt-4 pb-4">

	<h5 class="font-weight-bold spanborder"><span>Read next</span></h5>
	<div class="row">
		<div class="col-lg-6">
			<div class="card border-0 mb-4 box-shadow h-xl-300">
				<div style="background-image: url(<?php echo BASE_URL . '/uploads/posts/' . $randomX['image']; ?>); height: 150px; background-size: cover; background-repeat: no-repeat;">
				</div>
				<div class="card-body px-0 pb-0 d-flex flex-column align-items-start p-4">
					<h2 class="h4 font-weight-bold">
					<a class="text-dark" href="single_post.php?post-slug=<?php echo $randomX['slug']; ?>"><?php echo $randomX['title']; ?>
					</h2>
				
					<div>
						<small class="d-block"><a class="text-muted" href="./author.html">Favid Rick</a></small>
						<small class="text-muted"><?php echo timeago($post["created_at"]) ?> ·</small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="flex-md-row mb-4 box-shadow h-xl-300">
			     <?php foreach ($randomPosts as $post): ?>
				<div class="mb-3 d-flex align-items-center">
					<img height="80" src="<?php echo BASE_URL . 'uploads/posts/' . $post['image']; ?>">
					<div class="pl-3">
						<h2 class="mb-2 h6 font-weight-bold">
						<a class="text-dark" href="single_post.php?post-slug=<?php echo $post['slug']; ?>"><?php echo substr($post['title'],0,60); ?></a>
						</h2>
						<div class="card-text text-muted small">
							<?php echo $post['author']; ?>
						</div>
						<small class="text-muted"><?php echo timeago($post["created_at"]) ?> ·</small>
					</div>
				</div>
				 <?php endforeach ?>
			</div>
		</div>
	</div>
</div>
<!-- End Main -->
    
<!--------------------------------------
FOOTER
--------------------------------------->

<div class="container mt-5">
	
<?php include( ROOT_PATH . '/includes/footer.php'); ?>
</div>
<!-- End Footer -->
    
<!--------------------------------------
JAVASCRIPTS
--------------------------------------->

<script src="static/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="static/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="static/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="static/js/functions.js" type="text/javascript"></script>
<script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
</body>
</html>