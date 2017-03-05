<?php echo $this->assign('title', __('user')); ?>
 <?php $this->Html->addCrumb(__('user'),array('controller'=>'users','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb('edit' ); ?>
<div class="users index row">
	<div class="col-sm-12 page-header">
		<h3><i class="icon-users"></i>&nbsp;<?php echo __('Admin Add User'); ?>		</h3>
	</div>
	<div class="col-sm-12">
		<div class="box box-primary  with-border nav-tabs-custom">
			<?php echo $this->Form->create('User',array(
				'novalidate'=>true,
				'inputDefaults'=>array(
				'div'=>'form-group',
				'label'=>array('class'=>'control-label'),
				'after'=>'</div>',
				'error'=>array('attributes' => array('wrap' => 'span', 'class' => 'help-block text-danger')),
				'class'=>'form-control'),
				'class'=>'')); ?>
			<ul class="nav nav-tabs" role="tablist">
		 		<li role="presentation" class="active">
		 			<a href="#contenu" role="tab" data-toggle="tab" aria-controls="contenu">contenu</a>
		 		</li>
		 		<li role="presentation">
		 			<a href="#publication" role="tab" data-toggle="tab" aria-controls="publication">publication</a>
		 		</li>
				<li class='pull-right'>
					<?php echo $this->html->link('<i class="icon-cancel-circled" style="color:#f00;">&nbsp;</i>'.__('closed'),
							array('controller'=>'users','action'=>'index'),
							array('class' => 'btn btn-default','escape'=>false)); ?>
				</li>
				<li class='pull-right'>
					<?php echo $this->Form->button('<i class="icon-ok" style="color:#fff;">&nbsp;</i>'.__('publish'),
			 				array('class' => 'btn btn-success  pull-right')); ?>
				</li>
				<li class='pull-right'>
					<?php echo $this->Form->input('online', array('label' => false,'div'=>array('class'=>'pull-right'),
							'after'=>false)); ?>
				</li>
			</ul>
			<div class="tab-content box-body">
				<div class="tab-pane fade in active" role="tabpanel" id="contenu">
					<?php echo $this->Form->input('username', array('class' => 'form-control',
							 'placeholder' => __('Username'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-username"></i></div>'
							 ));?>
					<?php echo $this->Form->input('password', array('class' => 'form-control',
							 'placeholder' => __('Password'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-password"></i></div>'
							 ));?>
					<?php echo $this->Form->input('mail', array('class' => 'form-control',
							 'placeholder' => __('Mail'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-mail"></i></div>'
							 ));?>
					<?php echo $this->Form->input('avatar', array('class' => 'form-control',
							 'placeholder' => __('Avatar'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-avatar"></i></div>'
							 ));?>
					<?php echo $this->Form->input('role', array('class' => 'form-control',
							 'placeholder' => __('Role'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-role"></i></div>'
							 ));?>
					<?php echo $this->Form->input('token', array('class' => 'form-control',
							 'placeholder' => __('Token'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-token"></i></div>'
							 ));?>
					<?php echo $this->Form->input('lastlogin', array('class' => 'form-control',
							 'placeholder' => __('Lastlogin'),
							 'between'=>'<div class="input-group"><div class="input-group-addon"><i class="icon-lastlogin"></i></div>'
							 ));?>
				</div>
				<div class="tab-pane fade" role="tabpanel" id="publication">

				</div>
			</div>
			<div class="text-right box-footer" style="margin-top:10px;">
				<?php echo $this->Form->submit(__('publish'), array('div'=>false,'class' => 'btn btn-primary')); ?>
				<?php echo $this->html->link('<i class="icon-cancel-circled" style="color:#f00;">&nbsp;</i>'.__('closed'),
						array('controller'=>'users','action'=>'index'),
						array('class' => 'btn btn-default','escape'=>false)); ?>
			</div>
			<?php echo $this->Form->end() ?>
		</div>
	</div><!-- end containers -->
</div>
<?php echo  $this->Html->scriptStart(array('inline'=>false)); ?>
//pour les tabs
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
//pour les toogle
  $(function() {
    $('#UserOnline').bootstrapToggle({
		size:'small',
		onstyle: 'primary',
		offstyle:'danger',
    });
  });
 <?= $this->Html->scriptEnd(); ?>
