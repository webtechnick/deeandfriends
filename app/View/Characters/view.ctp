<?php
	$this->Friend->set($character);
?>
<div class="characters view">
	<div class="pull-right">
		<?php echo $this->Friend->headshot($character, array('width' => 250, 'class' => 'img-rounded img-responsive')); ?>
	</div>
	<h1><?php echo $this->Friend->get('name'); ?></h1>
	
	<h3>Services</h3>
	
	<h3>Biography</h3>
	<div class="bio">
		<?php echo $this->Friend->get('bio') ?>
	</div>
	
	<!-- Photos -->
	<div class="clear"></div>
	<?php if (!empty($character['Upload'])): ?>
		<h3>Photos of <?php echo $this->Friend->get('name'); ?></h3>
		<?php $i = 0; foreach($character['Upload'] as $upload): ?>
			<?php $this->FileUpload->reset(); ?>
			<?php if ($i % 3 == 0): ?>
				<div class="clear"></div>
			<?php endif; ?>
			
			<div id="photo-<?php echo $upload['id'] ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<?php echo $this->FileUpload->image($upload['name'], array('class' => 'img-responsive')); ?>
					</div>
				</div>
			</div>
			
			<div class="col col-md-4 text-center">
				<?php echo $this->Html->link($this->FileUpload->image($upload['name'], array('width' => 200, 'class' => 'img-thumbnail')),
					'#',
					array(
						'onclick' => "$('#photo-". $upload['id'] ."').modal('show'); return false;",
						'escape' => false,
					)
				); ?>
			</div>
		<?php $i++; endforeach; ?>
	<?php endif; ?>
	
</div>
