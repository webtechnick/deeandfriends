<div class="users form">
	<h1>Register</h1>
	<?php echo $this->Form->create('User', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'col col-md-3 control-label'),
			'wrapInput' => 'col col-md-9',
			'class' => 'form-control'
		),
		'class' => 'well form-horizontal',
	)); ?>
	<?php echo $this->Form->input('User.email'); ?>
	<?php echo $this->Form->input('User.password'); ?>
	<?php echo $this->Form->input('User.confirm_password', array('type' => 'password')); ?>
	<div class="form-actions text-right">
		<button class="btn btn-success btn-lg" type="submit">Register</button>
	</div>
	</form>
</div>
