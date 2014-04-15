<div class="configurations index">
<h1><?php echo __('Configurations');?></h1>
<table class="table table-striped table-bordered">
<tr>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('value');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
	<?php foreach($configurations as $configuration): ?>
	<tr>
		<td>
			<?php echo $configuration['Configuration']['name']; ?>
		</td>
		<td>
			<?php echo $configuration['Configuration']['value']; ?>
		</td>
		<td class="actions">
			<div class="btn-group-vertical">
				<?php echo $this->Html->link(__('Edit'), array('action'=>'edit', $configuration['Configuration']['id']), array('class' => 'btn btn-xs btn-default')); ?>
				<?php echo $this->Html->link(__('Delete'), array('action'=>'delete', $configuration['Configuration']['id']), array('class' => 'btn btn-xs btn-danger'), sprintf(__('Are you sure you want to delete # %s?'), $configuration['Configuration']['id'])); ?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php echo $this->element('pagination'); ?>
<div class="btn-group">
	<?php echo $this->Html->link(__('New Configuration'), array('action'=>'add'), array('class' => 'btn btn-success')); ?>
</div>
