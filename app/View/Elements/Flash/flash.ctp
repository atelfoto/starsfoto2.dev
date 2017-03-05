<?php //  echo $this->Html->script('flash.js', array('inline' => true)); ?>
<div  class="alert alert-<?= isset($class) ? $class: 'success'; ?> flash-msg" role="alert" >
<span class="glyphicon glyphicon-<?= isset($type) ? $type: 'ok-sign'; ?> flash-msg" aria-hidden="true"></span>
<!-- <span class="glyphicon glyphicon-exclamation-sign" role='alert' aria-hidden="true"></span> -->
<a href="" class="close" onclick="$(this).parent().slideUp();">X</a>
<?= $message; ?>
</div>
<?=  $this->Html->scriptStart(array('online'=>false)); ?>
$(document).ready(function(){
	$('.flash-msg').delay(5000).fadeOut('slow');
});
<?=  $this->Html->scriptEnd(); ?>
