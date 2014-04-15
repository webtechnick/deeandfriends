<div class="configurations form">
	<h1>Edit Configuration</h1>
	<?php echo $this->TwitterForm->create('Configuration', array(
		'class' => 'well form-horizontal',
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'col col-md-3 control-label'),
			'wrapInput' => 'col col-md-9',
			'class' => 'form-control'
		),
	));?>
	<?php
		echo $this->TwitterForm->input('id');
		echo $this->TwitterForm->input('name');
		echo $this->TwitterForm->input('value');
	?>
	<div class="form-actions text-right">
		<button class="btn btn-success btn-lg" type="submit">Save Setting</button>
		<?php echo $this->Html->link(__('Delete'), array('action'=>'delete', $this->Form->value('Configuration.id')), array('class' => 'btn btn-danger btn-lg'), sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Configuration.id'))); ?>
	</div>
	</form>
</div>