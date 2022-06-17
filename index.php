<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>
<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts();
$allPosts = getAllPosts();
$randomPosts = getRandomPosts();
$randomX = getRandomPosts()[0];
$trendingPosts = getTrendingPosts();
$headlinePost = getHeadlinePost;

		$categories = getAllCategories();
		
		
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

 ?>

<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>


<title>Everymina</title>
<!--<meta name="propeller" content="25c35da4b3bf763ff23b824ed74c5ed8">-->

</head>



<style>

/* Progress bar */
#progress-bar {
  --scrollAmount: 0%;
  
  background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
  width: var(--scrollAmount);

  /*  background: linear-gradient(to right, #F24E1E var(--scrollAmount), transparent 0);
  width: 100%; */
  
  height: 25px;
  position: fixed;
  top: 0;
}



.card-columns{
    column-count: 1 !important;
}
    .flipdown{width:100% !important}
    
    .news {
  box-shadow: inset 0 -15px 30px rgba(0,0,0,0.4), 0 5px 10px rgba(0,0,0,0.5);
  width: 350px;
  height: 30px;
  margin: 20px auto;
  overflow: hidden;
  border-radius: 4px;
  padding: 3px;
  -webkit-user-select: none
} 
.full-width{
    width: 100%;
}
.news span {
  float: left;
  color: #fff;
  padding: 6px;
  position: relative;
  top: 1%;
  border-radius: 4px;
  box-shadow: inset 0 -15px 30px rgba(0,0,0,0.4);
  font: 16px 'Source Sans Pro', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -webkit-user-select: none;
  cursor: pointer
}

.news ul {
  float: left;
  padding-left: 20px;
  animation: ticker 10s cubic-bezier(1, 0, .5, 0) infinite;
  -webkit-user-select: none
}

.news ul li {line-height: 30px; list-style: none }

.news ul li a {
  color: #fff;
  text-decoration: none;
  font: 14px Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -webkit-user-select: none
}

@keyframes ticker {
	0%   {margin-top: 0}
	25%  {margin-top: -30px}
	50%  {margin-top: -60px}
	75%  {margin-top: -90px}
	100% {margin-top: 0}
}

/* OTHER COLORS */
.blue { background: #347fd0 }
.blue span { background: #2c66be }
.red { background: #d23435 }
.red span { background: #c22b2c }
.green { background: #699B67 }
.green span { background: #547d52 }
.magenta { background: #b63ace }
.magenta span { background: #842696 }
.yellow {background : yellow}
.yellow span {background : yellow}

#grid {
  display: grid;
  grid-template-rows: repeat(4, 1fr);
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}
#grid > div {
  background-color: hotpink;
  color: white;
  font-size: 4vw;
  padding: 10px;
}

  #grid > div:nth-child(1) {
  grid-row: span 2;
}
   #grid > div:nth-child(2) {
  grid-row: span 2;
}
  
    #grid > div:nth-child(4) {
  grid-row: span 2;
}
   #grid > div:nth-child(5) {
  grid-row: span 2;
}
#grid > div:nth-child(3) {
  grid-row: span 4;
}

.pop_imgage{
    width:100%;
}


#countdown li {
  display: inline-block;
  list-style-type: none;
  padding: 1em;
  text-transform: uppercase;
}


li span {
display: block;
font-size: 1.5rem;
font-weight: bolder;
text-align: center;
}

.emoji {
  display: none;
  padding: 1rem;
}

.emoji span {
  font-size: 4rem;
  padding: 0 .5rem;
}

@media all and (max-width: 768px) {
  h1 {
    font-size: calc(1.5rem * var(--smaller));
  }
  
  li {
    font-size: calc(1.125rem * var(--smaller));
  }
  
  li span {
    font-size: calc(3.375rem * var(--smaller));
  }
}


