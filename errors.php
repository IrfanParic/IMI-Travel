<?php
// Counting errors from login and register
    if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p style="
  	margin: 0;
    font-family: 'Fjalla One', sans-serif;
    letter-spacing: 2px;
    text-align: center;
    color: red;
    margin-bottom: 20px" ><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
