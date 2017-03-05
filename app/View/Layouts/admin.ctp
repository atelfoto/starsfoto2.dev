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

$cakeDescription = __d('cake_dev', 'Les Maraîchers de la Coudraie: Admin');
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
	<div  class="wrapper">
		<header class="main-header">
			<?= $this->Html->link("Les Maraîchers de la Coudraie", array("controller"=>"pages","action" =>"index","admin"=>false ),
			array("class"=>"logo header__logox" , "data-toggle"=>"tooltip","data-placement"=>"bottom",'title'=>'Aller sur le site')); ?>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" data-placement="bottom"  role="button" title="réduire le menu">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="<?= $this->Html->url(array('controller' => 'helps', 'action' => 'index')); ?> " class="">
								<i class="icon-help-circled"></i>	Aide
							</a>
						</li>
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if ($this->Session->read('Auth.User.avatar')==1):
								echo $this->Html->image($this->Session->read('Auth.User.avatarm').'?'.rand(),array('class'=>'user-image','title'=>'avatar'));
								else:
									echo $this->Html->image('avatars/gravatar_mini.jpg',array('class'=>"user-image",'title'=>'avatar'));
								endif ?>
								<span class="hidden-xs text-capitalize"><?php echo $this->Session->read('Auth.User.username'); ?></span>
							</a>
							<ul class="dropdown-menu" role="menu" >
								<li class="user-header">
									<?php if ($this->Session->read('Auth.User.avatar')==1):
									echo $this->Html->image($this->Session->read('Auth.User.avatart') . '?' . rand(),array('class'=>'img-circle center-block','title'=>'avatar'));
									else:
										echo $this->Html->image('avatars/gravatar_thumb.jpg',array('class'=>"img-circle center-block",'title'=>'avatar'));
									endif
									?>
									<p>
										<?php echo $this->Session->read('Auth.User.username'); ?>
										<small> <?php echo __('Member since'); ?>&nbsp; <?php echo $this->Session->read('Auth.User.created'); ?></small>
									</p>
								</li>
								<li class="user-body">
								</li>
								<li class="user-footer">
									<div class="pull-left">
										<?= $this->Html->link('<i class="icon-user fa-fw"></i> '.__('Account'),
									 	array('controller' => 'users', 'action' => 'account'),
									  	array("class"=>"btn btn-default btn-flat", 'escape'=>false)); ?>
								 	</div>
								 	<div class="pull-right">
								 		<?php echo $this->Html->link('<i class="icon-link-ext"></i> '.__("Logout").'',
								 		array('controller' => 'users', 'action' => 'logout','admin'=>true),
								 		array('escape'=>false,"class"=>"btn btn-default btn-flat")); ?>
								 	</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<div class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<?php if ($this->Session->read('Auth.User.avatar')==1):
						echo $this->Html->image($this->Session->read('Auth.User.avatarm') . '?' . rand(),
							array('class'=>'img-circle center-block','alt'=>'User Image','title'=>'avatar'));
						else:
							echo $this->Html->image('avatars/gravatar_mini.jpg',array('class'=>'img-circle center-block','alt'=>'User Image','title'=>'avatar'));
						endif ?>
					</div>
    			  <div class="pull-left info">
    			    <p><?php echo $this->Session->read('Auth.User.username'); ?></p>
    			    <!-- Status -->
    			    <a href="#"><i class="icon-circle text-success"></i> Online</a>
    			  </div>
    			</div>
    			<ul class="sidebar-menu">
    				<li class="header">header</li>
    				<?php  echo $this->element("menu/admin/sidebar") ?>
    			</ul>
			</div>
		</aside>
		<div class="content-wrapper"><?php echo $this->Flash->render(); ?>
			<section class="content-header" >
			    <h1>
			    	<?php  echo $this->fetch('title'); ?>
        			<small><?= isset($actionHeading) ? $actionHeading : "" ; ?></small>
      			</h1>
    			<ol class="breadcrumb">
    			  <li>
    			  	<?php  echo $this->Html->getCrumbs(' </li> <li> ',array('text' => "<i class='icon-gauge'></i>&nbsp;". __('Dashboard'),
    			  	'url' => array('controller' => 'menus', 'action' => 'dashboard',"admin"=>true),'escape' => false)); ?></li>
    			</ol>
			</section>
			<section class="content">

				<?php echo $this->fetch('content'); ?>
			</section>
		</div>
		<footer class="main-footer text-center">
			<div class="pull-right hidden-xs">
				<b>Version</b> <?php echo $cakeVersion; ?>
			</div>
			<strong>Copyright &copy; 2007-<?php echo date('Y'); ?> <a href=""><?php echo env('HTTP_HOST'); ?></a>.</strong> All rights reserved.
		</footer>
	</div>
	<?php echo  $this->Html->script(array('admin.min')); ?>

	<?php echo $this->fetch('script');?>
</body>
</html>
