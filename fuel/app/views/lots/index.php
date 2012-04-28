<h2>Listing Lots</h2>
<br>
<?php Debug::dump($lots); if ($lots): ?>
<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th>Auction id</th>
			<th>Sku</th>
			<th>Name</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($lots as $lot): ?>		<tr>

			<td><?php Debug::dump($lot); echo $lot->auction_id; ?></td>
			<td><?php echo $lot->sku; ?></td>
			<td><?php echo $lot->name; ?></td>
			<td><?php echo $lot->description; ?></td>
			<td>
				<?php echo Html::anchor('lots/view/'.$lot->id, 'View'); ?> |
				<?php echo Html::anchor('lots/edit/'.$lot->id, 'Edit'); ?> |
				<?php echo Html::anchor('lots/delete/'.$lot->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<div class="alert alert-message">Указанный лот не обнаружен</div>

<?php endif; ?><p>
	<?php echo Html::anchor('lots/create/'.$iAuctionID, 'Add new Lot', array('class' => 'btn btn-success')); ?>

</p>
