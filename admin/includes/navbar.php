
<?php 
	$categories = getAllCategories();
    ?>
<!-- Begin Nav
================================================== -->

<!--<nav class="navbar navbar-expand-lg navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation" style="padding-bottom:0;border-bottom:solid #ff5722 5px !important;" >-->



<!--<button type="button" class="navbar-toggler ml-auto hidden-sm-up float-xs-right" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--     <span class="navbar-toggler-icon"></span>-->
    
<!--</button>-->

  <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
  <!--          <span class="navbar-toggler-icon"></span>-->
  <!--      </button>-->
  


<!--   <button class="navbar-toggler" onclick="myFunction()" type="button">-->
<!--      <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
    
     
<!--<div class="container">-->
	
	

<!--	<a style="display:flex;padding: 0;" class="navbar-brand" href="https://everymina.com/">-->
<!--	        <img src="static/images/k.svg" class="d-inline-block align-top" class="d-inline-block align-top" style="height: 60px;transform: rotate(-40deg);width: 90px;max-height: 1000px !important;"> -->
<!--	        <div>-->
<!--	            	<h4 class="sitetitle" style="font-family:Righteous; /*! padding:5px 0px; */text-decoration:underline;margin: 0;position: relative;left: -25%;top: 10px;">EveryMina.com</h4> -->

<!--	<span style="color: red;font-size:10px;position: relative;left: -20%;">The Information Reality</span>-->
<!--	        </div>-->

<!--	</a>-->


<!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--    <span class="navbar-toggler-icon"></span>-->
<!--  </button>-->


	
<!--	<div class="collapse navbar-collapse" id="navbarSupportedContent" >-->

<!--		<ul class="navbar-nav ml-auto">-->
<!--		<li class="nav-item">-->
<!--		    	<a class="nav-link" href="/">Home</a>-->
<!--		   </li>-->
	
	
<!--			<?php foreach ($categories as $category): ?>-->
<!--				<li class="nav-item">-->
				    
<!--						<a class="nav-link" href="<?php echo BASE_URL . 'filtered_posts.php?category='.$category['id'] ?>"><?php echo $category['name']; ?></a></li>-->
					
<!--						<?php endforeach ?>-->
						
<!--						 <li class="nav-item dropdown">-->
<!--        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  data-bs-toggle="dropdown" aria-expanded="false"  aria-expanded="false">-->
<!--          <i class="fa-solid fa-user"></i>-->
<!--        </a>-->
<!--        <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--          	<?php if (isset($_SESSION['user']['username'])) { ?>-->
<!--			<a class="dropdown-item" href="<?php echo BASE_URL . 'admin/posts.php' ?>"> <?php echo $_SESSION['user']['username'] ?></a>-->
<!--			<a class="dropdown-item" href="logout.php">Logout</a>-->
<!--			<?php }else{?>-->
<!--			<a class="dropdown-item" href="login.php">Login</a>-->
<!--				<a class="dropdown-item" href="register.php">Register</a>-->
<!--			 <?php } ?>-->
			
<!--        </div>-->
<!--      </li>-->

		
<!--		</ul>-->
		 
		 
<!--		<form class="form-inline my-2 my-lg-0" action="index.php">-->
<!--			<input class="form-control mr-sm-2 search-box" oninput=search(this.value) type="text" name="keyword" placeholder="Search">-->
<!--		<span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>-->
<!--		</form>-->

<!--<form action="includes/searchdb.php" method="post">-->
<!--		<input-->
<!--			type="text"-->
<!--			placeholder="Enter your search term"-->
<!--			name="search"-->
<!--			required>-->
<!--		<button type="submit" name="submit">Search</button>-->
<!--	</form>-->
		
	
<!--	</div>-->
<!--</div>-->
<!--</nav>-->


<style>
    
    
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    color: black;
    border-bottom: red solid 8px;
}

.brand-title {
    font-size: 1.5rem;
    margin: .5rem;
}

.navbar-links {
    height: 100%;
}

.navbar-links ul {
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar ul {
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar li{
    list-style:none;
}

.navbar li a {
    display: block;
    text-decoration: none;
    color: black;
    padding: 1rem;
}




.navbar-links li {
    list-style: none;
}

.navbar-links li a {
    display: block;
    text-decoration: none;
    color: black;
    padding: 1rem;
}



.toggle-button {
    position: absolute;
    right: 1rem;
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 21px;
}

.toggle-button .bar {
    height: 3px;
    width: 100%;
    background-color: black;
    border-radius: 10px;
}
.hidden-things{
    
}

@media (max-width: 800px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .toggle-button {
        display: flex;
    }

    .navbar-links {
        display: none;
        width: 100%;
    }

    .navbar-links ul {
        width: 100%;
        flex-direction: column;
    }

    .navbar-links ul li {
        text-align: center;
    }

    .navbar-links ul li a {
        padding: .5rem 1rem;
    }

    .navbar-links.active {
        display: flex;
    }

}
.navbar h4{
     font-family:Righteous; 
     text-decoration:underline;
     margin: 0;
     position: relative;
     left: -25%;
     top: 10px;
     color:black;"
}
.navbar span{
    color: red;
    font-size:10px;
    position: relative;
    left: -20%;"
}


















#hidden-things{
    z-index:1;
    height:100%;
    position: absolute;
        height:100%;
    left: 105%;
    padding: 0;
      transition:all 300ms linear;
}
  #hidden-things ul {
    display: flex;
    flex-direction: column;
    

    flex-direction: column;
    background:#151719;

}


