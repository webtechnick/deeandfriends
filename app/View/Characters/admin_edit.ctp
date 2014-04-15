<div class="characters form">
	<h1>Add/Update a Character</h1>
	<?php echo $this->Form->create('Character', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'col col-md-3 control-label'),
			'wrapInput' => 'col col-md-9',
			'class' => 'form-control'
		),
		'class' => 'well form-horizontal',
		'type' => 'file'
	)); ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array(
			'placeholder' => 'Character Name'
		));
		echo $this->Form->input('Upload.file', array('type' => 'file'));
		echo $this->Form->input('bio', array('after' => '<div class="col-md-offset-3 pl20"><span class="help-block">About this character, history, etc..</span></div>'));
		echo $this->Form->input('Service');
	?>
	
	<div class="form-actions text-right">
		<button class="btn btn-success btn-lg" type="submit">Save Character</button>
		<?php if ($this->Form->value('Character.id')): ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Character.id')), array('class' => 'btn btn-danger btn-lg'), __('Are you sure you want to delete %s?', $this->Form->value('Character.name'))); ?>
		<?php endif; ?>
	</div>
	</form>
</div>
