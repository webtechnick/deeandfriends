<div class="characters form">
	<h1>Contact Me and My Friends!</h1>
	<?php echo $this->Form->create('Contact', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'col col-md-3 control-label'),
			'wrapInput' => 'col col-md-9',
			'class' => 'form-control'
		),
		'class' => 'well form-horizontal',
	));
	?>
	<?php
		echo $this->Form->input('from', array(
			'type' => 'email',
			'placeholder' => 'email@server.com'
		));
		echo $this->Form->input('friend', array(
			'type' => 'select',
			'options' => $characters,
			'empty' => 'Choose A Friend (optional)',
			'default' => null,
		));
		echo $this->Form->input('message', array(
			'type' => 'textarea',
			'after' => '<div class="col-md-offset-3 pl20"><span class="help-block">Tell me all about your party or event!</span></div>'
		));
	?>
	
	<div class="form-actions text-right">
		<button class="btn btn-success btn-lg" type="submit">Send Message</button>
	</div>
	</form>
</div>
