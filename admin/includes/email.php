<?php 

	$conn = mysqli_connect("localhost", "everymin_user", "sc200/0195/2018", "everymin_everymina");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
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
	   foreach($subs as $sub){ 
	     
    if(mail($sub, "EveryMina",$htmlContent, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}

   ; 
} 
	}


// 	return $posts;
}


function sendThankyouScubscription()
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
                    <h1 style="font-size: 58px;color: #30323d; background: #FFFFFF; margin-top: 30px; margin-bottom: 0; text-transform: uppercase;">THANK YOU</h1>
                    <p style="margin: 0; padding-bottom: 30px; font-size:18px;">SUBSCRIPTION ACTIVATED</p>
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
 
	if($posts){
	   foreach($subs as $sub){ 
	     
    if(mail($sub, "EveryMina- Thank You",$htmlContent, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}

   ; 
} 
	}


// 	return $posts;
}







// sendEmail("Sauti Sol","sauti-sol-og_image.webp","sauti-sol-copyright-board-proves-azimio-has-a-case-to-answer");
sendThankyouScubscription();
// sendEmail("title","picture","slug");

?>