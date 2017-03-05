 <div class="box-overlay">
 	<div class="box">
 		<div class="box-title"><?= __('Change password') ; ?></div>
 		<div class="box-content">
 			<?= $this->Form->create('User',array("url"=>array('controller'=>'users','action'=>'password'),'novalidate'=>true,
 			'inputDefault'=>array(
 			'div'=>'form-group'),
 			'class'=>'form-horizontal')); ?>
 			<fieldset>
    			<legend></legend>
		     		<?= $this->Form->input('password', array('placeholder'=>__('password'),
		     		'label' =>array('text'=> __('Password'),"class"=>'control-label'))); ?>
		     		<?= $this->Form->input('password2', array('type'=>'password',"placeholder"=>__('confirm password'),
		     		 'label' =>array('text'=> __('Confirm Password'),"class"=>'control_label'))); ?>
		       		<br>
 				<div class="button text-right">
 					<button  type="submit" class="btn btn-primary"> <?= __('Submit'); ?></button>
 				</div>
 			</fieldset>
 			<?php  echo $this->Form->end(); ?>
 		</div>
 	</div>
 </div>
