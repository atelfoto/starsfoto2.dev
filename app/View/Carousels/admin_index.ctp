<?php echo $this->assign('title', __('Carousel')); ?>
<?php $this->Html->addCrumb($actionHeading); ?>
<?php  $this->Paginator->options(array(
'update'=> '#contentCarousel',
'before'=> $this->Js->get("#process")->effect('fadeIn',array('buffer'=>false)),
'complete'=> $this->Js->get("#process")->effect('fadeOut',array('buffer'=>false))
)); ?>
<div class="row">
<div class="index col-md-12" id="contentCarousel">
	<div class="page-header">
		<h2>
			<i class="fa fa-file-image-o">&nbsp;</i>
			<?php echo __('Carousel'); ?>
		</h2>
	</div>
	<div class="progress? spin overlay" id="process">
    	<i class="fa fa-refresh fa-spin fa-2x"></i>
    	<span class="sr-only">100% Complete</span>
	</div>
	<div class="text-right" style='margin-bottom:10px;'>
		<button class="btn btn-default" data-toggle="modal" data-target="#ModalAide"><i class="glyphicon glyphicon-question-sign">&nbsp;<?= __('Help') ?></i></button>
		<?php echo $this->Html->link("<i class='glyphicon glyphicon-plus'></i>". __("New picture"),array('action'=>'add'),
			array('class'=>"btn btn-success ",'escape'=>false));
		?>
	</div>
	<div class="panel panel-info table-responsive box-home">
		<table  class="table table-striped">
			<thead style="">
				<tr class="info">
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo '#'; ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th><?php echo $this->Paginator->sort('class',__('active')); ?></th>
					<th><?php echo $this->Paginator->sort('online'); ?></th>
					<th class="actions" colspan="3"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($carousels as $carousel): ?>
					<tr>
						<td><?php echo h($carousel['Carousel']['id']); ?>&nbsp;</td>
						<td class="admin-edit-thumb img-thumbnail" data-toggle="tooltip"
								data-placement="top" title="<?php echo __('view this picture') ?>">
							<?php echo  $this->Html->image('../files/carousel/photo/'. $carousel['Carousel']['photo_dir'] . '/' . 'thumb_' .$carousel['Carousel']['photo'],
							array("url"=> array("controller"=>'carousels','action'=>'view',$carousel['Carousel']['id'],"admin"=>true ))); ?>
						</td>
						<td><?php echo h($carousel['Carousel']['name']); ?>&nbsp;</td>
						<td><?php echo h($carousel['User']['username']); ?></td>
						<td><?php echo $this->Date->french($carousel['Carousel']['created']); ?>&nbsp;</td>
						<td><?php echo $this->Date->french($carousel['Carousel']['modified']); ?>&nbsp;</td>
						<td><?php if($carousel['Carousel'][ 'class' ] === "active") {
							echo $this->Html->tag('span', "", array('class' => "glyphicon glyphicon-star","style"=>"font-size: 18px; color: rgb(240, 173, 78)"));
							}else{
							echo $this->Html->link('<span class="glyphicon glyphicon-star-empty" style="font-size: 18px; color: rgb(230, 230, 230)"></span>',
							array('action'=>'active', $carousel['Carousel']['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip",
								"data-placement"=>"top", "title"=>__('Activate this picture'),'escape'=>false));
							}
							?>
						</td>
						<td><?php if($carousel['Carousel'][ 'online' ] == 0) {echo $this->Html->link('<span class="label label-danger">'.__("Offline").'</span>',
							array('action'=>'enable', $carousel['Carousel']['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip",
								"data-placement"=>"top", "title"=>__('Enable this picture'),'escape'=>false));
							}else{
							echo $this->Html->link('<span class="label label-success">'.__("In line").'</span>',
							array('action'=>'disable', $carousel['Carousel']['id']),
							array("style"=>"text-decoration:none;","data-toggle"=>"tooltip",
								"data-placement"=>"top", "title"=>__('Disable this picture'),'escape'=>false));
							}
							?>
						</td>
						<td>
							<?php echo $this->Html->link('<span class="fa fa-picture-o fa-2x" style="color:#00f;"></span>',
							array('action' => 'crop', $carousel['Carousel']['id']),
							array('class' => 'btn btn-default btn-sm',
										'escape' => false,
										"data-title"=>__("crop this picture"),
										"data-toggle"=>"tooltip",
										"data-placement" =>"top"
							)); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="fa fa-edit fa-2x" style="color:#00f;"></span>',
							array('action' => 'edit', $carousel['Carousel']['id']),
							array('class' => 'btn btn-default btn-sm',
										'escape' => false,
										"data-title"=>__("edit"),
										"data-toggle"=>"tooltip",
										"data-placement" =>"top"
							)); ?>
						</td>
						<td>
							<p data-placement="top" data-toggle="tooltip" title="<?= __('delete').' '.$carousel['Carousel']['id']; ?>" class="text-center">
							<?php echo $this->Html->link('<span class="fa fa-trash	fa-2x" style="color:#f00;"></span>',$carousel['Carousel']['id'],
								array('class' => 'btn btn-default btn-remove-modal btn-sm',
								'escape' =>false,
								'data-toggle' => 'modal',
								"data-target"=>"#delete".$carousel['Carousel']['id'],
								"data-title"=> __('delete'),
								'role'  => 'button',
								'data-uid' => $carousel['Carousel']['id']
								));
								?>
							</p>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="col-md-12 text-center">
	<?php echo $this->element('pagination'); ?>
	<?php echo $this->element('pagination-counter'); ?>
	</div> <!-- end col-md-12 -->
	<?php  echo $this->Js->writeBuffer(); ?>
</div>
</div><!-- row end containing of content -->
<?php foreach ($carousels as $k => $v): $v = current($v);?>
<div class="modal fade" id="delete<?php echo  $v['id'] ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="<?php echo __('close'); ?>">&times;
				</button>
				<h4>
					<i class="fa fa-exclamation-triangle fa-lg" style="color:#f1b900;"></i>
					&nbsp;&nbsp;<?php echo __('Remove Picture'); ?>
				</h4>
			</div>
			<div class="modal-body">
				<p>
					<?php echo __('Are you sure you want to delete'); ?>&nbsp;
					<b style="color:#f00;"><?php echo  $v['id'] ?></b>&nbsp;
					<?php echo __('of your Carousel') ?>
					<span class="label-uname strong"></span> ?
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?>
				</button>
				<?php  echo $this->Form->postLink(__('Delete'),array('action' => 'delete',	$v['id']),
				array('class' => 'btn btn-danger delete-user-link')) ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<?php endforeach ?><!-- /.modal -->
<div class="modal fade" id="ModalAide"> <!-- modal Aide -->
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove-sign" style="color:#f00;"></i></button>
				<h4 id="myModalLabel"><?= __('Help') ?></h4>
			</div>
			<div class="modal-body">
				<p>&nbsp;</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Closed') ?></button>
			</div>
		</div><!-- /.modal-aide-content -->
	</div><!-- /.modal-aide-dialog -->
</div><!-- /.modal-aide -->
