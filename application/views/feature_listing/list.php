<p style="color: green"><?php echo $this->session->flashdata('msg'); ?></p>

<h1>List - feature_listing</h1>

<?php if (!empty($results)): ?>
<table>
	<tr>
	<?php forEach (array_keys($results[0]) as $key): ?>
		<th><?php echo ucfirst($key); ?></th>
	<?php endforeach; ?>
	</tr>

<?php forEach ($results as $row): ?>
	<tr>
	<?php forEach ($row as $field_value): ?>
		<td><?php echo $field_value ?></td>
	<?php endForEach; ?>
		<td> <?php echo anchor("feature_listing/show/".$row['id'], 'View'); ?></td>
		<td> <?php echo anchor("feature_listing/edit/".$row['id'], 'Edit'); ?></td>
		<td> <?php echo anchor("feature_listing/delete/".$row['id'], 'Delete'); ?></td>
	</tr>
<?php endforeach; ?>
</table>
<?php endIf; ?>
<?php echo anchor("feature_listing/new_entry", "New"); ?>