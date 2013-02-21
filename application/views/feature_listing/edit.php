<h1>Edit - feature_listing</h1>

<?php echo form_open('feature_listing/update'); ?>
<input type="hidden" name="id" value=<?php echo $result["id"]?> />
	<p>
	<label for="listing_id">Listing_id</label><br/>
	<input type="text" name="listing_id" value="<?php echo $result["listing_id"]?>" maxlength="500" size="50" />
	</p>

	<p>
	<label for="active">Active</label><br/>
	<input type="text" name="active" value="<?php echo $result["active"]?>" maxlength="500" size="50" />
	</p>

	<p>
	<label for="clicks">Clicks</label><br/>
	<input type="text" name="clicks" value="<?php echo $result["clicks"]?>" maxlength="500" size="50" />
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
	<label for="modified_by">Modified_by</label><br/>
	<input type="text" name="modified_by" value="<?php echo $result["modified_by"]?>" maxlength="500" size="50" />
	</p>

<p>
	<?php echo form_submit('submit', 'Update'); ?>
</p>
<?php echo form_close(); ?>
<?php echo anchor("feature_listing/show_list", "Back"); ?>