<h1>New - feature_listing</h1>

<?php echo form_open('feature_listing/create'); ?>
<input type="hidden" name="id" value="" />
	<p>
	<label for="listing_id">Listing_id</label><br/>
	<input type="text" name="listing_id" value=""  />	</p>

	<p>
	<label for="active">Active</label><br/>
	<input type="text" name="active" value=""  />	</p>

	<p>
	<label for="clicks">Clicks</label><br/>
	<input type="text" name="clicks" value=""  />	</p>

	<p>
	<label for="date_created">Date_created</label><br/>
	<input type="text" name="date_created" value=""  />	</p>

	<p>
	<label for="date_modified">Date_modified</label><br/>
	<input type="text" name="date_modified" value=""  />	</p>

	<p>
	<label for="modified_by">Modified_by</label><br/>
	<input type="text" name="modified_by" value=""  />	</p>

<p>
	<?php echo form_submit('submit', 'Create'); ?>
</p>
<?php echo form_close(); ?>
<?php echo anchor("feature_listing/show_list", "Back"); ?>