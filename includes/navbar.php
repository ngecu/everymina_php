
<?php 
	$categories = getAllCategories();
    ?>
<!-- Begin Nav
================================================== -->
   
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
    padding: 0.6rem;
}




.navbar-links li {
    list-style: none;
}

.navbar-links li a {
    display: block;
    text-decoration: none;
    color: black;
    padding: 0.5rem;
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
     color:black;"
}
.navbar span{
    color: red;
    font-size:10px;
    position:relative;
    top:-10%;
}

#hidden-things{
    z-index:1;
    height:100%;
    position: absolute;
        height:100%;
    right: 105%;
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
  right:90%;
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
}



.navbar-links li {
text-align: left !important;
}
.brand-title{
    margin: 0rem !important;
    width:20%;
}
}




#sidebar {
  position:absolute;
  top:5rem;
  right:105%;
  width:200px;
  height:100%;
  background:#151719;
  transition:all 300ms linear;
  z-index:999 
}
#sidebar.active {
  right:0;
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

.navbar span {
    color: red;
    font-size: 10px;
    position: relative;
    top: -24%;
}


</style>

 <nav class="navbar fixed-top navbar-expand-lg">
<div class="container">
        <div class="brand-title">
            
	<a style="display:flex;padding: 0;" class="navbar-brand" href="https://everymina.com/">
	        <img src="../static/images/ll.svg" class="d-inline-block align-top" class="d-inline-block align-top" style="height: 40px;transform: rotate(-00deg);max-height: 1000px !important;"> 
	        <div class="howd">
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

						 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"  data-bs-toggle="dropdown" aria-expanded="false"  aria-expanded="false">
          <i class="fa-solid fa-user"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            	<!--<a class="dropdown-item" href="<?php echo BASE_URL . 'authors.php' ?>"> Authors</a>-->
          	<?php if (isset($_SESSION['user']['username'])) { ?>
			<a class="dropdown-item" href="<?php echo BASE_URL . 'admin/posts.php' ?>"> <?php echo $_SESSION['user']['username'] ?></a>
		<?php	if (strpos($_SERVER['REQUEST_URI'], "admin") !== false){ ?>
		<a class="dropdown-item" href="../logout.php">Logout</a>
        <?php } else { ?>
			<a class="dropdown-item" href="logout.php">Logout</a>
			<?php } ?>
			<?php }else{?>
			<a class="dropdown-item" href="login.php">Login</a>
				<a class="dropdown-item" href="register.php">Register</a>
			 <?php } ?>
			
        </div>
      </li>
            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-magnifying-glass"></i></a></li>
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
