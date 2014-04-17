<div class="users index">
	<h1>Users</h1>
	<table class="table table-striped table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('is_admin', 'Admin'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo $this->Friend->yesNo($user['User']['is_admin']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($user['User']['modified']); ?>&nbsp;</td>
		<td class="actions text-center">
			<div class="btn-group-vertical">
				<?php echo $this->Html->link(__('Change Password'), array('action' => 'change_password', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
</div>
