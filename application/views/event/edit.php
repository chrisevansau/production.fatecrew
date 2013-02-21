<h1>Edit - event</h1>

<?php echo form_open('event/update'); ?>
<input type="hidden" name="id" value=<?php echo $result["id"]?> />
	<p>
	<label for="user_id">User_id</label><br/>
	<input type="text" name="user_id" value="<?php echo $result["user_id"]?>" maxlength="500" size="50" />
	</p>

	<p>
	<label for="listing_id">Listing_id</label><br/>
	<input type="text" name="listing_id" value="<?php echo $result["listing_id"]?>" maxlength="500" size="50" />
	</p>

	<p>
	<label for="event_date_time">Event_date_time</label><br/>
	<input type="text" name="event_date_time" value="<?php echo $result["event_date_time"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="date_created">Date_created</label><br/>
	<input type="text" name="date_created" value="<?php echo $result["date_created"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="date_modified">Date_modified</label><br/>
	<input type="text" name="date_modified" value="<?php echo $result["date_modified"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="active">Active</label><br/>
	<input type="text" name="active" value="<?php echo $result["active"]?>" maxlength="500" size="50" />
	</p>

<p>
	<?php echo form_submit('submit', 'Update'); ?>
</p>
<?php echo form_close(); ?>
<?php echo anchor("event/show_list", "Back"); ?>