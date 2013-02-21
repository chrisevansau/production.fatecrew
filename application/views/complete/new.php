<h1>New - complete</h1>

<?php echo form_open('complete/create'); ?>
<input type="hidden" name="id" value="" />
	<p>
	<label for="image">Image</label><br/>
	<input type="text" name="image" value=""  />	</p>

	<p>
	<label for="rating">Rating</label><br/>
	<input type="text" name="rating" value=""  />	</p>

	<p>
	<label for="active">Active</label><br/>
	<input type="text" name="active" value=""  />	</p>

	<p>
	<label for="date_created">Date_created</label><br/>
	<input type="text" name="date_created" value=""  />	</p>

<p>
	<?php echo form_submit('submit', 'Create'); ?>
</p>
<?php echo form_close(); ?>
<?php echo anchor("complete/show_list", "Back"); ?>