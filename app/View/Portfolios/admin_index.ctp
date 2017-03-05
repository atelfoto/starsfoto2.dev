<?= $this->assign('title',__('photo gallery')); ?>
<?php $this->Html->addCrumb(__('photo gallery')); ?>
<?php  $this->Paginator->options(array(
'update'=> '#portfolio',
'before'=> $this->Js->get("#process")->effect('fadeIn',array('buffer'=>false)),
'complete'=> $this->Js->get("#process")->effect('fadeOut',array('buffer'=>false))
)); ?>
<div class="row">
<div class="portfolios index col-md-12" id="portfolio">
	<div class="page-header ">
		<h2><i class="fa fa-file-image-o">&nbsp;</i><?php echo __('portfolio manager'); ?></h2>
	</div>
	<div class="progress? spin overlay " id="process">
    	<i class="fa fa-refresh fa-spin fa-2x"></i>
    	<span class="sr-only">100% Complete</span>
	</div>
	<div class="text-right " style='margin-bottom:10px;'>
		<button class="btn btn-default" data-toggle="modal" data-target="#ModalAide"><i class="glyphicon glyphicon-question-sign">&nbsp;<?= __('Help') ?></i></button>
		<?php echo $this->Html->link("<i class='glyphicon glyphicon-plus'></i>". __("Add portfolio"),array('action'=>'add'),
		array('class'=>"btn btn-success",'escape'=>false)); ?>
	</div>
	<div class="table-responsive box-home">
		<table  class="table table-striped">
			<thead style="">
				<tr class="info">
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo '#'; ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th><?php echo $this->Paginator->sort('online'); ?></th>
					<th class="actions" colspan="3">actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($portfolios as $portfolio): ?>
				<tr>
					<td><?php echo h($portfolio['Portfolio']['id']); ?>&nbsp;</td>
					<td class="admin-edit-thumb img-thumbnail">
						<?php echo  $this->Html->image('../files/portfolio/photo/' . $portfolio['Portfolio']['photo_dir'] . '/' . 'thumb_' .$portfolio['Portfolio']['photo'],
							array("url"=> array("controller"=>'portfolios','action'=>'view',"slug"=>$portfolio['Portfolio']['slug'],"admin"=>false ))); ?>
					</td>
					<td><?php echo h($portfolio['Portfolio']['name']); ?>&nbsp;</td>
					<td><?php echo h($portfolio['User']['username']); ?></td>
					<td><?php echo $this->Date->french($portfolio['Portfolio']['created']); ?>&nbsp;
					</td>
					<td><?php echo $this->Date->french($portfolio['Portfolio']['modified']); ?>&nbsp;
					</td>
						<td><?php if($portfolio['Portfolio'][ 'online' ] == 0) {
							echo $this->Html->link('<span class="label label-danger">'.__('Offline').'</span>',
							array('action'=>'enable', $portfolio['Portfolio']['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip","data-placement"=>"bottom",
								"title"=>__('Enable this portfolio'),'escape'=>false));
							}else{
								echo $this->Html->link('<span class="label label-success">'.__('In line').'</span>',
								array('action'=>'disable', $portfolio['Portfolio']['id']),
								array("style"=>"text-decoration:none;","data-toggle"=>"tooltip",
									"data-placement"=>"bottom", "title"=>__('Disable this Post'),'escape'=>false));
								}
							?>
					</td>
					<td>
						<?php echo $this->Html->link('<span class="fa fa-picture-o fa-2x" style="color:#00f;"></span>',
						array('controller' => 'portfolios', 'action' => 'upload',$portfolio['Portfolio']['id']),
						array('class'=>'btn btn-default btn-sm','escape'=>false,
						'data-title'=>__('upload pictures'),'data-toggle'=>'tooltip','data-placement'=>'bottom')); ?>
					</td>
					<td class="actions">
						<?php echo $this->Html->link('<span class="fa fa-edit fa-2x" style="color:#00f;"></span>',
						 array('action' => 'edit', $portfolio['Portfolio']['id']),
						 array('class' => 'btn btn-default btn-sm','escape' => false,
						 'data-title'=>__('edit').' '.$portfolio['Portfolio']['name'],'data-toggle'=>'tooltip','data-placement'=>'bottom')); ?>
					</td>
					<td>
						<p data-placement='bottom' data-toggle='tooltip' title='<?= __('delete').' '.$portfolio['Portfolio']['name'];?>' class='text-center'>
						<?php echo $this->Html->link('<span class="fa fa-trash	fa-2x" style="color:#f00;"></span>','#Modal'.$portfolio['Portfolio']['id'],
						array(
							'class' => 'btn btn-default btn-remove-modal btn-sm',
							'escape' =>false,
							'data-toggle' => 'modal',
							'role'  => 'button',
							'data-uid' => $portfolio['Portfolio']['id']
							)); ?>
						</p>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div> <!-- end col md 9 -->
	<div class="col-md-12 text-center">
		<?php echo $this->element('pagination'); ?>
		<?php echo $this->element('pagination-counter'); ?>

	</div>
	<?php  echo $this->Js->writeBuffer(); ?>
</div><!-- end containing of content -->
</div> <!-- /end row-->
<!-- modal supprimer -->
<?php foreach ($portfolios as $k => $v): $v = current($v);?>
<div class="modal fade" id="Modal<?= $v['id']; ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title=" <?php echo __(' Press Esc to close'); ?>">&times;</button>
				<h4><i class="fa fa-exclamation-triangle fa-lg" style="color:#f1b900;"></i>
				&nbsp;&nbsp;<?php echo __('Remove Post') ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo __('Are you sure you want to delete'); ?>&nbsp;
					<b style="color:#f00;">
					<?php echo  $v['name'] ?></b>&nbsp;
					<?php echo __('of your Articles') ?>
					<span class="label-uname strong"></span> ?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
				<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$v['id']),
						array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach ?>  <!-- fin modal supprimer -->
<div class="modal fade" id="ModalAide"> <!-- modal Aide -->
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove-sign" style="color:#f00;"></i></button>
				<h4 id="myModalLabel"><?= __('Help') ?></h4>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Closed') ?></button>
			</div>
		</div><!-- /.modal-aide-content -->
	</div><!-- /.modal-aide-dialog -->
</div><!-- /.modal-aide -->
