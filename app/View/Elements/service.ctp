<?php
$characters = isset($service['Character']) ? $service['Character'] : null;
$service = isset($service['Service']) ? $service['Service'] : $service;
$lead = isset($lead) ? $lead : null;
?>
<?php if (isset($service) && !empty($service)): ?>
<div class="col-md-6">
	<div class="panel panel-primary">
		
		<div class="panel-heading">
			<div class="pull-right"><strong><?php echo $lead; ?><?php echo $this->Number->currency($this->Friend->servicePrice($service)); ?> / hour</strong></div>
			<?php echo $service['name'] ?>
		</div>
		
		<div class="panel-body service-bio">
			<?php echo $service['details'] ?>
		</div>
		
		<?php if (!empty($characters)): ?>
		<div class="panel-footer">
			Characters: 
			<?php foreach($characters as $character): ?>
				<?php echo $this->Html->link($character['name'], array('controller' => 'characters', 'action' => 'friend_view', 'slug' => $character['slug']), array('class' => 'btn btn-info btn-sm')); ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		
	</div>
</div>
<?php endif; ?>