/*@media (min-width: 768px) {*/
/*   .pop_imgage{*/
/*     width:100%;*/
/*    height:100%;*/
/*    position:relative;*/
/*    top:0;*/
/*}*/
/*} */
/*@media (min-width: 992px) {*/
/*     .pop_imgage{*/
/*     width:100%;*/
/*    height:100%;*/
/*    position:relative;*/
/*    top:0;*/
/*}*/
/*} */
/*@media (min-width: 1200px) {*/
/*     .pop_imgage{*/
/*    width:100%;*/
/*    height:100%;*/
/*    position:relative;*/
/*    top:0;*/
/*}*/
/*}*/

  <style>
  @use postcss-mixins;
@use postcss-nested;
@use postcss-simple-vars;
@define-mixin atMedium {
  @media (min-width: 600px) {
    @mixin-content;
  }
}

@define-mixin atLarge {
  @media (min-width: 900px) {
    @mixin-content;
  }
}

* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: "Open Sans";
}

body {
  background-color: #555;
}

.content-wrapper {
  margin: 0 auto;
  max-width: 1200px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-flow: row wrap;
          flex-flow: row wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  padding: 0.5rem;
}

.news-card {
  border: 0px solid aqua;
  margin: 0.5rem;
  position: relative;
  height: 12rem;
  overflow: hidden;
  border-radius: 0.5rem;
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  min-width: 290px;
  -webkit-box-shadow: 0 0 1rem rgba(0, 0, 0, 0.5);
          box-shadow: 0 0 1rem rgba(0, 0, 0, 0.5);
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
}

.news-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0) -webkit-gradient(linear, left top, left bottom, color-stop(50%, rgba(0, 0, 0, 0)), color-stop(80%, rgba(0, 0, 0, 0.7)));
  background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.7) 80%);
  z-index: 0;
}

.news-card__card-link {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  /*     background: rgba(255,0,0,.5); */
}

.news-card__image {
  width: 100%;
  height: 100%;
  display: block;
  -o-object-fit: cover;
     object-fit: cover;
  -webkit-transition: -webkit-transform 3s ease;
  transition: -webkit-transform 3s ease;
  transition: transform 3s ease;
  transition: transform 3s ease, -webkit-transform 3s ease;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  position: relative;
  z-index: -1;
}

.news-card__text-wrapper {
  position: absolute;
  bottom: 0rem;
  padding: 1rem;
  color: white;
  /*     background-color: rgba(0, 0, 0, 0.4); */
  -webkit-transition: background-color 1.5s ease;
  transition: background-color 1.5s ease;
}

.news-card__title {
  -webkit-transition: color 1s ease;
  transition: color 1s ease;
  margin-bottom: .5rem;
}

.news-card__post-date {
  font-size: .7rem;
  margin-bottom: .5rem;
  color: #CCC;
}

.news-card__details-wrapper {
  max-height: 0;
  opacity: 0;
  -webkit-transition: max-height 1.5s ease, opacity 1s ease;
  transition: max-height 1.5s ease, opacity 1s ease;
}

.news-card__excerpt {
  font-weight: 300;
}

.news-card__read-more {
  background: black;
  color: #bbb;
  display: block;
  padding: 0.4rem 0.6rem;
  border-radius: 0.3rem;
  margin-top: 1rem;
  border: 1px solid #444;
  font-size: 0.8rem;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  text-decoration: none;
  width: 7rem;
  margin-left: auto;
  position: relative;
  z-index: 5;
}

