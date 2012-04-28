<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<?php echo Form::hidden('auction_id', Input::post('auction_id', isset($lot) ? $lot->auction_id : $iAuctionID), array('class' => 'span6')); ?>

		<div class="clearfix">
			<?php echo Form::label('Sku', 'sku'); ?>

			<div class="input">
				<?php echo Form::input('sku', Input::post('sku', isset($lot) ? $lot->sku : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($lot) ? $lot->name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::textarea('description', Input::post('description', isset($lot) ? $lot->description : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>