<div class="well summary">
    <ul>
        <li>
            <a href="#"><span class="count"><?php echo $auctionsCount; ?></span> Auctions</a>
        </li>
        <li>
            <a href="#"><span class="count">27</span> Tasks</a>
        </li>
        <li>
            <a href="#"><span class="count">7</span> Messages</a>
        </li>
        <li class="last">
            <a href="#"><span class="count">5</span> Files</a>
        </li>
    </ul>
</div>
<hr>
<h2>Listing Auctions</h2>
<br>rfgrtgregregergergre
<?php if ($auctions): ?>
<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Date</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($auctions as $auction): ?>		<tr>

			<td><?php echo Html::anchor('lots/list/'.$auction->id, $auction->name); ?></td>
			<td><?php echo $auction->description; ?></td>
			<td><?php echo $auction->date; ?></td>
			<td>
				<?php echo Html::anchor('auctions/view/'.$auction->id, 'View'); ?> |
				<?php echo Html::anchor('auctions/edit/'.$auction->id, 'Edit'); ?> |
				<?php echo Html::anchor('auctions/delete/'.$auction->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Auctions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('auctions/create', 'Add new Auction', array('class' => 'btn btn-success')); ?>

</p>
