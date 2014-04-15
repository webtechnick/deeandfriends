<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?> | Dee Dee and Friends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('screen-base');
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<div id="header" class="p20">
		<?php echo $this->element('header'); ?>
	</div>
	
	<div id="mainbody" class="container">
		<?php echo $this->Session->flash(); ?>
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	
	<div id="footer">
		<?php echo $this->element('footer'); ?>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<?php 
		echo $this->fetch('script');
		echo $this->Html->script('bootstrap.min');
		echo $this->Js->writeBuffer(); 
	?>
</body>
</html>
