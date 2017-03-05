<?php echo $this->assign('title', __('user')); ?>
 <?php $this->Html->addCrumb(__('user'),array('controller'=>'users','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb('edit' ); ?>
<div class="users index row">
	<div class="col-md-12 page-header">
		<h2><i class="fa fa-book"></i>&nbsp;<?php echo __('Admin Edit User'); ?>		</h2>
	</div>
	<div class="col-md-12 col-lg-10 col-lg-offset-1">
		<div class=" box-home">
			<div class="well">
				<?php echo $this->Form->create('User'); ?>
				<div class="tabpanel">
					<nav class="navbar">
				    	<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li>
									<?php echo $this->Form->input('active', array('label' =>false));?>
								</li>
								<li >
									<?php echo $this->Form->button('<i class="icon-ok btn-sm" style="color:#fff;">&nbsp;</i>'.__('publish'),
							 array('class' => 'btn btn-success btn-sm')); ?>
								</li >
								<li >
									<?php echo $this->html->link('<i class="icon-cancel-circled btn-sm" style="color:#f00;">&nbsp;</i>'.__('Closed'),
							array('controller'=>'users','action'=>'index'),
							array('class' => 'btn btn-default','type'=>'button','escape'=>false)); ?>
								</li >
							</ul>
						</div>
					</nav>
					<div class="tab-content">
						<div class="tab-pane fade in active" role="tabpanel" id="contenu">
							<div class="form-group">
								<?php echo $this->Form->input('id', array('class' => 'form-control',
							 'placeholder' => __('Id')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('name', array('class' => 'form-control',
							 'placeholder' => __('Name')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('username', array('class' => 'form-control',
							 'placeholder' => __('Username')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('mail', array('class' => 'form-control',
							 'placeholder' => __('Mail')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('password', array('class' => 'form-control',
							 'placeholder' => __('Password')));?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('role', array('class' => 'form-control','options' => array("admin", "member")));?>
							</div>
					  	</div>
					</div>
				</div>
				<div class="text-right" style="margin-top:10px;">
					<?php echo $this->Form->submit(__('publish'), array('div'=>false,'class' => 'btn btn-primary')); ?>
					<?php echo $this->html->link('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>'.__('Closed'),
					array('controller'=>'users','action'=>'index'),
					array('class' => 'btn btn-default','escape'=>false)); ?>
				</div>
				<?php echo $this->Form->end() ?>
			</div>
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
    $('#UserActive').bootstrapToggle({
    size:'small',
    onstyle:'primary',
    offstyle:'danger',
    });
  });

<?= $this->Html->scriptEnd(); ?>
