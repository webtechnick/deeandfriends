<div class="characters index">
	<h1>Characters</h1>
	<table class="table table-striped table-bordered">
	<tr>
		<th><?php echo $this->Paginator->sort('headshot_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		
		<th><?php echo $this->Paginator->sort('bio'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($characters as $character): ?>
	<tr>
		<td class="text-center">
			<?php echo $this->Friend->headshot($character, 150); ?>
		</td>
		<td><?php echo h($character['Character']['name']); ?>&nbsp;</td>
		<td><?php echo $this->Text->truncate($character['Character']['bio'], 100, array('html' => true)); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($character['Character']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($character['Character']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group-vertical">
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $character['Character']['id']), array('class' => 'btn btn-default')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $character['Character']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $character['Character']['id'])); ?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
<div class="btn-group">
	<?php echo $this->Html->link(__('New Character'), array('action' => 'edit'), array('class' => 'btn btn-success')); ?>
	<?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'edit'), array('class' => 'btn btn-success')); ?>
	<?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index'), array('class' => 'btn btn-info')); ?>
	<?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index'), array('class' => 'btn btn-info')); ?>
</div>
