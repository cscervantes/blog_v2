<?php
$cakeDescription = __d('cake_dev', 'Blog Version 2.0: Cakephp the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->Html->charset(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
    	<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>	
	</title>
    <?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('cake.generic');
		//echo $this->Html->css('/bootstrapv3/dist/css/bootstap');

		// echo $this->fetch('meta');
		// echo $this->fetch('css');
		// echo $this->fetch('script');
		echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
		echo $this->Html->script([
		    'https://code.jquery.com/jquery-1.12.4.min.js',
		    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
		]);
	?>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    	body {
    padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
}

footer {
    margin: 50px 0;
}
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><?php $str = explode(':',$cakeDescription); echo $str[0]; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <?= $this->Html->link(
						    'About',
						    '/blogs/about',
						    ['class' => 'btn',]
						); 
						?>
                    </li>
                    <li>
                        <?= $this->Html->link(
						    'Services',
						    '/blogs/service',
						    ['class' => 'btn',]
						); 
						?>
                    </li>
                    <li>
                        <?= $this->Html->link(
						    'Contact',
						    '/blogs/contact',
						    ['class' => 'btn',]
						); 
						?>
                    </li>
                </ul>
                <?php if($this->Session->read('Auth.User')) {?>
                <ul class="nav navbar-nav pull-right">
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $this->Session->read('Auth.User.name') ?> <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <?= $this->Html->link(
						    'Add Post',
						    '/Posts/add',
						    ['class' => 'btn',]
						); 
						?>
			          <li class="divider"></li>
			          <li>
                        <?= $this->Html->link(
						    'Logout',
						    '/Users/logout',
						    ['class' => 'btn',]
						); 
						?>
                    </li>
			        </ul>
			      </li> 
                </ul>
                <?php } else { ?>
                <ul class="nav navbar-nav pull-right">
                	 <li>
                        <?= $this->Html->link(
						    'Login',
						    '/login',
						    ['class' => 'btn',]
						); 
						?>
                    </li>
                    <li>
                        <?= $this->Html->link(
						    'Register',
						    '/register',
						    ['class' => 'btn',]
						); 
						?>
                    </li>
                </ul>
                <?php } ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

       <div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Blog version 2.0 &trade; <?= date('Y') ?></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <p>
				<?php echo $cakeVersion; ?>
			</p>
        </footer>

    </div>
    <?php echo $this->element('sql_dump'); ?>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
