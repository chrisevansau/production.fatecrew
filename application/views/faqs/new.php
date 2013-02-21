<h1>New - faqs</h1>

<?php echo form_open('faqs/create'); ?>
<input type="hidden" name="id" value="" />
	<p>
	<label for="title">Title</label><br/>
	<input type="text" name="title" value=""  />	</p>

	<p>
	<label for="desc">Desc</label><br/>
	<input type="text" name="desc" value=""  />	</p>

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
<?php echo anchor("faqs/show_list", "Back"); ?>