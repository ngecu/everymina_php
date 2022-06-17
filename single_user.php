<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php  include('includes/registration_login.php'); ?>
<?php 


	if (isset($_GET['author'])) {
	    $asda = $_GET['author'];
		$author = getAuthor($_GET['author']);
		$posts = getPostByAuthor($asda); 
	}
	
	if (isset($_GET['edit-admin'])) {
	    $asda = $_GET['edit-admin'];
	    $posts = getPostByAuthor($_GET['edit-admin']); 
	    $author = getAuthor($_GET['edit-admin']);
	    	$categories = getAllCategories();
	}
	


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>EveryMina</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="main-body">
        


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sample Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe
    src="https://drive.google.com/viewerng/viewer?embedded=true&url=<?php echo BASE_URL . 'uploads/articles/'.$author['samplearticle'];  ?>f#toolbar=0&scrollbar=0"
    frameBorder="0"
    scrolling="auto"
    height="100%"
    width="100%"
></iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
    
    
    <div class="modal fade" id="exampleID" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ID Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="<?php echo BASE_URL . 'uploads/idPhotos/'.$author['IDphoto'];  ?>" />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
    
    
    <form class="needs-validation" id="form-wrapper" action="single_user.php?edit-admin=<?php echo $author['id'] ?>"  method="post" enctype="multipart/form-data">
          <div class="row gutters-sm">
              <div class="col-md-12 mb-3">
              <div class="card">
                <div class="card-body">
                    <a  href="/">
	        <img src="../static/images/ll.svg" class="d-inline-block align-top" style="height: 40px;transform: rotate(-00deg);max-height: 1000px !important;"> 
	</a>
	  <?php if (isset($_GET['edit-admin'])) { ?>
              Edit Profile
              
              <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
<a class="btn btn-primary" href="javascript:history.go(-1)">Back</a>
  <button id="submit-btn" type="submit" name="update_data" class="btn btn-secondary">Update</button>
  
  <input type="hidden" class="form-control" value="<?php echo $author['id'] ?>" name="author_id" >

</div>
<?php
}

else { ?>
 My Profile
           <?php include('errors.php'); ?>   
              <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
<a class="btn btn-primary" href="javascript:history.go(-1)">Back</a>

</div>
    
<?php }
?>
              </div>
              </div>
              </div>
              
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                      
                      <!--<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">-->
                    <img src="<?php echo BASE_URL . 'uploads/profileimages/'.$author['profilepic'];  ?>" alt="Admin" class="rounded-circle" width="170" height="170" >
                    <div class="mt-3">
                        
                        <?php if (isset($_GET['edit-admin'])) { ?>
                        <input type="text" class="form-control" value="<?php echo $author['username']; ?>" placeholder="Username..." name="username" required >
                        <?php }
                        
                        else{ ?>
                            <h4><?php echo $author['username'] ?></h4>
                        <?php } ?>
                        
                       
                      
                      <p class="text-secondary mb-1"><?php echo $author['role'] ?></p>
                      <!--<p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>-->
                      <!--<button class="btn btn-primary">Follow</button>-->
                      <!--<button class="btn btn-outline-primary">Message</button>-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      A.Background
                      
                    <!--<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>-->
                 
                    <span class="text-secondary"><?php echo $author['academicbackground'] ?></span>
                  
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      ID No.
                    <!--<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>-->
                    
                    <span class="text-secondary"><?php echo $author['IDNumber'] ?></span>
                    
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      Payment Method
                    <!--<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>-->
                     <?php if (isset($_GET['edit-admin'])) { ?>
                                      <select  class="form-control select2" style="width: 100%;" value="<?php echo $author['paymentmethod'] ?>" name="paymentMethod" required>
                    <option>Mpesa </option>
                    <option>Bank </option>

                    </select>  

                      <?php }
                        
                        else{ ?>
                    <span class="text-secondary"><?php echo $author['paymentmethod'] ?></span>
                    <?php } ?>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      Sample Article
                    <!--<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>-->
                    <span class="text-secondary">
                                <!-- Button trigger modal -->
                                <a class="btn btn-primary" href="uploads/articles/<?php echo $author['samplearticle'] ?>"  download="<?php echo $author['username']; ?>" >View </a>
                                <!--<a class="btn btn-primary" href="download2.php?path=<?php echo BASE_URL . 'uploads/articles/'.$author['samplearticle'];  ?>" download="<?php echo $author['username']; ?>">View</a>-->
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      ID Photo
                    <!--<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>-->
                    <span class="text-secondary">
                         <a class="btn btn-primary" href="uploads/idPhotos/<?php echo $author['IDphoto'] ?>" download="<?php echo $author['username']; ?>">View</a>
                         
                       
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php if (isset($_GET['edit-admin'])) { ?>
                                        <input type="text" class="form-control" placeholder="Real names as per ID or passport..."  name="realname" value="<?php echo $author['realname']; ?>" required/>

                      <?php } 
                      
                      else{
                          echo $author['realname'];
                      }
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                          <?php if (isset($_GET['edit-admin'])) { ?>
                                          <input type="email" class="form-control" placeholder="Email..." name="email" value="<?php echo $author['email'];; ?>" required />
                      <?php } 
                      
                      else{
                          echo $author['email'];
                      }
                      ?>
                   
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php if (isset($_GET['edit-admin'])) { ?>
                         <input type="number" class="form-control" value="<?php echo $author['phone']; ?>" placeholder="Phone .." name="phone" required>
                                            <!--<input type="number" class="form-control" placeholder="Active Phone Number ..." required value="<?php $author['phone']; ?>" name="phone">-->
                      <?php } 
                      
                      else{
                          echo $author['phone'];
                      }
                      ?>
                      
                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php    echo $author['categories']; ?>
                      
                   
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Summary</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                         <?php if (isset($_GET['edit-admin'])) { ?>
                                            <input type="text" class="form-control" placeholder="Summary about yourself..." name="summary" value="<?php echo $author['summary'] ?>" required />
                      <?php } 
                      
                      else{
                          echo $author['summary'];
                      }
                      ?>
                    </div>
                  </div>
                  <hr>
                  <!--<div class="row">-->
                  <!--  <div class="col-sm-12">-->
                  <!--    <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>-->
                  <!--  </div>-->
                  <!--</div>-->
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3" style="min-height: 220px;
max-height: 220px;">
                  <div class="card h-100">
                    <div class="card-body" style="overflow-y: scroll;">
                     <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">My Posts</th>
     
    </tr>
  </thead>
  <tbody style="height: 150px;
