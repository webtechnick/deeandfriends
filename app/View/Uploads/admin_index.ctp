<div class="Uploads index">
	<h1>Uploads / Pictures</h1>
	<table class="table table-striped table-bordered">
	<tr>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('character_id'); ?></th>
		<th><?php echo $this->Paginator->sort('size'); ?></th>
		<th><?php echo $this->Paginator->sort('type'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($uploads as $upload): ?>
	<tr>
		<td class="text-center">
			<?php echo $this->FileUpload->image($upload['Upload']['name'], 100); ?><br>
			<?php echo h($upload['Upload']['name']); ?>&nbsp;
		</td>
		<td>
			<?php if ($upload['Character']['name']): ?>
			<?php echo $this->Html->link($upload['Character']['name'], array('controller' => 'characters', 'action' => 'edit', $upload['Upload']['character_id']), array('class' => 'btn btn-default')); ?>
			<?php endif; ?>
			<?php if ($upload['Toon']['name']): ?>
			<?php echo $this->Html->link($upload['Toon']['name'], array('controller' => 'characters', 'action' => 'edit', $upload['Toon']['id']), array('class' => 'btn btn-default')); ?>
			<?php endif; ?>
		</td>
		<td><?php echo $this->Number->toReadableSize($upload['Upload']['size']); ?>&nbsp;</td>
		<td><?php echo h($upload['Upload']['type']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($upload['Upload']['created']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group-vertical">
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> ' . __('Delete'), array('action' => 'delete', $upload['Upload']['id']), array('class' => 'btn btn-danger', 'escape' => false), __('Are you sure you want to delete # %s?', $upload['Upload']['id'])); ?>
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
