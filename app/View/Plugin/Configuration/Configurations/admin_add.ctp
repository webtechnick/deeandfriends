<div class="configurations form">
	<h1>Add Configuration</h1>
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
		echo $this->TwitterForm->input('name');
		echo $this->TwitterForm->input('value');
	?>
	<div class="form-actions text-right">
		<button class="btn btn-success btn-lg" type="submit">Save Setting</button>
	</div>
	</form>
</div>