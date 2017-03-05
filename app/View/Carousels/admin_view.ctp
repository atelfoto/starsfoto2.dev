<?php echo	$this->assign('title',__('carousel'));
	$this->Html->addCrumb(__('carousel manager'),array('controller'=>"carousels",'action'=>'index',"admin"=>true));
	   $this->Html->addCrumb( __("image") ); ?>
<div class="page-header">
	<h2><?php echo __('image'); ?></h2>
</div>

<div class="">
	<?php echo $this->Html->link(__('close'), array('controller' => 'carousels', 'action' => 'index',"admin"=>true),array('class'=>'btn btn-default col-sm-2 col-lg-1 pull-right')); ?>
	<?php echo $this->Html->link(__('crop'), array('controller' => 'carousels', 'action' => 'crop',$carousel['Carousel']['id'],"admin"=>true),array('class'=>'btn btn-primary col-sm-2 col-lg-1 pull-right')); ?>
	<?php echo $this->Form->postLink(__('delete'),  array('action' => 'delete', $carousel['Carousel']['id']), array('confirm' => 'Etes-vous sûr ?','class'=>'btn btn-danger col-sm-2 col-lg-1 pull-right'));?>
	<?php echo $this->Html->image('/files/carousel/photo/'.$carousel['Carousel']["photo_dir"].'/xvga_'.$carousel['Carousel']["photo"],
			array('id'=>'photo','class'=>"img-responsive"
			)); ?>
</div>