overflow-y: scroll;">
      	<?php foreach ($posts as $key => $post): ?>
      	
    <tr>
      <th scope="row">	<?php echo ($key + 1) ?></th>
      <td>	<a 	target="_blank" 
								href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>"><? echo $post['title']; ?> </a> </td>
   
    </tr>
    	<?php endforeach ?>
 
   
  </tbody>
</table>

                    </div>
                  </div>
                </div>
               
              </div>



            </div>
         
          </div>
</form>
        </div>
        
    </div>

<style type="text/css">
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>

<script>

function save_data()
{
	var form_element = document.getElementsByClassName('form_data');

	var form_data = new FormData();

	for(var count = 0; count < form_element.length; count++)
	{
		form_data.append(form_element[count].name, form_element[count].value);
	}

	document.getElementById('submit').disabled = true;

	var ajax_request = new XMLHttpRequest();

	ajax_request.open('POST', 'process_data.php');

	ajax_request.send(form_data);

	ajax_request.onreadystatechange = function()
	{
		if(ajax_request.readyState == 4 && ajax_request.status == 200)
		{
			document.getElementById('submit').disabled = false;

			var response = JSON.parse(ajax_request.responseText);

			if(response.success != '')
			{
				document.getElementById('sample_form').reset();

				document.getElementById('message').innerHTML = response.success;

				setTimeout(function(){

					document.getElementById('message').innerHTML = '';

				}, 5000);

				document.getElementById('name_error').innerHTML = '';

				document.getElementById('email_error').innerHTML = '';

				document.getElementById('website_error').innerHTML = '';
				document.getElementById('comment_error').innerHTML = '';
				document.getElementById('gender_error').innerHTML = '';
			}
			else
			{
				//display validation error
				document.getElementById('name_error').innerHTML = response.name_error;
				document.getElementById('email_error').innerHTML = response.email_error;
				document.getElementById('website_error').innerHTML = response.website_error;
				document.getElementById('comment_error').innerHTML = response.comment_error;
				document.getElementById('gender_error').innerHTML = response.gender_error;
			}

			
		}
	}
}
	

</script>
</body>
</html>