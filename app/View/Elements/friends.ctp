<?php
if (!isset($characters)) {
	$characters = $this->requestAction('/characters/get_characters');
}
?>
<?php $i = 0; foreach ($characters as $character): ?>
	<?php if ($i % 2 == 0): ?>
		<div class="clear"></div>
	<?php endif; ?>
	<?php echo $this->element('character_card', array('character' => $character)); ?>
<?php $i++; endforeach; ?>
