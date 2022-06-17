<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_section.php'); ?>
<!-- Get all topics -->
<?php $categories = getAllCategories();	

if (!isset($_SESSION['user']['username'])) {
    echo '<script>window.location = "https://everymina.com/login.php";</script>';

} 
?>
	<title>Admin | Create Post</title>
</head>
<body>
	<!-- admin navbar -->
	<?php include(ROOT_PATH . '/includes/navbar.php') ?>
	
	
	

	<div class="container content">
		<!-- Left side menu -->
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<!-- Middle form - to create and edit  -->
		<div class="action create-post-div">
			<h1 class="page-title">Create/Edit Post</h1>
			<form method="post" enctype="multipart/form-data" action="create_post.php" >
				<!-- validation errors for the form -->
				<?php include(ROOT_PATH . '/includes/errors.php') ?>

				<!-- if editing post, the id is required to identify that post -->
				<?php if ($isEditingPost === true): ?>
					<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<?php endif ?>
                <label>Post Title</label>
				<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
			
			
				<br/>
					<label style="float: left; margin: 5px auto 5px;">Featured image</label>
				<input type="file" name="featured_image" value="<?php echo $image; ?>"  >
				
					<br/>
					<br/>
					<!--<p>You've written <b><span id="word-count">0</span> words</b> and <b><span id="character-count">0</span> characters</b>.</p>-->
					
				<textarea minlength="150" name="body" id="body"  cols="30" rows="10"><?php echo $body; ?></textarea>
				<select name="category_id">
					<option value="" selected disabled>Choose Category</option>
                    <?php foreach ($categories as $category): ?>
                            
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach ?>
				</select>
				<input type="hidden" value="<?php echo $_SESSION['user']['id'] ?>" name="author">
				
				
				<!-- Only admin users can view publish input field -->
				<?php if ($_SESSION['user']['role'] == "Admin"): ?>
					<!-- display checkbox according to whether post has been published or not -->
					<?php if ($published == true): ?>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="publish" checked="checked">&nbsp;
						</label>
					<?php else: ?>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="publish">&nbsp;
						</label>
					<?php endif ?>
				<?php endif ?>
				
				<!-- if editing post, display the update button instead of create button -->
				<?php if ($isEditingPost === true): ?> 
					<button type="submit" class="btn" name="update_post">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn btn-primary" name="create_post">Save Post</button>
				<?php endif ?>

			</form>
		</div>
		<!-- // Middle form - to create and edit -->
	</div>
</body>
</html>

<script>
	CKEDITOR.replace('body',{
  height: 300,
  filebrowserUploadUrl: "upload.php"
 });
 
 //
// Variables
//

// Get the #text element

document.onload = function () {
var textArea = document.querySelector('.cke_editable cke_editable_themed cke_contents_ltr cke_show_borders');



// Get the #word-count element
const wordCount = document.querySelector('#word-count');

// Get the #character-count element
const characterCount = document.querySelector('#character-count');


//
// Functions
//

/**
 * Get the number of words inside a form field
 * @param {HTMLInputElement|HTMLTextAreaElement} field The form field
 * @returns {Number} The word count
 */
function getWordCount (field) {
  // Trim whitespace from the value
  const value = field.value.trim();
  
  // If it's an empty string, return zero
  if (!value) return 0;

  // Otherwise, return the word count
  return value.split(/\s+/).length;
}

/**
 * Get the number of characters inside a form field
 * @param {HTMLInputElement|HTMLTextAreaElement} field The form field
 * @returns {Number} The character count
 */
function getCharacterCount (field) {
  return field.value.length;
}

/**
 * Handle input events
 */
function handleInput () {
  wordCount.textContent = getWordCount(this);
  characterCount.textContent = getCharacterCount(this);
}


//
// Inits & Event Listeners
//

// Handle input events
textArea.addEventListener('input', handleInput);
}
</script>