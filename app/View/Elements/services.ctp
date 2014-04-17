<?php
if (!isset($services)) {
	$services = $this->requestAction('/services/get_services');
}
?>
<?php $i = 0; foreach ($services as $service): ?>
	<?php if ($i % 2 == 0): ?>
		<div class="clear"></div>
	<?php endif; ?>
	<?php echo $this->element('service', array('service' => $service, 'lead' => 'Starting at ')); ?>
<?php $i++; endforeach; ?>
