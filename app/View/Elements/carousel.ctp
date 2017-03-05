<!--nocache-->
<?php  $pages=$this->requestAction(array('controller'=>'carousels','action'=>'index','admin'=>false)); ?>
<div id="myCarousel" class="carousel slide"  data-ride="carousel">
	<!-- <figure class="logo"> <?php echo  $this->Html->image("logo.png",array("class"=>"img-responsive","alt"=>"blason château de chazeron","width"=>141,"height"=>141)); ?> -->
	<!-- </figure> -->
	<h1 class="home hidden-xs"> <span><?= __('Les Maraîchers'); ?></span><br> <sup><?php echo __("de la "); ?>&nbsp;</sup>Coudraie</h1>
<ol class="carousel-indicators">
	<?php foreach ($pages as $kvv => $vv): $vv = current($vv); ?>
		<li data-target="#myCarousel" data-slide-to="<?php echo $vv['photo_dir'] ?>" class="<?php echo $vv['class'] ?>"></li>
	<?php endforeach ?>
</ol>
<div class="carousel-inner" role="listbox">
<?php foreach ($pages as $k => $v): $v = current($v); ?>
	<?php if ($this->request->is('mobile')): ?>
  	<div class="item <?php echo $v['class']; ?>" >
		<?=  $this->Html->image('/files/carousel/photo/'.$v["photo_dir"].'/vga_'.$v["photo"], array('alt'=> $cakeDescription,"width"=>"640","height"=>"340", "class"=>"center-block")); ?>
		<div class="carousel-caption">
			<!-- <h2><?= isset($v['name']) ? " | ". $v['name']: " " ; ?></h2> -->
			<p><?php echo $v['content']; ?></p>
		</div>
	</div>
<?php else: ?>
 	<div class="item <?php echo $v['class']; ?>" style="height:694;">
		<?=  $this->Html->image('/files/carousel/photo/'.$v["photo_dir"].'/xvga_'.$v["photo"], array('alt'=>__('Castle of Chazeron'),"width"=>"1900","height"=>"694")); ?>
		<div class="carousel-caption">
			<!-- <h2><?= isset($v['name']) ? " | ". $v['name']: " " ; ?></h2> -->
			<p><?php echo $v['content']; ?></p>
		</div>
	</div>
<?php endif; ?>
<?php endforeach ?>
</div>
<!--/nocache-->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	<!-- <span class="icon-prev" aria-hidden="true"></span> -->
	<span class="fa fa-chevron-left" aria-hidden="true"></span>
	<span class="sr-only" ><?= __('Previous'); ?></span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	<!-- <span class="icon-next" aria-hidden="true"></span> -->
	<span class="fa fa-chevron-right" aria-hidden="true"></span>
	<span class="sr-only" ><?= __('Next'); ?></span>
</a>
</div>


