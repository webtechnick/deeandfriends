<?php
$character = isset($character) ? $character : null;
?>
<?php if (isset($character) && !empty($character)): ?>
<?php $url = array('controller' => 'characters', 'action' => 'friend_view', 'slug' => $character['Character']['slug']); ?>
<div class="col-md-6">
	<div class="panel panel-success">
		
		<div class="panel-heading">
			<?php echo $character['Character']['name'] ?>
		</div>
		
		<div class="panel-body character-bio">
			<div class="pull-right mr10">
				<?php echo $this->Html->link($this->Friend->headshot($character, array('width' => 75, 'class' => 'img-rounded')), $url, array('escape' => false)); ?>
			</div>
			<?php echo $this->Text->truncate($character['Character']['bio'], 200, array('html' => true)); ?>
			
			<br>
			<?php echo $this->Html->link('Read More About ' . $character['Character']['name'], $url, array('class' => 'btn btn-default btn-success')); ?>
		</div>
		
	</div>
</div>
<?php endif; ?>
