<h1>New - event</h1>

<?php echo form_open('event/create'); ?>
<input type="hidden" name="id" value="" />
	<p>
	<label for="user_id">User_id</label><br/>
	<input type="text" name="user_id" value=""  />	</p>

	<p>
	<label for="listing_id">Listing_id</label><br/>
	<input type="text" name="listing_id" value=""  />	</p>

	<p>
	<label for="event_date_time">Event_date_time</label><br/>
	<input type="text" name="event_date_time" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="500" size="50"  />	</p>

	<p>
	<label for="date_created">Date_created</label><br/>
	<input type="text" name="date_created" value=""  />	</p>

	<p>
	<label for="date_modified">Date_modified</label><br/>
	<input type="text" name="date_modified" value=""  />	</p>

	<p>
	<label for="active">Active</label><br/>
	<input type="text" name="active" value=""  />	</p>

<p>
	<?php echo form_submit('submit', 'Create'); ?>
</p>
<?php echo form_close(); ?>
<?php echo anchor("event/show_list", "Back"); ?>