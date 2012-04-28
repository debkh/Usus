<h2>Viewing #<?php echo $auction->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $auction->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $auction->description; ?></p>
<p>
	<strong>Date:</strong>
	<?php echo $auction->date; ?></p>
<p>
	<strong>Config:</strong>
	<?php echo $auction->config; ?></p>

<?php echo Html::anchor('auctions/edit/'.$auction->id, 'Edit'); ?> |
<?php echo Html::anchor('auctions', 'Back'); ?>