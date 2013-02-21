<h1>Edit - ad</h1>

<?php echo form_open('ad/update'); ?>
<input type="hidden" name="id" value=<?php echo $result["id"]?> />
	<p>
	<label for="image">Image</label><br/>
	<input type="text" name="image" value="<?php echo $result["image"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="active">Active</label><br/>
	<input type="text" name="active" value="<?php echo $result["active"]?>" maxlength="500" size="50" />
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
	<?php echo form_submit('submit', 'Update'); ?>
</p>
<?php echo form_close(); ?>
<?php echo anchor("ad/show_list", "Back"); ?>