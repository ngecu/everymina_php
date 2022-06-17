
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>


<?php

$comment_text = $_POST['comment_text'];
$post_slug = $_POST['post_slug'];

$data = submitData($comment_text,$post_slug);
echo json_encode($data); 
?>