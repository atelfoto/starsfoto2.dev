<!-- <div class="message success" onclick="this.classList.add('hidden')"><?= h($message) ?></div> -->
<div class="alert alert-success flash-msg" role="alert" aria-hidden="true" style="width: 50%;z-index: 2000;position: absolute;margin-top:5px;margin-left:10px;">
	<span class="icon-ok " role="alert" aria-hidden="true" ></span>
		<span class="sr-only"><?php echo __('Error:'); ?></span>
		<a href="#" class="close "  >X</a>
	<span class="message" ><?= $message; ?></span>
</div>

<?php  echo  $this->Html->scriptStart(array('inline'=>false)); ?>
  jQuery(function(){
    $(document).ready(function(){
			$('.flash-msg').delay(10000).fadeOut('slow');
 		});
  });
<?php echo  $this->Html->scriptEnd(); ?>