.news-card__read-more i {
  position: relative;
  left: 0.2rem;
  color: #888;
  -webkit-transition: left 0.5s ease, color 0.6s ease;
  transition: left 0.5s ease, color 0.6s ease;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.news-card__read-more:hover i {
  left: 0.5rem;
  color: yellow;
}
/*# sourceMappingURL=x.css.map */


.ticker-wrapper-h{
	display: flex;	
	position: relative;
	overflow: hidden;
	border: 0;
	margin: 1% 0;
}

.ticker-wrapper-h .heading{
	background-color: red;
	color: #fff;
	padding: 5px 10px;
	flex: 0 0 auto;
	z-index: 1000;
}
.ticker-wrapper-h .heading:after{
	content: "";
	position: absolute;
	top: 0;
	border-left: 20px solid red;
	border-top: 17px solid transparent;
	border-bottom: 15px solid transparent;
}


.news-ticker-h{
	display: flex;
	margin:0;
	padding: 0;
	padding-left: 90%;
	z-index: 999;
	
	animation-iteration-count: infinite;
	animation-timing-function: linear;
	animation-name: tic-h;
	animation-duration: 240s;
	
}
.news-ticker-h:hover { 
	animation-play-state: paused; 
}

.news-ticker-h li{
	display: flex;
	width: 100%;
	align-items: center;
	white-space: nowrap;
	padding-left: 20px;
}

.news-ticker-h li a{
	color: #212529;
	font-weight: bold;
}

@keyframes tic-h {
	0% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
		visibility: visible;
	}
	100% {
		-webkit-transform: translate3d(-100%, 0, 0);
		transform: translate3d(-100%, 0, 0);
	}
}
.mainheading{
    background:white;
}

#pop-smoke{
    height:150px;
    width:150px;
}
#xxx{
height: 10vh;width: 100%;
}
@media only screen and (max-width: 600px) {
    
    #xxx{
        height:30vh !important;
    }
    
    #pop-smoke{
    height:50px;
    width:50px;
}
    
    
}
</style>
</style>

<body style="overflow-x:hidden;">

 <div class="container">
     


	<?php include('includes/navbar.php'); ?>
	
	
	




	<!-- Begin Site Title
================================================== -->


	<div class="mainheading">
	    	<div class="container">
	    <div class="ticker-wrapper-h">
	<div class="heading">Trending Now</div>
	
	<ul class="news-ticker-h">
	    	    <?php foreach ($allPosts as $post): ?>
		<li><a href="single_post.php?post-slug=<?php echo $post['slug']; ?>"><?php echo $post['title']; ?></a></li>

		  	<?php endforeach ?>
	</ul>
</div>

<!--
				  <div class="row">
					  <div class="col-md-6 col-xs-12">
<img class="pop_imgage" src="https://www.citizen.digital/_nuxt/img/election-countdown.80a1993.png
"/>


					  </div>

					  <div class="col-md-6 col-xs-12">
					        <div id="countdown">
    <ul>
      <li><span id="days"></span>Dys</li>:
      <li><span id="hours"></span>Hrs</li>:
      <li><span id="minutes"></span>Mins</li>:
      <li><span id="seconds"></span>Secs</li>:
    </ul>
  </div>
						  	<!--<div id="flipdown" class="flipdown"></div>-->
					  </div>
				  </div>
				  
	
	</div>
		</div>
	<!--<h3>Highlights</h3>-->
		<!-- End Site Title
================================================== -->

<!-- counter start
================================================== -->

	<section>
	    	<div class="container main-news section">
	    	      <div id="progress-bar"></div>
				<div class="row">
					<div class="col-sm-12 col-md-6 col-xs-12 col-lg-6">
					    
<!--					      <div class="row">-->
<!--      <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">-->
          
<!--          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">-->
<!--  <div class="carousel-inner">-->
      
<!--    <div class="carousel-item active">-->
        
<!--         <div class="news-card">-->
<!--      <a href="#" class="news-card__card-link"></a>-->
    
<!--      <img src="static/images/ll.svg" alt=""  class="news-card__image">-->
<!--      <div class="news-card__text-wrapper">-->
<!--        <h6  style="color:white" class="news-card__title"> Everymina</h6>-->
<!--        <div class="news-card__post-date">Now</div>-->
<!--        <div class="news-card__details-wrapper">-->
<!--          <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>-->
<!--          <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
    
        
        
        
     
