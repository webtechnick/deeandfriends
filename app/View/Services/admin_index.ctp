<div class="services index">
	<h1>Services</h1>
	<table class="table table-striped table-bordered">
	<tr>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('base_price_dollars'); ?></th>
		<th><?php echo $this->Paginator->sort('details'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($services as $service): ?>
	<tr>
		<td><?php echo h($service['Service']['name']); ?>&nbsp;</td>
		<td><?php echo $this->Number->currency($service['Service']['base_price_dollars']); ?>&nbsp;</td>
		<td><?php echo $this->Text->truncate($service['Service']['details'], 50); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($service['Service']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($service['Service']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group-vertical">
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $service['Service']['id']), array('class' => 'btn btn-xs btn-default')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $service['Service']['id']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', $service['Service']['id'])); ?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="btn-group">
	<?php echo $this->Html->link(__('New Service'), array('action' => 'edit'), array('class' => 'btn btn-success')); ?>
	<?php echo $this->Html->link(__('New Character'), array('controller' => 'characters', 'action' => 'edit'), array('class' => 'btn btn-success')); ?>
	<?php echo $this->Html->link(__('List Characters'), array('controller' => 'characters', 'action' => 'index'), array('class' => 'btn btn-info')); ?>
	<?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index'), array('class' => 'btn btn-info')); ?>
</div>
