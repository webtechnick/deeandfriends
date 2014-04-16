<div class="services form">
	<h1>Add/Update Service</h1>
	<?php echo $this->Form->create('Service', array(
		'inputDefaults' => array(
				'div' => 'form-group',
				'label' => array('class' => 'col col-md-3 control-label'),
				'wrapInput' => 'col col-md-9',
				'class' => 'form-control'
			),
			'class' => 'well form-horizontal',
	)); ?>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('base_price_dollars', array(
				'wrapInput' => 'input-group pl15 pr15',
				'beforeInput' => '<span class="input-group-addon">$</span>',
			));
			echo $this->Form->input('details');
			echo $this->Form->input('Character');
		?>
		<div class="form-actions text-right">
			<button class="btn btn-success btn-lg" type="submit">Save Service</button>
			<?php if ($this->Form->value('Service.id')): ?>
				<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Service.id')), array('class' => 'btn btn-danger btn-lg'), __('Are you sure you want to delete %s?', $this->Form->value('Service.name'))); ?>
			<?php endif; ?>
		</div>
	</form>
</div>
<?php echo $this->Ckeditor->replace('ServiceDetails'); ?>
