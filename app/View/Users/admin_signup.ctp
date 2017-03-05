<?php echo $this->assign('title', __('user')); ?>
 <?php  $this->Html->addCrumb(__('user'),array('controller'=>'users','action'=>'index','admin'=>true)); ?>
 <?php  $this->Html->addCrumb(__('edit') ); ?>
<div class="users box box-primary">
	<?php echo $this->Form->create('User',array(
	'novalidate'=>true,
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-3 control-label'
		),
		//"between"=>'<div class="input-group"><div class="input-group-addon">
		//<i class="icon-user"></i>
		//</div>',
		"after"=>'</div>',
		'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-block text-danger  col-md-9 col-md-offset-3')),
		//'wrapInput' => 'col col-md-3',
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
		<?php echo $this->Form->input('name', array('class' => 'form-control',
		'placeholder' => __('Name'),
		"between"=>'<div class="input-group"><div class="input-group-addon">
		<i class="icon-user"></i>
		</div>'
		));?>
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
		'placeholder' => __('Password'),
				"between"=>'<div class="input-group"><div class="input-group-addon">
		<i class="icon-key"></i>
		</div>',));?>
		<?php echo $this->Form->input('group_id', array('class' => 'form-control',
				"between"=>'<div class="input-group"><div class="input-group-addon">
		<i class="icon-users"></i>
		</div>',));?>
	</div>
	<div class="text-right box-footer">
		<?php echo $this->Form->submit(__('publish'), array('div'=>false,'class' => 'btn btn-success')); ?>
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
