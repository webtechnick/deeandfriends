<div class="users form">
<h1>Edit User</h1>

<?php echo $this->Form->create('User', array(
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
		echo $this->Form->input('email');
		echo $this->Form->input('is_admin', array(
			'wrapInput' => 'col col-md-9 col-md-offset-3',
			'label' => array('class' => null),
			'class' => null,
			'afterInput' => '<span class="help-block">If checked, This use will have admin rights and access.</span>'
		));
	?>
	<div class="form-actions text-right">
		<button class="btn btn-success btn-lg" type="submit">Save User</button>
		<?php if ($this->Form->value('User.id')): ?>
			<?php echo $this->Html->link('Change Password', array('action' => 'change_password', $this->Form->value('User.id')), array('class' => 'btn btn-info btn-lg')); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('User.id')), array('class' => 'btn btn-danger btn-lg'), __('Are you sure you want to delete %s?', $this->Form->value('User.name'))); ?>
		<?php endif; ?>
	</div>
</form>
</div>