#hidden-things .active {
  left:90%;
}


#hidden-things li {
text-align: left !important;
list-style:none;
}


@media only screen and (max-width: 600px) {
    
    .navbar ul {
    display: flex;
    margin: 0;
    position: relative;
    left: -10%;
    padding:0;
}

.navbar img{
    height: 50px;
transform: rotate(-40deg);
width: 90px;
max-height: 1000px !important;
}

.navbar h4{
    font-size: 1rem;
    position: relative;
    left: -40%;
    top: 10px;
    padding-bottom: 0;
}

.navbar .howd{
    position: relative;
top: 3px;
}

.navbar span{
    position: relative;
    left: -40%;
    top: 0;

}

.navbar-links li {
text-align: left !important;
}
.brand-title{
    margin: 0rem !important;
}
}




#sidebar {
  position:absolute;
  top:5rem;
  left:-200px;
  width:200px;
  height:100%;
  background:#151719;
  transition:all 300ms linear;
  z-index:999 
}
#sidebar.active {
  left:0;
}

#sidebar div.list div.item {
  padding:15px 10px;
  border-bottom:1px solid #444;
  color:#fcfcfc;
  text-transform:uppercase;
  font-size:12px;
}

#sidebar div.list div.item a{
  color:#fcfcfc;
  text-decoration: none;
}

..navbar .container{
    padding:0 !important;
}


</style>



 <nav class="navbar fixed-top navbar-expand-lg">
     <div class="container" style="padding: 0 !important;margin: 0 auto !important;border: 0 !important; ">
        <div class="brand-title">
            
	<a style="display:flex;padding: 0;" class="navbar-brand" href="https://everymina.com/">
	         <img src="https://everymina.com/static/images/ll.svg" class="d-inline-block align-top" class="d-inline-block align-top" style="height: 40px;transform: rotate(-00deg);max-height: 1000px !important;"> 
	            	<h4 class="sitetitle">EveryMina.com</h4> 

	<span>The Information Reality</span>
	        </div>

	</a>

            
        </div>
        <a href="#" class="toggle-button" onclick="toggleSidebar(this)">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
              	<li class="nav-item">
		    	<a class="nav-link" href="/">Home</a>
		   </li>
           	<?php foreach ($categories as $category): ?>
				<li class="nav-item">
				    
						<a class="nav-link" href="<?php echo BASE_URL . 'filtered_posts.php?category='.$category['id'] ?>"><?php echo $category['name']; ?></a></li>
					
						<?php endforeach ?>
          </ul>
        </div>
        
       
          <ul>
   <!--            <li class="nav-item dropdown">-->
   <!--     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  data-bs-toggle="dropdown" aria-expanded="false"  aria-expanded="false">-->
   <!--       <i class="fa-solid fa-user"></i>-->
   <!--     </a>-->
   <!--     <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
   <!--       	<?php if (isset($_SESSION['user']['username'])) { ?>-->
			<!--<a class="dropdown-item" href="<?php echo BASE_URL . 'admin/posts.php' ?>"> <?php echo $_SESSION['user']['username'] ?></a>-->
			<!--<a class="dropdown-item" href="logout.php">Logout</a>-->
			<!--<?php }else{?>-->
			<!--<a class="dropdown-item" href="login.php">Login</a>-->
			<!--	<a class="dropdown-item" href="register.php">Register</a>-->
			<!-- <?php } ?>-->
			
   <!--     </div>-->
   <!--   </li>-->
      
<!--      <li data-toggle="modal" data-target="#exampleModalCenter">-->
<!--          <a href="#">-->
<!--        <i class="fa-solid fa-user"></i>-->
<!--        </a>-->
<!--</li>-->


						 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  data-bs-toggle="dropdown" aria-expanded="false"  aria-expanded="false">
          <i class="fa-solid fa-user"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          	<?php if (isset($_SESSION['user']['username'])) { ?>
			<a class="dropdown-item" href="<?php echo BASE_URL . 'admin/posts.php' ?>"> <?php echo $_SESSION['user']['username'] ?></a>
			<a class="dropdown-item" href="../logout.php">Logout</a>
			<?php }else{?>
			<a class="dropdown-item" href="login.php">Login</a>
				<a class="dropdown-item" href="../register.php">Register</a>
			 <?php } ?>
			
        </div>
      </li>
            <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></li>
          </ul>
        </div>

      </nav>



<div id="sidebar">
    <div class="list">
        
        <div class="item"><a href="/">
     HOME
      </a></div>
      
    			<?php foreach ($categories as $category): ?>
      <div class="item"><a href="<?php echo BASE_URL . 'filtered_posts.php?category='.$category['id'] ?>">
     <?php echo $category['name']; ?>
      </a></div>
      <?php endforeach ?>
      
					
      
      
      
    </div>
  </div>
<script>


function toggleSidebar(ref){
    var x = document.getElementById("sidebar");
  document.getElementById("sidebar").classList.toggle('active');
  if(x.classList.contains('active')){
      document.body.style.overflowY = "hidden";
  }

  
}






</script>

<!-- End Nav
================================================== -->
