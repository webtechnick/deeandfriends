<div class="row p20">
	<div class="col-md-4 text-center p5">
		<p class="lead">
			<?php echo $this->Html->link(Configure::read('DAF.email'), 'mailto:' . Configure::read('DAF.email')); ?><br>
			<?php echo Configure::read('DAF.phone'); ?>
		</p>
		<!-- <?php echo $this->Form->create('Newsletter', array(
			'class' => 'form-inline',
		)); ?>
		<div class="input-group">
      <input type="text" class="form-control span4" placeholder="Email Address">
      <span class="input-group-btn">
        <button class="btn btn-default btn-primary" type="button">Subscribe</button>
      </span>
    </div>	
		</form> -->
	</div>
	<div class="col-md-4 text-center p5">
		<?php echo $this->Html->link('Book Me Now!', '/contact', array('class' => 'btn btn-lg btn-primary')) ?>
	</div>
	<div class="col-md-4 text-right p5">
		<?php echo $this->Html->link('WebTechNick', 'http://www.webtechnick.com') ?><br />
		&copy; copyright <?php echo date('Y'); ?>
	</div>
</div>