<!--    </div>-->
<!--      <?php foreach ($allPosts as $post): ?>-->
<!--    <div class="carousel-item">-->
<!--          <div class="news-card">-->
<!--      <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>" class="news-card__card-link"></a>-->
<!--      <img src="<?php echo BASE_URL . 'uploads/posts/' . $post['image']; ?>" alt="" class="news-card__image">-->
<!--      <div class="news-card__text-wrapper">-->
<!--        <h6 class="news-card__title text-light" style="color"><?php echo substr($post['title'],0,60); ?></h6>-->
<!--        <div class="news-card__post-date"><?php echo timeago($post["created_at"]) ?></div>-->
<!--        <div class="news-card__details-wrapper">-->
<!--          <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>-->
<!--          <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--    </div>-->
<!--       	<?php endforeach ?>-->

<!--  </div>-->
<!--</div>-->

          
          
			
<!--      </div>-->
<!--      <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">-->
<!--          			      <div class="news-card">-->
<!--      <a href="single_post.php?post-slug=<?php echo $randomX['slug']; ?>" class="news-card__card-link" class="news-card__card-link"></a>-->
<!--      <img src="<?php echo BASE_URL . 'uploads/posts/' . $randomX['image']; ?>" alt="" class="news-card__image">-->
<!--      <div class="news-card__text-wrapper">-->
<!--        <h6 class="news-card__title text-light"><?php echo $randomX['title'] ?></h6>-->
<!--        <div class="news-card__post-date"><?php echo timeago($randomX["created_at"]) ?></div>-->
<!--        <div class="news-card__details-wrapper">-->
<!--          <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>-->
<!--          <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--      </div>-->
<!--  </div>-->

					      <div class="news-card" style="height:100%">
      <a href="single_post.php?post-slug=<?php echo $trendingPosts[0]['slug']; ?>" class="news-card__card-link text-light"></a>
      <img src="<?php echo BASE_URL . 'uploads/posts/' . $trendingPosts[0]['image']; ?>" alt="" class="news-card__image" style="max-height:400px">
      <div class="news-card__text-wrapper">
        <h6 class="news-card__title text-light"><?php echo substr($trendingPosts[0]['title'],0,60); ?></h6>
        <div class="news-card__post-date">
           <?php echo timeago($trendingPosts[0]["created_at"]) ?>
        </div>
        <div class="news-card__details-wrapper">
          <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>
          <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
      </div>
    </div>
   
						
					</div>
					<div class="col-sm-12 col-md-6 col-xs-12 col-lg-6">
						<div class="row">
						    <?php foreach ($trendingPosts as $post): ?>
							<div class="col-md-6 col-sm-12 col-xs-12 col-lg-6">
							    
							      <div class="news-card">
      <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>" class="news-card__card-link text-light"></a>
      <img src="<?php echo BASE_URL . 'uploads/posts/' . $post['image']; ?>" alt="" class="news-card__image">
      <div class="news-card__text-wrapper">
        <h6 class="news-card__title text-light"><?php echo substr($post['title'],0,60); ?></h6>
        <div class="news-card__post-date">
           <?php echo timeago($post["created_at"]) ?>
        </div>
        <div class="news-card__details-wrapper">
          <p class="news-card__excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur nemo tempore repellat? Ullam sed officia iure architecto deserunt distinctio, pariatur&hellip;</p>
          <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
      </div>
    </div>
							</div>
<?php endforeach ?>
					
							
						
							
						
						</div>
					</div>
				</div>
			</div>
	</section>
	
	
