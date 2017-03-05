<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Stars foto: Admin');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->Html->meta('favicon.ico', array('type' => 'icon'));
	echo $this->Html->meta(array('name' => 'robots', 'content' => 'no index, no follow'));
	echo $this->Html->css('admin.min');
	echo $this->Html->css('demo');
	echo $this->fetch('css');
	?>
	<style>
/*th a:hover{
text-decoration: none;
}
th a.desc:after	 {
content: ' ⇣';
}
th a.asc:after	 {
content: ' ⇡';
}*/
th{
	margin: 0;
	padding: 0;
}
th a{
	display: block;
	padding: 10px 5px;
}
th a:hover{
	background-color: #ddd;
}
th a.asc:after {
	/*content: "\f0de";*/
	content: "\F161";
}
th a.desc:after {
	content: "\F160";
}
th a.asc:after, th a.desc:after, th a.sort:after {
	font-family: fontello;
	padding-right: 5px;
	vertical-align: middle;
	float: right;
}
:after, :before {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
span.text-danger{
	color: #f00;
}
</style>
<script type="text/javascript">
	var basePath = "<?php echo Router::url('/'); ?>"
</script>
</head>
<body class="skin-blue">
	<div class="wrapper">
		<div class="sidebar" data-color="black" data-image="/img/sidebar-5.jpg" >
			<div class="sidebar-wrapper">
				<div class="logo">
					<?php echo $this->Html->link(env('HTTP_HOST'), array('controller' => 'pages', 'action' => 'index','admin'=>false),
					array('class'=>"simple-text")); ?>
				</div>
				<ul class="nav">
					<li class="active">
						<a href="dashboard.html">
							<i class="pe-7s-graph"></i>
							<p> <?php echo __("Dashboard");?></p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<nav class="navbar navbar-default navbar-fixed">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">User</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-left">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-dashboard"></i>
									<p class="hidden-lg hidden-md">Dashboard</p>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-globe"></i>
									<b class="caret hidden-sm hidden-xs"></b>
									<span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Notification 1</a></li>
									<li><a href="#">Notification 2</a></li>
									<li><a href="#">Notification 3</a></li>
									<li><a href="#">Notification 4</a></li>
									<li><a href="#">Another notification</a></li>
								</ul>
							</li>
							<li>
								<a href="">
									<i class="fa fa-search"></i>
									<p class="hidden-lg hidden-md">Search</p>
								</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="">
									<p>Account</p>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<p>
										Dropdown
										<b class="caret"></b>
									</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something</a></li>
									<li class="divider"></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</li>
							<li>
								<a href="#">
									<p>Log out</p>
								</a>
							</li>
							<li class="separator hidden-lg hidden-md"></li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<?php echo $this->fetch('content'); ?>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#">
									Home
								</a>
							</li>
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="<?php echo env('HTTP_HOST'); ?>"><?php echo env('HTTP_HOST'); ?></a>, made with love for a better web
					</p>
				</div>
			</footer>
		</div>
	</div>
	<?php echo  $this->Html->script(array('admin.min')); ?>
	<?php echo $this->fetch('script');?>
</body>
</html>
