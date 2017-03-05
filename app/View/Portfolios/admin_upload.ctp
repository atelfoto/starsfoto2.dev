<?= $this->assign('title',__('photo gallery')); ?>
<?php  $this->Html->addCrumb(__('photo gallery'),array('controller'=>"portfolios",'action'=>'index',"admin"=>true));
	    ?>
<div class="page-header">
	<h2><?php  echo $portfolio['Portfolio']['name']; ?></h2>
</div>
<div class="container">
	<div class="text-right col-md-12" role="group" aria-label="..." style="margin-bottom:20px;">
		<?= $this->Html->link('<i class="fa fa-check" style="color:#fff;">&nbsp;</i>'.__('Save'),
		array('controller' => 'portfolios', 'action' => 'index'),
		array('class' => 'btn btn-success addtoproperty','escape'=>false)); ?>
		<?= $this->Html->link('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>'.__('Closed'),
			array('controller' => 'portfolios', 'action' => 'index'),
			array('class'=>'btn btn-default','type'=>'button','escape'=>false)); ?>
	</div>
	<div class="col-md-12 ">
	<?php echo $this->Form->create('Portfolio', array('url'=>array('action'=>"upload"),'type'=>'file')); ?>
	<?php echo $this->Form->input('photo.', array('type' => 'file', 'label' => false,  'class' => 'file', 'multiple'
			,'data-upload-url'=>$portfolio['Portfolio']['id'],
			));  ?>
	<?php echo $this->Form->end() ?>
	</div>
	<div id="carousel" class="flexslider col-md-12" style="margin-top:20px;">
		<div class="row">
			<?php foreach (glob('files/portfolio/'.$portfolio['Portfolio']['slug'] .'/thumbs/*.jpg') as  $v):  ?>
				<div class="col-xs-6 col-md-2">
					<div class="thumbnail">
						<img src="/<?php echo $v; ?>" alt="" class="img-thumbnail" >
						<div class="caption text-center">
							<h3><?php echo basename($v); ?></h3>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<?php echo $this->Html->css(array('fileinput.min'),array('inline'=>false)); ?>
<?php  echo  $this->Html->script(array('canvas-to-blob.min','fileinput.min','fileinput_locale_fr'),array('inline'=>false)); ?>
<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>
   $("#PortfolioPhoto").fileinput({
   language: "fr",
   uploadAsync: true,
   initialPreviewAsData: true,
   showUpload: true,
   showCaption: true,
   showBrowse : true ,
   browseOnZoneClick : true,
   minFileCount: 1,
   maxFileCount:20,
   autoReplacs :true,
   showAjaxErrorDetails:true,
class:'file-loading',
});
<?php $this->Html->scriptEnd(); ?>
