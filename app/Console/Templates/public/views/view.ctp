<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php echo "<?php echo \$this->Html->meta(array('name' => 'robots', 'content' =>\${$singularVar}['{$singularHumanName }']['robots']),NULL,array(\"inline\"=>false)); ?>\n"; ?>
<?php echo "<?php  \$this->Html->meta('description', \$this->Text->truncate(\${$singularVar}['{$singularHumanName }']['description'], 300, array(\"exact\"=>false)),array('inline' => false)); ?>\n"; ?>
<?php echo "<?php echo \$this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => \"article\" ),NULL,array(\"inline\"=>false)); ?>\n"; ?>
<?php echo "<?php echo \$this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => \${$singularVar}['{$singularHumanName }']['name']),NULL,array(\"inline\"=>false)); ?>\n";
 echo "<?php echo \$this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' =>
\"http://\".env('HTTP_HOST').\"/{$singularVar}/\".\${$singularVar}['{$singularHumanName }']['slug'] ),NULL,array(\"inline\"=>false));  ;?>\n";
 echo "<?php echo \$this->Html->meta(array('property' => 'og:description', 'type' => 'meta', 'content' =>
	\$this->Text->truncate(\${$singularVar}['{$singularHumanName }']['description'], 200, array(\"exact\"=>false))),NULL,array(\"inline\"=>false));  ;?>\n";
 echo "<?php echo \$this->Html->meta(array('name'=>'twitter:card','content'=>\"summary\"),NULL,array('inline'=>false));  ;?>\n";
 echo "<?php echo \$this->Html->meta(array('name'=>'twitter:title','content'=>\"château de chazeron \".\${$singularVar}['{$singularHumanName }']['name']),NULL,array('inline'=>false));  ;?>\n";
 echo "<?php echo \$this->Html->meta(array('name'=>'twitter:url','content'=>\"http://\".env('HTTP_HOST').\"/{$singularVar}/\".\${$singularVar}['{$singularHumanName}']['slug']),NULL,array('inline'=>false)); ?>\n";
 echo "<?php echo \$this->Html->meta(array('name' => 'twitter:description','content'=>
\$this->Text->truncate(\${$singularVar}['{$singularHumanName }']['description'], 160, array(\"exact\"=>false))
),NULL,array(\"inline\"=>false)); ;?>\n";
 echo "<?php  echo \$this->Html->meta(array('name'=>'twitter:image','content'=>\"http://\".env('HTTP_HOST').\"/img/summary.jpg\"),NULL,array('inline'=>false));?>\n"; ?>
<?php echo "
<?php \$this->assign('title',\${$singularVar}['{$singularHumanName}']['name']);
\$this->Html->addCrumb(__('{$singularHumanName}'),array(\"controller\"=>\"{$pluralVar}\",\"action\"=>\"index\"));
\$this->Html->addCrumb( \${$singularVar}['{$singularHumanName }']['name']);  ?>\n"; ?>
<div class="container container-">
	<div class=" page-content">
		<h2> <?php echo "<?php echo \${$singularVar}['{$singularHumanName }']['name'] ?>"; ?></h2>
		 <?php echo "<?php echo \${$singularVar}['{$singularHumanName }']['content'] ?>"; ?>

	</div>
	<hr class="style-two">
</div>
