<h1>Edit - faqs</h1>

<?php echo form_open('faqs/update'); ?>
<input type="hidden" name="id" value=<?php echo $result["id"]?> />
	<p>
	<label for="title">Title</label><br/>
	<input type="text" name="title" value="<?php echo $result["title"]?>" maxlength="500" size="50"  />
	</p>

	<p>
	<label for="desc">Desc</label><br/>
	<input type="text" name="desc" value="<?php echo $result["desc"]?>" maxlength="500" size="50"  />
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
<?php echo anchor("faqs/show_list", "Back"); ?>