<section>
    	<div class="container section mt-4">
				<div class="section-title">
					<span>Refresh</span>
				</div>
				<div class="row">
				    
				      <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
          
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
      
    <div class="carousel-item active">
        
         <div class="news-card">
      <a href="#" class="news-card__card-link"></a>
    
      <img src="static/images/ll.svg" alt=""  class="news-card__image">
      <div class="news-card__text-wrapper">
        <h6  style="color:white" class="news-card__title"> Everymina</h6>
        <div class="news-card__post-date">Now</div>
        <div class="news-card__details-wrapper">
          <p class="news-card__excerpt">Latest breaking news is now here for you</p>
          <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
      </div>
    </div>
    
        
        
        
     
    </div>
      <?php foreach ($allPosts as $post): ?>
    <div class="carousel-item">
          <div class="news-card">
      <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>" class="news-card__card-link"></a>
      <img src="<?php echo BASE_URL . 'uploads/posts/' . $post['image']; ?>" alt="" class="news-card__image">
      <div class="news-card__text-wrapper">
        <h6 class="news-card__title text-light" style="color"><?php echo substr($post['title'],0,60); ?></h6>
        <div class="news-card__post-date"><?php echo timeago($post["created_at"]) ?></div>
        <div class="news-card__details-wrapper">
          <p class="news-card__excerpt">Latest breaking news is now here for you</p>
          <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
      </div>
    </div>
    </div>
       	<?php endforeach ?>

  </div>
</div>

          
          
			
      </div>
				    
				         <?php foreach ($randomPosts as $post): ?>
				         
				       <div class="col-sm-12 col-xs-12 col-md-3 col-lg-3">
			      <div class="news-card">
      <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>" class="news-card__card-link" class="news-card__card-link"></a>
      <img src="<?php echo BASE_URL . 'uploads/posts/' . $post['image']; ?>" alt="" class="news-card__image">
      <div class="news-card__text-wrapper">
        <h6 class="news-card__title text-light" style="color:white"><?php echo substr($post['title'],0,60); ?></h6>
        <div class="news-card__post-date"> <?php echo timeago($post["created_at"]) ?> </div>
        <div class="news-card__details-wrapper">
          <p class="news-card__excerpt">Latest breaking news is now here for you</p>
          <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
      </div>
    </div>
      </div>
      <?php endforeach ?>
  
				</div>
			</div>
    
    
    
    
    
</section>


       
		<?php foreach ($categories as $category): ?>
		<?php 
		
		$allpostcategory = array_reverse(getPublishedPostsByCategory($category['id']));
		
		$postsspec = $allpostcategory	?>
<section class="recent-posts p-2" style="overflow-x:hidden">
      <div class="container">
	<div class="section-title">
	    
		<h2><span><?php echo $category['name']?></span>
		    	<a href="<?php echo BASE_URL . 'filtered_posts.php?category='.$category['id'] ?>" class="float-right"> <span> More <i class="fa-solid fa-angles-right"></i> </span> </a>
		</h2>
		
	
	</div>
	
	
	<div class="card-columns listrecent">
	    <div class="row">
	        <?php foreach ($postsspec as $post):
	        
	        if(empty($post['image'])){
	            $post['image'] = "ll.svg";
	        }
	        ?>
	        	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4 mb-3 d-flex align-items-center">
					<img id="pop-smoke" src="<?php echo BASE_URL . 'uploads/posts/' . $post['image']; ?>" style="border-radius: 0.5rem;">
					<div class="pl-3">
						<small class="mb-2  font-weight-bold">
						<a class="text-dark" href="single_post.php?post-slug=<?php echo $post['slug']; ?>"><?php echo ucfirst(strtolower($post['title'])); ?></a>
						</small>
						<br/>
							<span class="meta-footer-thumb">
						
						
						
						<!--<a href="#"><img class="author-thumb" src="<?php echo BASE_URL . 'uploads/profileimages/'.$post['published'];  ?>" alt="Sal"></a>-->
						
						
						
						
						</span>
						
							<small class="mb-2  font-weight-bold" >
					<?php echo $post['author']; ?>
						</small>
						<!--<div class="card-text text-muted small">-->
						<!--	<?php echo $post['author']; ?>-->
						<!--</div>-->
						<br/>
						<small class="text-muted"><?php echo timeago($post["created_at"]) ?> <?php echo viewPostCount($post['slug']) ?> View(s)</small>
					</div>
				</div>
  <!--  <div class="col-md-2  col-12">-->
        
    
		<!-- begin post -->
		<!--<div class="card">-->
		<!--	<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">-->
		<!--		<img class="img-fluid" id="xxx" src="<?php echo BASE_URL . 'uploads/posts/' . $post['image']; ?>" alt="">-->
		<!--	</a>-->
		<!--	<div class="card-block p-2">-->
		<!--		<h5 class="card-title"><a href="single_post.php?post-slug=<?php echo $post['slug']; ?>"><?php echo substr($post['title'],0,30); ?>...</a></h5>-->
		<!--		<h4 class="card-text" style="color: rgba(0,0,0,.44) !important;font-size: 0.55rem !important;-->
  <!--  line-height: 1.4 !important;font-weight: 400 !important;"><?php echo substr(html_entity_decode($post['body']),0,70); ?></h4>-->
				<!--<div class="metafooter">-->
				<!--	<div class="wrapfooter">-->
				<!--		<span class="meta-footer-thumb">-->
				<!--		<a href="#"><img class="author-thumb" src="<?php echo BASE_URL . 'uploads/profileimages/'.$post['published'];  ?>" alt="Sal"></a>-->
				<!--		</span>-->
				<!--		<span class="author-meta">-->
				<!--		<span class="post-name"><a href="#"><?php echo $post['author']; ?></a></span><br/>-->
				<!--		<span class="post-date">-->
				<!--		    <?php echo timeago($post["created_at"]) ?>-->
						
				<!--		    </span><span class="dot"></span><span class="<?php echo 'badge badge-pill badge-'.$category['color']?> "><?php echo $category['name']?></span>-->
				<!--		</span>-->
				<!--		<span class="post-read-more"><a href="#" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>-->
				<!--	</div>-->
				<!--</div>-->
		<!--	</div>-->
		<!--</div>-->
		
  <!--  </div>-->
    	<?php endforeach ?>
    
