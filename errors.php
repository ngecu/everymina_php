<?php  if (count($errors) > 0) ://if errors are detected create a div tag of class error?>
  <div class="error card ">
  	<?php foreach ($errors as $error) : ?>

  	 <div class="error alert alert-danger ">
  	  <p><?php echo $error //display each error item in the error arrry ?></p>
  	    </div>
  	<?php endforeach ?>
  </div>
<?php  endif ?>