 <div class="box-overlay">
 	<div class="box">
 		<div class="box-title"><?= __('Login'); ?></div>
 		<div class="box-content">
 			<?= $this->Form->create('User',array("url"=>array('controller'=>'users','action'=>'login'),'novalidate' => true,
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
 					<?= $this->Form->input('password', array('required'=>false,
 						'label' => array("text"=> __('Password'),"class"=>'control-label'),
 						'placeholder'=>__('Password :'))); ?>
 					<?php echo  $this->Form->input('remember', array(
 					'type'=>'checkbox', "checked"=>true,
 					'label'=>array('name'=>__('Remember me'),'class'=>'control-label'),
 					 'required'=>false,'class'=>'input')); ?>
 					<ul>
 						<li>
 							<a href="#" id="forgot"><?=  $this->Html->link(__('Forgot password?'), array('action' => 'forgot')); ?></a>
 						</li>
 					</ul>
 					<div class="button text-right">
 						<button  type="submit" class="btn btn-primary"> <?= __('Login'); ?></button>
 						<button  type="reset" class="btn btn-primary"> <?= __('Reset'); ?></button>
					</div>
				</fieldset>
 			<?php  echo $this->Form->end(); ?>
 		</div>
 	</div>
 </div>
