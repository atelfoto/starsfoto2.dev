<!-- <div class="message error" onclick="this.classList.add('hidden');"><?= h($message) ?></div> -->
<div class="alert alert-danger flash-msg" role="alert" aria-hidden="true" style="width: 50%;z-index: 2000;position: absolute;margin-top:5px;margin-left:10px;">
	<span class="icon-cancel-circled" role="alert" aria-hidden="true" ></span>
		<span class="sr-only"><?php echo __('Error:'); ?></span>
		<a href="#" class="close "  >X</a>
	<span class="message" ><?= $message; ?></span>
</div>

<?php  echo  $this->Html->scriptStart(array('inline'=>false)); ?>
  jQuery(function(){
          $('.close').click(function(){
                  var e = $(this);
                  $.get(e.attr('href'));
                  e.parent().slideUp('slow');
                  return false;
          });
         $(document).ready(function(){
			$('.flash-msg').delay(10000).fadeOut('slow');
 		});
  });
<?php echo  $this->Html->scriptEnd(); ?>
