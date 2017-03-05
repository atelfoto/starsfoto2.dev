<?php echo $this->assign('title', __('Users')); ?>
 <?php $this->Html->addCrumb(__('Users')); ?>
 <div class="users  row">
 	<div class="col-xs-12">
 	<div class="box box-primary">
		<div class="box-header">
			<h2 class="box-title"><i class="icon-users"></i>&nbsp;<?php echo __('Users'); ?></h2>
			<div class="box-tools pull-right">
				<button class="btn btn-sm" data-toggle="modal" data-target="#ModalAide">
					<i class="icon-help-circled">&nbsp;Help</i>
				</button>
				<?php echo $this->Html->link("<i class='icon-plus'></i>". __(" Add"),array('action'=>'add'),
				array('class' =>"btn btn-success btn-sm",'escape'=>false)); ?>
			</div>
		</div>
		<div class="panel table-responsive box-body">
			<table id="exemple"  class="table table-bordered text-center table-striped display">
				<thead>
					<tr class="info">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('fonction'); ?></th>
						<th><?php echo $this->Paginator->sort('lastname'); ?></th>
						<th><?php echo $this->Paginator->sort('firstname'); ?></th>
						<th><?php echo $this->Paginator->sort('mail'); ?></th>
						<th><?php echo $this->Paginator->sort('role'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th><?php echo $this->Paginator->sort('lastlogin'); ?></th>
						<th><?php echo $this->Paginator->sort('active'); ?></th>
						<th colspan="3" class="actions"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
					<tr>
						<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['fonction']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['mail']); ?>&nbsp;</td>
						<td> <?php echo h($user['User']['role']) ?></td>
						<td><?php  echo $this->Time->format($user['User']['created'], '%A %e %B, %Y'); ?>&nbsp;</td>
						<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['lastlogin']); ?>&nbsp;</td>
						<td><?php if($user['User'][ 'active' ] == 0) {
							echo $this->Html->link('<span class="label label-danger"><i class="icon-cancel-circled">'.__('Offline').'</i></span>',
										array('action'=>'enable', $user['User']['id']),
										array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
											 "title"=>__('Enable this User'),'escape'=>false));
										}else{
											echo $this->Html->link('<span class="label label-success"><i class="icon-ok">'.__('In line').'</i></span>',
											array('action'=>'disable', $user['User']['id']),
											array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
												"title"=>__('Disable this User'),'escape'=>false));
												}
								?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="icon-eye"></span>',
							array('action' => 'view', $user['User']['id']),
							array('class'=>'btn btn-default','escape' => false,
							"data-title"=>__('view').' '.$user['User']['lastname'],'data-toggle'=>"tooltip","data-placement"=>"bottom")); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="icon-pencil"></span>',
							array('action' => 'edit', $user['User']['id']),
							array('class'=>'btn btn-default','escape' => false,
							"data-title"=>__('edit').' '.$user['User']['lastname'],'data-toggle'=>"tooltip","data-placement"=>"bottom")); ?>
						</td>
						<td class="actions">
							<p data-placement="bottom" data-toggle="tooltip" title="<?= __('delete').' '.$user['User']['lastname']; ?>" class="text-center">
							<?php echo $this->Html->link('<span class="icon-trash"></span>',"#delete".$user['User']['id'],
									array('class'=>'btn btn-default btn-remove-modal',
									'escape' => false,
									'data-toggle' =>'modal',
									'role'=>'button',
									"data-target"=>"#delete".$user['User']['id'],
									"data-title"=> __('delete'),
									'data-uid'=>$user['User']['id']
									)
							 ); ?>
							</p>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="text-center box-footer">
			<?php echo $this->element('pagination'); ?>
			<?php  echo $this->element("pagination-counter"); ?>
		</div>
	</div>
</div><!-- end containing of content -->
<?php foreach ($users  as $k => $v): $v = current($v);?><!-- modal supprimer -->
<div class="modal fade" id="delete<?= $v['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="  Press Esc to close">&times;</button>
				<h4 ><?php echo __('Remove User') ?></h4>
			</div>
			<div class="modal-body">
				<p> <?php echo __('Are you sure you want to delete'); ?> <b style="color:#f00;">&nbsp;<?php echo $v['username'];?> &nbsp;</b>
					<?php echo __('of your') ?>
					<span class="label-uname strong"></span> ?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
				<?php echo __('Cancel') ?>
				</button>
					<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$v['id']),
							array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach ?><!-- fin modal supprimer -->
<div class="modal fade" id="ModalAide"> <!-- modal Aide -->
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove-sign" style="color:#f00;"></i></button>
					<h4 id="myModalLabel">Help</h4>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Closed</button>
			</div>
		</div><!-- /.modal-aide-content -->
	</div><!-- /.modal-aide-dialog -->
</div><!-- /.modal-aide -->
<?php  $this->Html->script(array("admin.min"), array('inline'=>false)); ?>

