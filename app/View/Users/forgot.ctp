 <div class="box-overlay container">
 	<div class="box">
 		<div class="box-title"><?= __('Password Reminder'); ?></div>
 		<div class="box-content">
 			<?= $this->Form->create('User',array("url"=>array('controller'=>'users','action'=>'forgot'),'novalidate'=>true,
 			'inputDefault'=>array(
 			'div'=>'form-group'),
 			'class'=>'form-horizontal')); ?>
 			<fieldset>
 				<p style='font-family:"Lora";font-size:0.8em;font-style:italic;'><?php echo __('To change your password please fill in the fields below your email address.');
 					echo "<br>";
 					echo __('An email will be sent with the information needed to create your new password'); ?>
 				</p>
 				<?= $this->Form->input('mail', array('required'=>false,'label' => __('Your Mail'),
 				'placeholder'=>__('Your Mail :'),"div"=>array('style'=>'margin-bottom:20px;'), 'class'=>'form-control')); ?>
 				<div class="button text-right">
 					<button  type="submit" class="btn btn-primary"> <?= __('Submit'); ?></button>
 				</div>
 			</fieldset>
 			<?php  echo $this->Form->end(); ?>
 		</div>
 	</div>
 </div>
