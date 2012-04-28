<h2>Viewing #<?php echo $lot->id; ?></h2>

<p>
	<strong>Auction id:</strong>
	<?php echo $lot->auction_id; ?></p>
<p>
	<strong>Sku:</strong>
	<?php echo $lot->sku; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $lot->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $lot->description; ?></p>

<?php echo Html::anchor('lots/edit/'.$lot->id, 'Edit'); ?> |
<?php echo Html::anchor('lots', 'Back'); ?>