<div class="characters form">
	<h1>Add/Update Character</h1>
	<?php echo $this->Form->create('Character', array(
		'inputDefaults' => array(
			'div' => 'form-group',
			'label' => array('class' => 'col col-md-3 control-label'),
			'wrapInput' => 'col col-md-9',
			'class' => 'form-control'
		),
		'class' => 'well form-horizontal',
		'type' => 'file'
	));
	?>
	<div class="headshot-admin">
		<?php echo $this->Friend->headshot($this->request->data, array('width' => 100, 'class' => 'img-thumbnail')); ?>
	</div>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('is_active', array(
			'wrapInput' => 'col col-md-9 col-md-offset-3',
			'label' => array('class' => null),
			'class' => null,
			'afterInput' => '<span class="help-block">If checked, will show in toolbar and be an active page.</span>'
		));
		echo $this->Form->input('name', array(
			'placeholder' => 'Character Name'
		));
		echo $this->Form->input('slug', array(
			'placeholder' => 'Slug',
			'after' => '<div class="col-md-offset-3 pl20"><span class="help-block">This is the slug of your character name for the URL, no spaces, no special characters, if left empty it will auto-generate a slug off the Character Name for you.</span></div>'
		));
		echo $this->Form->input('Headshot.file', array(
			'type' => 'file',
			'label' => array('text' => 'Headshot'),
			'after' => '<div class="col-md-offset-3 pl20"><span class="help-block">'. IcingUtil::uploadLimit() .' MB Limit.</span></div>'
		));
		echo $this->Form->input('bio', array('after' => '<div class="col-md-offset-3 pl20"><span class="help-block">About this character, history, etc..</span></div>'));
	?>
	
	<h2>Services Offered By This Character</h2>
	<?php $i = 0; foreach($services as $service): ?>
		<div class="col-md-4">
			<?php $overwrite = $this->Friend->hasService($this->request->data, $service['Service']['id']); ?>
			<?php echo $this->Form->input("CharactersService.$i.service_id", array(
				'type' => 'checkbox',
				'wrapInput' => null,
				'class' => null,
				'label' => array('class' => null, 'text' => $service['Service']['name']),
				'value' => $service['Service']['id'],
				'checked' => !!$overwrite
			)); ?>
			<?php echo $this->Form->input("CharactersService.$i.base_price_dollars_overwrite", array(
					'value' => $overwrite ? $overwrite['base_price_dollars_overwrite'] : '',
					'label' => array('text' => 'Overwrite'),
					'class' => 'form-control',
					//'div' => 'input-group',
					'wrapInput' => 'input-group col-md-4',
					'beforeInput' => '<span class="input-group-addon">$</span>',
					'placeholder' => $service['Service']['base_price_dollars'],
				)); ?>
			<?php if ($overwrite): ?>
				<?php echo $this->Form->input("CharactersService.$i.id", array(
					'type' => 'hidden',
					'value' => $overwrite['id']
				)); ?>
			<?php endif; ?>
		</div>
	<?php $i++; endforeach; ?>
	
	<div class="clear"></div>
	
	<h2>Photos of This Character</h2>
	
	<div class="clear pb10"></div>
	<?php echo $this->Form->input('Upload.0.file', array(
		'type' => 'file',
		'label' => array('text' => 'New Photo'),
		'after' => '<div class="col-md-offset-3 pl20"><span class="help-block">'. IcingUtil::uploadLimit() .' MB Limit.</span></div>'
	)); ?>
	
	<?php $i = 0; foreach($this->request->data['Upload'] as $upload): ?>
		<?php if (!empty($upload['name'])): ?>
			<?php if ($i % 4 == 0): ?>
				<div class="clear"></div>
			<?php endif; ?>
			<div class="col-md-3 text-center">
				<?php echo $this->FileUpload->image($upload['name'], array('width' => 150, 'class' => 'img-thumbnail')) ?><br>
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Delete', array('controller' => 'uploads', 'action' => 'delete', $upload['id']), array('class' => 'btn btn-danger btn-sm', 'escape' => false), 'Are you sure?'); ?>
			</div>
		<?php endif; ?>
	<?php $i++; endforeach; ?>
	<div class="clear">&nbsp;</div>
	
	<div class="form-actions text-right">
		<button class="btn btn-success btn-lg" type="submit">Save Character</button>
		<?php if ($this->Form->value('Character.id')): ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Character.id')), array('class' => 'btn btn-danger btn-lg'), __('Are you sure you want to delete %s?', $this->Form->value('Character.name'))); ?>
		<?php endif; ?>
	</div>
	</form>
</div>
<?php echo $this->Ckeditor->replace('CharacterBio'); ?>
