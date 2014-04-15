<nav class="navbar navbar-inverse navbar-fixed-top navbar-purple" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Dee Dee And Friends</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <?php foreach ($nav_chars as $id => $char_name): ?>
        	<li><?php echo $this->Html->link($char_name, array('admin' => false, 'controller' => 'characters', 'action' => 'view', $id)); ?></li>
        <?php endforeach; ?>
        <li><?php echo $this->Html->link('Contact', '/contact'); ?></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('Characters', array('admin' => true, 'plugin' => null, 'controller' => 'characters', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Services', array('admin' => true, 'plugin' => null, 'controller' => 'characters', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link('Settings', array('admin' => true, 'plugin' => 'configurations', 'controller' => 'characters', 'action' => 'index')); ?></li>
            <li class="divider"></li>
            <li><a href="/logout">[Sign Out]</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
