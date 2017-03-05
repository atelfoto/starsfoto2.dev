<?= $this->assign('title',__('Connexion')); ?>
<?php echo $this->Html->meta(array('name' => 'robots','content'=>"No index, no follow"),NULL,array("inline"=>false));; ?>
<div class=" login">
	<div class="">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default box-home">
				<div class="media">
					<div class="media-left" style="padding: 20px;">
						<?php echo  $this->Html->image("logo_thumb.jpg", array("class"=>"img-circle")); ?>
					</div>
					<div class="media-body" style="padding-top: 30px;">
					<a href="/" style="text-decoration-style: none;"><h2 class="media-heading" style="color:#E98500 ;font-family:Tangerinebold;font-size:3.5em ;">Les Maraichers de la Coudraie</h2></a>
					</div>
				</div>
				<div class="panel-body">
					<?php  echo $this->Form->create(null, array('url' => array('controller' => 'users', 'action' => 'login')));?>
					<fieldset>
						<div class="form-group">
							<label for="username"> <?= __('Username :'); ?> <i class="fa fa-asterisk"></i></label>
							<div class="input-group">
								<?= $this->Form->input('username', array('required'=>false,'label' => false,'autofocus',
								'placeholder'=>__('Username :'),'class'=>'form-control')); ?>
								<div class="input-group-addon"><i class="fa fa-user"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="password"> <?= __('Password :'); ?> <i class="fa fa-asterisk"></i></label>
							<div class="input-group">
								<?= $this->Form->input('password', array('required'=>false,'label' => false ,
								'placeholder'=>__('Password :'),'class'=>'form-control')); ?>
								<div class="input-group-addon"><i class="fa fa-lock"></i>
								</div>
							</div>
						</div>
						<div class="input checkbox">
							<?php echo  $this->Form->input('remember', array('type'=>'checkbox', "checked"=>true,
							'label'=>__('Remember me') , 'required'=>false,'class'=>'input')); ?>
						</div>
						<ul style="margin-left:-40px; margin-top: 10px;list-style:none;">
							<li>
								<em style=""><?=  $this->Html->link(__('Forgot password?'), array('action' => 'forgot')); ?></em>
							</li>
						</ul>
					</fieldset>
					<button  type="submit" class="btn btn-primary btn-lg btn-block"> <?= __('Login'); ?></button>
					<?= $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix" style="padding-bottom: 25px;"></div>
