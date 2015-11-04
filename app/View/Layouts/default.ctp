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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Html->css('app');
		echo $this->Html->css('styles');
		//echo $this->Html->script(array('jquery-1.11.3.min','app'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
	//	echo $this->fetch('script');
	?>
</head>
<body id="home">
  <div class="site-container">
    <header class="header">
      <a href="#" class="header__icon" id="header__icon"></a>
      <a href="#" class="header__logo">Logo</a>
      <nav class="menu">
        <a href="#">item 01</a>
        <a href="#">item 02</a>
        <a href="#">item 03</a>
        <a href="#">item 04</a>
        <a href="#">item 05</a>
      </nav>
    </header>
    <div class="site-pusher">
      <div class="site-content" id="container">
        <div class="container">
        <?php echo $this->fetch('content'); ?>
        </div>
        <div id='container_footer'></div>
      </div>
      <footer id="footer"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit sed similique labore natus. Sequi aut ratione repudiandae velit eius, laboriosam possimus dolorum expedita commodi reprehenderit suscipit. Eius dolores laborum officiis.</p></footer>
      <div class="site-cache" id="site-cache"></div>
    </div>
  </div>
  <?php
		echo $this->Html->script(array('jquery-1.11.3.min','app'));
		echo $this->fetch('script');

   ?>
    <!-- <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script> -->
</body>
</html>
