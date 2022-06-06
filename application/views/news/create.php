<h2>
	<?php echo $title; ?>
</h2>

<!-- displayes form validation errors from form_validation library -->
<?php echo validation_errors(); ?>

<!-- creates form with CSRF token -->
<?php echo form_open('news/create'); ?>
<label for="title">Title</label>
<input type="text" name="title"><br>

<label for="text">Text</label>
<textarea name="text" id="text" cols="30" rows="10"></textarea><br>

<input type="submit" name="submit" value="Create news item">
</form>
