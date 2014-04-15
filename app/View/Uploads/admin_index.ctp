<div class="Uploads index">
	<h1>Uploads / Pictures</h1>
	<table class="table table-striped table-bordered">
	<tr>
		<th><?php echo $this->Paginator->sort('character_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('size'); ?></th>
		<th><?php echo $this->Paginator->sort('type'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($uploads as $upload): ?>
	<tr>
		<td>
			<?php if ($upload['Character']['name']): ?>
			<?php echo $this->Html->link($upload['Character']['name'], array('controller' => 'characters', 'action' => 'edit', $upload['Upload']['character_id'])); ?>
			<?php endif; ?>
		</td>
		<td><?php echo h($upload['Upload']['name']); ?>&nbsp;</td>
		<td><?php echo $this->Number->toReadableSize($upload['Upload']['size']); ?>&nbsp;</td>
		<td><?php echo h($upload['Upload']['type']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($Upload['Upload']['created']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group-vertical">
				<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $Upload['Upload']['id']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', $Upload['Upload']['id'])); ?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="btn-group">
	<?php echo $this->Html->link(__('New Character'), array('controller' => 'characters', 'action' => 'edit'), array('class' => 'btn btn-success')); ?>
	<?php echo $this->Html->link(__('New Service'), array('controller' => 'characters', 'action' => 'edit'), array('class' => 'btn btn-success')); ?>
	<?php echo $this->Html->link(__('List Characters'), array('controller' => 'characters', 'action' => 'index'), array('class' => 'btn btn-info')); ?>
	<?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index'), array('class' => 'btn btn-info')); ?>
</div>
