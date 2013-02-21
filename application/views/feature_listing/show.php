<h1>Show - feature_listing</h1>

<?php foreach ($result[0] as $field_name => $field_value): ?>
<p>
	<b><?php echo ucfirst($field_name); ?>:</b> <?php echo $field_value ?>
</p>
<?php endforeach; ?>
<?php echo anchor("feature_listing/show_list", "Back"); ?>