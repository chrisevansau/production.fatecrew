<h1>New - flag</h1>

<?php echo form_open('flag/create'); ?>
<input type="hidden" name="id" value="" />
	<p>
	<label for="user_id">User_id</label><br/>
	<input type="text" name="user_id" value=""  />	</p>

	<p>
	<label for="listing_id">Listing_id</label><br/>
	<input type="text" name="listing_id" value=""  />	</p>

	<p>
	<label for="date_created">Date_created</label><br/>
	<input type="text" name="date_created" value=""  />	</p>

<p>
	<?php echo form_submit('submit', 'Create'); ?>
</p>
<?php echo form_close(); ?>
<?php echo anchor("flag/show_list", "Back"); ?>