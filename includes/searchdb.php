
<?php
    if (isset($_POST['submit'])) {
        // Connect to the database
        $connection_string = new mysqli("localhost", "everymin_user", "sc200/0195/2018", "everymin_everymina");
        $X = $_POST['searchKeyWord'];

        // Escape the search string and trim
        // all whitespace
        $searchString = mysqli_real_escape_string($connection_string, trim(htmlentities($_POST['searchKeyWord'])));

        // If there is a connection error, notify
        // the user, and Kill the script.
        if ($connection_string->connect_error) {
            echo "Failed to connect to Database";
            exit();
        }

        // Check for empty strings and non-alphanumeric
        // characters.
        // Also, check if the string length is less than
        // three. If any of the checks returns "true",
        // return "Invalid search string", and
        // kill the script.
        // if ($searchString === "" || !ctype_alnum($searchString) || $searchString < 3) {
        //     echo "Invalid search string";
        //     exit();
        // }

        // We are using a prepared statement with the
        // search functionality to prevent SQL injection.
        // So, we need to prepend and append the search
        // string with percent signs
        $searchString = "%$searchString%";

	$sql = "SELECT * FROM `posts` WHERE `title` LIKE '%$X%' ORDER BY `title`";
	$result = mysqli_query($connection_string, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	foreach ($posts as $post) {
	   // echo "$value <br>";
	   echo '<a href="../single_post.php?post-slug='.$post['slug'].'">'.$post['title'].'<br/></a>';
        // echo $post['title']."<br/>";
};
	
     
    } else { // The user accessed the script directly

        // Tell them nicely and kill the script.
        echo "That is not allowed!";
        exit();
    }
?>
