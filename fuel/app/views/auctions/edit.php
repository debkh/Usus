<h2>Editing Auction</h2>
<br>

<?php echo render('auctions/_form'); ?>
<p>
	<?php echo Html::anchor('auctions/view/'.$auction->id, 'View'); ?> |
	<?php echo Html::anchor('auctions', 'Back'); ?></p>
