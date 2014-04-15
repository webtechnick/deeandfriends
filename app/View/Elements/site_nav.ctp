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
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-certificate"></span> Characters', array('admin' => true, 'plugin' => null, 'controller' => 'characters', 'action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-cog"></span> Settings', array('admin' => true, 'plugin' => 'configuration', 'controller' => 'configurations', 'action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-gift"></span> Services', array('admin' => true, 'plugin' => null, 'controller' => 'services', 'action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-picture"></span> Uploads', array('admin' => true, 'plugin' => null, 'controller' => 'uploads', 'action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span> Users', array('admin' => true, 'plugin' => null, 'controller' => 'users', 'action' => 'index'), array('escape' => false)); ?></li>
            <li class="divider"></li>
            <li><a href="http://pixlr.com/editor" target="_blank"><span class="glyphicon glyphicon-tint"></span> Image Editor</a></li>
            <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