</div>

	

	</div>
		</div>
	</section>
	
	<script>
	    let processScroll = () => {
  let docElem = document.documentElement, 
    docBody = document.body,
    scrollTop = docElem['scrollTop'] || docBody['scrollTop'],
      scrollBottom = (docElem['scrollHeight'] || docBody['scrollHeight']) - window.innerHeight,
    scrollPercent = scrollTop / scrollBottom * 100 + '%';
  
  // console.log(scrollTop + ' / ' + scrollBottom + ' / ' + scrollPercent);
  
    document.getElementById("progress-bar").style.setProperty("--scrollAmount", scrollPercent); 
}

document.addEventListener('scroll', processScroll);
	</script>
	
		<?php endforeach ?>

<script>
    (function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

  //I'm adding this section so I don't have to keep updating this pen every year :-)
  //remove this if you don't need it
  let today = new Date(),
      dd = String(today.getDate()).padStart(2, "0"),
      mm = String(today.getMonth() + 1).padStart(2, "0"),
      yyyy = today.getFullYear(),
      nextYear = yyyy + 1,
      dayMonth = "09/30/",
      birthday = dayMonth + yyyy;
  
  today = mm + "/" + dd + "/" + yyyy;
  if (today > birthday) {
    birthday = dayMonth + nextYear;
  }
  //end
  
  const countDown = new Date("August 09,2022  00:00:00").getTime(),
      x = setInterval(function() {    

        const now = new Date().getTime(),
              distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
          document.getElementById("headline").innerText = "It's my birthday!";
          document.getElementById("countdown").style.display = "none";
          document.getElementById("content").style.display = "block";
          clearInterval(x);
        }
        //seconds
      }, 0)
  }());
  
  
  //(function(s,u,z,p){s.src=u,s.setAttribute('data-zone',z),p.appendChild(s);})(document.createElement('script'),'https://inklinkor.com/tag.min.js',5071269,document.body||document.documentElement)

</script>



	<!-- End List Posts
	================================================== -->
	<div class="container">
	 	<?php include( ROOT_PATH . '/includes/footer.php'); ?>   
	</div>
