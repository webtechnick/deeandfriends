<div class="users form">
<h1>Admin Change Password: <?php echo $this->request->data['User']['email']; ?></h1>
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
		echo $this->Form->input('id', array('label' => false));
		echo $this->Form->input('User.password');
	  echo $this->Form->input('User.confirm_password', array('type' => 'password'));
	?>
	<div class="form-actions text-right">
		<button class="btn btn-success btn-lg" type="submit">Change Password</button>
		<?php echo $this->Html->link('Cancel', array('action' => 'index'), array('class' => 'btn btn-default btn-lg')); ?>
	</div>
</form>
</div>
