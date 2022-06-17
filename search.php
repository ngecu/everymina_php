
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>

<?php require_once( ROOT_PATH . '/includes/head_section.php');
$allPosts = getAllPosts();
?>

<title>Everymina</title>
</head>

<style>
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
    
<?php
	$query = $_GET['query']; 
	// gets value sent over search form
	
	$min_length = 3;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		$query = mysql_real_escape_string($query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysql_query("SELECT * FROM posts
			WHERE (`title` LIKE '%".$query."%') OR (`body` LIKE '%".$query."%')") or die(mysql_error());
			
		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table
		
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		
		if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysql_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
				echo "<p><h3>".$results['title']."</h3>".$results['text']."</p>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
			
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
?>
</body>
</html>