<h1>New - bookings</h1>

<?php echo form_open('bookings/create'); ?>
<input type="hidden" name="id" value="" />
	<p>
	<label for="group_name">Group_name</label><br/>
	<input type="text" name="group_name" value=""  />	</p>

	<p>
	<label for="user_id">User_id</label><br/>
	<input type="text" name="user_id" value=""  />	</p>

	<p>
	<label for="listing_id">Listing_id</label><br/>
	<input type="text" name="listing_id" value=""  />	</p>

	<p>
	<label for="num_people">Num_people</label><br/>
	<input type="text" name="num_people" value=""  />	</p>

	<p>
	<label for="comment">Comment</label><br/>
	<input type="text" name="comment" value=""  />	</p>

	<p>
	<label for="date">Date</label><br/>
	<input type="text" name="date" value=""  />	</p>

	<p>
	<label for="date_added">Date_added</label><br/>
	<input type="text" name="date_added" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="500" size="50"  />	</p>

	<p>
	<label for="status">Status</label><br/>
	<input type="text" name="status" value=""  />	</p>

<p>
	<?php echo form_submit('submit', 'Create'); ?>
</p>
<?php echo form_close(); ?>
<?php echo anchor("bookings/show_list", "Back"); ?>