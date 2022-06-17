<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>

<!-- Source code for handling registration and login -->
<?php  include('includes/registration_login.php'); ?>

<?php 
	$categories = getAllCategories();
    ?>


<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="A multi-step form is a long-form broken down into multiple pieces/steps to make an otherwise long form less intimidating for visitors to complete." name="description">
    <meta content="Sam Norton" name="author">
    <title>Everymina</title>
    <!-- FAVICONS -->
    <link rel="icon" href="static/images/ll.svg">
    <!-- CSS -->
   
    <link href="static/css/regstyle.css" rel="stylesheet">
    <!-- FONT -->
    <link href="https://fonts.gstatic.com/" rel="preconnect">
    <link href="static/css/css2.css" rel="stylesheet">
      <link href="static/css/regbootstrap.css" rel="stylesheet">
</head>
<body>
    <!-- CONTAINER -->
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row g-0 justify-content-center">
            <!-- TITLE -->
            <div class="col-lg-4 offset-lg-1 mx-0 px-0">
                <div id="title-container">
                    <a href="/">
                    <img class="covid-image" src="static/images/ll.svg">
                    </a>
                    <a href="/">
                    <h2>EveryMina</h2>
                    </a>
                    <h3>Self Register Form</h3>
                    <p>A guidance assessment multi-step form that will 
assist indivduals on registering with us.Feel welcomed and answer all fields</p>
                </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
                </div>
                <div id="qbox-container">
                    <form class="needs-validation" id="form-wrapper" action="register.php" method="post" enctype="multipart/form-data">
                                   
                        <div id="steps">
                            <div class="step d-block">
                                 <?php include('errors.php'); ?>
                                <h4>Which Role are you registering for?</h4>
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                          <select class="form-control select2" id="role-select" style="width: 100%;" value="<?php echo $role; ?>" name="role" required>
                                                    <option value="none" selected="selected">None</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Author">Author</option>
                                                    <option value="Support">Support</option>
                                                    <option value="Writer">Writer</option>
                  </select> 


                                        <!--<input class="form-check-input question__input" id="q_1_yes" name="q_1" type="radio" value="Yes"> -->
                                        <!--<label class="form-check-label question__label" for="q_1_yes">Yes</label>-->
                                    </div>
                                    <!--<div class="q-box__question">-->
                                    <!--    <input checked="checked" class="form-check-input question__input" id="q_1_no" name="q_1" type="radio" value="No"> -->
                                    <!--    <label class="form-check-label question__label" for="q_1_no">No</label>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="step">
                                <h4>Tell us more about yourself</h4>
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                       
                <label>Academic Background</label>
                <select class="form-control select2" style="width: 100%;" value="<?php echo $academicBackground; ?>" name="academicBackground" required>
                    <option value="none" selected="selected">None</option>
                    <option value="College">College</option>
                    <option value="Degree">Degree</option>
                    <option value="Masters">Masters</option>
                    <option value="PHD">PHD</option>
                   
                  </select> 
                  <label for="">ID Photo</label>
                  <input type="file" name="idphoto" value="<?php echo $idphoto; ?>"  id="profileIage" class="form-control" required>
                  <label for="">ID No</label>
                  <input type="number" class="form-control" value="<?php echo $IDNo; ?>" placeholder="ID Number .." name="IDNo" required>
                  <label for="">Payment Method</label>
                  <select  class="form-control select2" style="width: 100%;" name="paymentMethod" required>
                    <option>Mpesa </option>
                    <option>Bank </option>

                    </select>  
<label for="">Phone Number</label>
                    <input type="number" class="form-control" placeholder="Active Phone Number ..." required value="<?php echo $phone; ?>" name="phone">
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="step">
                                <h4>Tell us more about yourself</h4>
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                      <label for="">Sample Article</label>
                <input type="file" class="form-control" id="exampleInputFile" value="<?php echo $articlesample; ?>" name="articlesample" required>
                                    </div>
                                    <div class="q-box__question">
                                        <!--<input checked="checked" class="form-check-input question__input" id="q_3_no" name="q_3" type="radio" value="No"> -->
                                        <!--<label class="form-check-label question__label" for="q_3_no">No</label>-->
                                        
                                          <label for="">Categories</label>
                    <select multiple class="custom-select" value="Entertainment" name="categories[]">
                        <?php foreach ($categories as $category): ?>
                            
      <option value="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach ?>
                       
                          
                        </select>  
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <h4>Fill in your credentials with us</h4>
                                 <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                            <label for="">Profile Image</label>
                                            <!--<div class="q-box__question">-->
                                            <!--      <label class="form-check-label question__label" for="q_4_uk">Profile Image</label>-->
                                                                <input type="file" name="profileImage" value="<?php echo $profileImage; ?>" id="profileImage" class="form-control" required >

                                              
                                            </div>
                                        </div>
                                        
                                    </div>
                        
                               
                            <div class="step">
                                <h4>Tell Us More</h4>
                                <div class="row">
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                             <label for="">Username:</label>
                                             <input type="text" class="form-control" value="<?php echo $username; ?>" placeholder="Username..." name="username" required >
                                              <label for="">Real Name</label>
                <input type="text" class="form-control" placeholder="Real names as per ID or passport..."  name="realname" value="<?php echo $realname; ?>" required/>
                 <label for="">Email : </label>
                <input type="email" class="form-control" placeholder="Email..." name="email" value="<?php echo $email; ?>" required />
                 <label for="">Summary : </label>
                <input type="text" class="form-control" placeholder="Summary about yourself..." name="summary" value="<?php echo $summary; ?>" required />
                                        </div>
                                    </div>
                                  
                                 
                                  
                                </div>
                            </div>
                            <div class="step">
                                <h4>Password Credentials</h4>
                                 <label for="">Password</label>
                               <input type="password" class="form-control" placeholder="Password" name="pwd" required>
                                <label for="">Rewrite Password</label>
                <input type="password" class="form-control" placeholder="Retype password" name="pwd2" required>
                </div>
                
                            <div class="step">
                                <div class="mt-1">
                                    <div class="closing-text">
                                        <h4>That's about it! Stay Safe!</h4>
                                        <p>
                                        
                                            We will assess your information and will let you know soon as possible.</p>
                                        <p>Click on the submit button to continue.</p>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="success">
                                <div class="mt-5">
                                    <h4>Success! We'll get back to you ASAP!</h4>
                                    <p>Meanwhile, clean your hands 
often, use soap and water, or an alcohol-based hand rub, maintain a safe
 distance from anyone who is coughing or sneezing and always wear a mask
 when physical distancing is not possible.</p>
                                    <a class="back-link" href="">Go back from the beginning ➜</a>
                                </div>
                            </div>
                        </div>
                        <div id="q-box__buttons">
                            <button id="prev-btn" type="button" class="d-none">Previous</button> 
                            <button id="next-btn" type="button" class="d-inline-block">Next</button> 
                            <button id="submit-btn" type="submit" name="reg_user" class="d-none">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- PRELOADER -->
    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>
    <script src="static/js/regscript.js">
    </script>
<!-- Static App Form Collection Script -->
<script src="static/js/static-forms.js" type="text/javascript"></script>
<!-- Static App Form Collection Script -->
<script src="static/css/static-forms.js" type="text/javascript"></script>
<!-- Static App Form Collection Script -->
<script src="" type="text/javascript"></script>
<!-- Static App Form Collection Script -->
<script src="" type="text/javascript"></script>

</body></html>