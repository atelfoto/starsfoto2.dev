<?php echo $this->assign('title', __('user')); ?>
 <?php  $this->Html->addCrumb(__('user'),array('controller'=>'users','action'=>'index','admin'=>true)); ?>
 <?php  $this->Html->addCrumb(__('edit') ); ?>
<div class="users box box-primary">
	<?php echo $this->Form->create('User',array(
	'novalidate'=>true,
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-4 control-label'
		),
		"after"=>'</div>',
		'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block text-danger  col-md-9 col-md-offset-3')),
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
	)); ?>
	<div class="box-header with-border">
		<h3 class="box-title"><i class="icon-user"></i>&nbsp;<?php echo __('Add User'); ?></h3>
		<div class="box-tools pull-right">
			<?php echo $this->Form->button('<i class="icon-ok " style="color:#fff;">&nbsp;</i>'.__('publish'),
									array('class' => 'btn btn-success btn-sm')); ?>
			<?php echo $this->html->link('<i class="icon-cancel-circled" style="color:#f00;">&nbsp;</i>'.__('closed'),
										array('controller'=>'users','action'=>'index'),
									array('class' => 'btn btn-default btn-sm','escape'=>false)); ?>
			<?php   echo $this->Form->input('active', array('label' =>false,"div"=>array('class'=>'pull-left'),'after'=>false));?>
		</div>
	</div>
	<div class="box-body box-body-offerings">
		<?php echo $this->Form->input('username', array('class' => 'form-control',
		'placeholder' => __('Username'),
		"between"=>'<div class="input-group"><div class="input-group-addon">
		<i class="icon-user"></i>
		</div>',));?>
		<?php echo $this->Form->input('mail', array('class' => 'form-control',
			'placeholder' => __('Mail'),
			"between"=>'<div class="input-group"><div class="input-group-addon">
			<i class="icon-mail"></i>
			</div>',));?>
		<?php echo $this->Form->input('password', array('class' => 'form-control',
			'placeholder' => __('password'),
			"between"=>'<div class="input-group"><div class="input-group-addon">
			<i class="icon-key"></i>
			</div>',));?>
		<?php echo $this->Form->input('password2', array(
			'class' => 'form-control',
			'placeholder' => __('Confirm Password'), 'type'=>'password',
			'label'=>array("text"=>__('confirm password'),'class'=>'col-md-4 control-label'),
			"between"=>'<div class="input-group"><div class="input-group-addon"><i class="icon-key"></i></div>'));?>
		<?php echo $this->Form->input('role', array('class' => 'form-control','options' => array("admin", "member"),
			"empty"=>__('choose'), "between"=>'<div class="input-group"><div class="input-group-addon">
		<i class="icon-users"></i>
		</div>'
		));?>
	</div>
	<div class="text-right box-footer">
		<?php echo $this->Form->submit(__('publish'), array('div'=>false,'class' => 'btn btn-success')); ?>
		<?php echo $this->Form->button("reset",array("type"=>"reset",'class'=>"btn btn-default")); ?>
		<?php echo $this->html->link('<i class="icon-cancel-circled" style="color:#f00;">&nbsp;</i>'.__('closed'),
		array('controller'=>'users','action'=>'index'),
		array('class' => 'btn btn-default','escape'=>false)); ?>
	</div>
	<?php echo $this->Form->end() ?>
	<!-- end containers -->
</div>
<?php  echo  $this->Html->scriptStart(array('inline'=>false)); ?>
//pour les toogle
  $(function() {
    $('#UserActive').bootstrapToggle({
    size:'small',
    onstyle:'primary',
    offstyle:'danger',
    });
  });
<?= $this->Html->scriptEnd(); ?>
