<h1>Show - user</h1>

<?php foreach ($result[0] as $field_name => $field_value): ?>
<p>
	<b><?php echo ucfirst($field_name); ?>:</b> <?php echo $field_value ?>
</p>
<?php endforeach; ?>
<?php echo anchor("user/show_list", "Back"); ?>