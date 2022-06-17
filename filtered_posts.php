<?php include('config.php'); ?>
<?php include('includes/public_functions.php'); ?>

<?php 
	// Get posts under a particular topic
	if (isset($_GET['category'])) {
		$category_id = $_GET['category'];
		$posts = getPublishedPostsByCategory($category_id);
	}
?>
<?php include('includes/head_section.php'); ?>
	<title>EveryMina </title>
</head>
<body>
<div class="container">
<!-- Navbar -->
	<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
<!-- // Navbar -->
<!-- content -->
<div class="content" style="position: relative;top: 100px;">
<section class="recent-posts">
	 <h2 class="content-title">
	 	<h2><span><?php echo getCategoryNameById($category_id); ?></span></h2>
	</h2>
	
	<hr>
	<div class="card-columns listrecent">
	<?php foreach ($posts as $post): ?>
		<!-- begin post -->
		
			<div class="card">
			<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
				<img class="img-fluid" style="height: 30vh;width: 100%;" src="<?php echo BASE_URL . '/uploads/posts/' . $post['image']; ?>" alt="">
			</a>
			<div class="card-block p-2">
				<h2 class="card-title"><a href="single_post.php?post-slug=<?php echo $post['slug']; ?>"><?php echo substr($post['title'],0,60); ?></a></h2>
				<!--<h4 class="card-text"><?php echo substr(html_entity_decode($post['body']),0,70); ?></h4>-->
				<div class="metafooter">
					<div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="#"><img class="author-thumb" src="<?php echo BASE_URL . 'uploads/profileimages/'.$post['published'];  ?>" alt="Sal"></a>
						</span>
						<span class="author-meta">
						<span class="post-name"><a href="#">
						    <?php echo $post['author']; ?>
						</a></span><br/>
						<span class="post-date"><?php echo timeago($post["created_at"]) ?></span><span class="dot"></span><span class="post-read">6 min read</span>
						</span>
						<!--<span class="post-read-more"><a href="#" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>-->
					</div>
				</div>
			</div>
		</div>
	
		<?php endforeach ?>

	
	
	
						</div>
						</section>
	</div>
<!-- // content -->
</div>
						
<!-- // container -->

<!-- Footer -->
	<?php include( ROOT_PATH . '/includes/footer.php'); ?>
<!-- // Footer -->