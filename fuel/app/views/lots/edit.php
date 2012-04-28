<h2>Editing Lot</h2>
<br>

<?php echo render('lots/_form'); ?>
<p>
	<?php echo Html::anchor('lots/view/'.$lot->id, 'View'); ?> |
	<?php echo Html::anchor('lots', 'Back'); ?></p>
