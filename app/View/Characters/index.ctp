<div class="characters index">
	<h2><?php echo __('Characters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('headshot_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bio'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($characters as $character): ?>
	<tr>
		<td><?php echo h($character['Character']['id']); ?>&nbsp;</td>
		<td><?php echo h($character['Character']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($character['Headshot']['name'], array('controller' => 'uploads', 'action' => 'view', $character['Headshot']['id'])); ?>
		</td>
		<td><?php echo h($character['Character']['bio']); ?>&nbsp;</td>
		<td><?php echo h($character['Character']['created']); ?>&nbsp;</td>
		<td><?php echo h($character['Character']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $character['Character']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $character['Character']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $character['Character']['id']), null, __('Are you sure you want to delete # %s?', $character['Character']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Character'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Headshot'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
	</ul>
</div>
