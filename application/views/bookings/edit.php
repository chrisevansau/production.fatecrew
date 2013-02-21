<h1>Edit - bookings</h1>

<?php echo form_open('bookings/update'); ?>
<input type="hidden" name="id" value=<?php echo $result["id"]?> />
	<p>
	<label for="group_name">Group_name</label><br/>
	<input type="text" name="group_name" value="<?php echo $result["group_name"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="user_id">User_id</label><br/>
	<input type="text" name="user_id" value="<?php echo $result["user_id"]?>" maxlength="500" size="50" />
	</p>

	<p>
	<label for="listing_id">Listing_id</label><br/>
	<input type="text" name="listing_id" value="<?php echo $result["listing_id"]?>" maxlength="500" size="50" />
	</p>

	<p>
	<label for="num_people">Num_people</label><br/>
	<input type="text" name="num_people" value="<?php echo $result["num_people"]?>" maxlength="500" size="50" />
	</p>

	<p>
	<label for="comment">Comment</label><br/>
	<input type="text" name="comment" value="<?php echo $result["comment"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="date">Date</label><br/>
	<input type="text" name="date" value="<?php echo $result["date"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="date_added">Date_added</label><br/>
	<input type="text" name="date_added" value="<?php echo $result["date_added"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="status">Status</label><br/>
	<input type="text" name="status" value="<?php echo $result["status"]?>" maxlength="500" size="50" />
	</p>

<p>
	<?php echo form_submit('submit', 'Update'); ?>
</p>
<?php echo form_close(); ?>
<?php echo anchor("bookings/show_list", "Back"); ?>