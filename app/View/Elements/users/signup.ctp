 <div class="box-overlay">
 	<div class="box">
 		<div class="box-title"><?= __('signup'); ?></div>
 		<div class="box-content">
 			<?= $this->Form->create('User',array("url"=>array('controller'=>'users','action'=>'signup'),'novalidate' => true,
 				'inputDefaults' => array(
 					'div' => 'form-group',
 					'class' => 'form-control'
 						),
 						'class' => 'form-horizontal'
 					)

 					);
 				 ?>
 				<fieldset>
 					<?= $this->Form->input('username', array('required'=>false,
 						'label' =>array('text'=>__('Username'),'class'=>"control-label"),
 						'placeholder'=>__('Username'),'autofocus'=>true)); ?>
 					<?= $this->Form->input('mail', array('required'=>false,
 						'label' => array("text"=> __('mail'),"class"=>'control-label'),
 						'placeholder'=>__('mail :'))); ?>
 					<?= $this->Form->input('password', array('required'=>false,
 						'label' => array("text"=> __('Password'),"class"=>'control-label'),
 						'placeholder'=>__('Password :'))); ?>
 					<?= $this->Form->input('password2', array('required'=>false,"type"=>'password',
 						'label' => array("text"=> __('confirm'),"class"=>'control-label'),
 						'placeholder'=>__('confirm Password :'))); ?>
 					<div class="button text-right">
 						<button  type="submit" class="btn btn-primary"> <?= __('signup'); ?></button>
 						<button  type="reset" class="btn btn-primary"> <?= __('Reset'); ?></button>
					</div>
				</fieldset>
 			<?php  echo $this->Form->end(); ?>
 		</div>
 	</div>
 </div>
