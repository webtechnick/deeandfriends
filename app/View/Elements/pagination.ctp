<p>
	<?php echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} out of {:count} total.')
	));
	?>
</p>
<?php echo $this->Paginator->pagination(array(
	'ul' => 'pagination'
)); ?>
