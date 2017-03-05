<?php  $this->Html->addCrumb(__('carousel manager'),array('controller'=>"carousels",'action'=>'index',"admin"=>true));
$this->Html->addCrumb("crop");
 ?>
<div class="page-header">
	<h2> <?php echo __("crop") ?></h2>
</div>
<div class="container">
	<?php echo  $this->Form->create('Carousel', array("onsubmit"=>"return checkCoords();",'class'=>"form-horizontal ")); ?>
	<div class="" style="width: 500px;margin-left: auto;margin-right: auto;">
		<?php echo $this->Html->image('/files/carousel/photo/'.$carousel['Carousel']["photo_dir"].'/'.$carousel['Carousel']["photo"],array(
			'id'=>'photo', "value"=> $carousel['Carousel']['photo'],'style'=>"margin-botom:20px;"
		)); ?>
	</div>
	<?php echo  $this->Form->input("x", array('label'=>false, "type"=>"hidden",'name'=>"x","id"=>"x")); ?>
	<?php echo  $this->Form->input("y", array('label'=>false, "type"=>"hidden",'name'=>"y","id"=>"y")); ?>
	<?php echo  $this->Form->input("w", array('label'=>false, "type"=>"hidden",'name'=>"w","id"=>"w",'value'=>"1900")); ?>
	<?php echo  $this->Form->input("h", array('label'=>false, "type"=>"hidden",'name'=>"h","id"=>"h")); ?>
	<?php echo  $this->Form->input("photo", array('label'=>false, "type"=>"hidden","value"=> $carousel['Carousel']['photo'])); ?>
	<div class="row" style="margin-top:20px;">
		<?php echo  $this->Form->input("quality", array(
			"label"=>false,
			'name'=>"quality","id"=>"quality",
			"div"=>"form-grou col-lg-offset-4 col-lg-2 col-sm-offset-3 col-sm-3",
			"class"=>"form-control col-md-2",
			"options"=>array(80=>"superieur",60=>"élévé"))); ?>
		<?php echo $this->Form->button('<i class="fa fa fa-check fa-lg" style="color:#fff;">&nbsp;</i>'.__("crop "),
		 array('type'=>"submit","value"=>'Crop Image','class'=>'btn btn-primary col-sm-2 col-md-1', 'escape'=>false)); ?>
		<?php echo $this->Html->link('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>'.__('closed'),
		 array('controller' => 'carousels', 'action' => 'index',"admin"=>true),
		 array('class'=>'btn btn-default col-sm-2 col-lg-1',"type"=>'button',"escape"=>false)); ?>
	</div>
	<?php echo  $this->Form->end(); ?>
</div>
<?php  echo $this->Html->css(array(
	'jquery.Jcrop.min'
	),array('inline'=>false)); ?>
<?php echo  $this->Html->script(array('jquery.Jcrop.min','jquery.color'), array('inline'=>false)); ?>
<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	jQuery(function($) {
        $('#photo').Jcrop({
        	bgFade:     true,
        	bgOpacity: .2,
        	setSelect: [ 0, 0, 1900, 694 ],
        	aspectRatio: 2.74207492795389,
        	boxHeight: 350,
        	onSelect: updateCoords,
        	boxwidth: 400
        });
        function updateCoords(c){
			$('#x').val(c.x);
			$('#y').val(c.y);
			$('#w').val(c.w);
			$('#h').val(c.h);
		};
		function checkCoords() {
			if (parseInt($('#w').val())) return true;
			alert('Please select a crop region then press submit.');
			return false;
		};
    });
<?php $this->Html->scriptEnd(); ?>
