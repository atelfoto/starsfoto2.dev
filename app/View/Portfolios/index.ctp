<?= $this->assign('title', __('photo gallery')); ?>
<?php echo $this->Html->meta(array('name' => 'robots', 'content' => "index , follow"),NULL,array("inline"=>false));
echo $this->Html->meta("description", $this->Text->truncate(strip_tags( $menus['Menu']["description"]), 160), array('inline'=>false));
echo $this->Html->meta('canonical', 'http://www.chateau-chazeron.com/galerie-photos', array('rel'=>'canonical', 'type'=>null, 'title'=>null, 'inline' => false));
echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "website" ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => "galerie photos"),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' => "http://www.chateau-chazeron.com/galerie-photos" ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:image', 'type' => 'meta','content' => "http://www.chateau-chazeron.com/img/screenshoot/screenshoot-gp.jpg" ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta',
 'content' => $this->Text->truncate(strip_tags( $menus['Menu']["description"]), 200)),NULL,array("inline"=>false));
echo $this->Html->meta(array('name' => 'twitter:description','content'=> $this->Text->truncate(strip_tags( $menus['Menu']["description"]), 200)),NULL,array("inline"=>false));
echo $this->Html->meta(array('name' => 'twitter:card','content'=> "summary_large_image"),NULL,array("inline"=>false));
echo $this->Html->meta(array('name'=>'twitter:title','content'=> __("photo gallery")),NULL,array('inline'=>false));
echo $this->Html->meta(array('name'=>'twitter:url','content'=>"http://www.chateau-chazeron.com/galerie-photos" ),NULL,array('inline'=>false));
echo $this->Html->meta(array('name' => 'twitter:image','content' =>"http://".env('HTTP_HOST')."/img/screenshoot/screenshoot-gp.jpg"),NULL,array("inline"=>false));
  ?>
<?php $this->Html->addCrumb(__('photo gallery'));?>
<div class="container page">
<?php if ($this->request->is('mobile')): ?>
	<div class="row">
	<?php  foreach ($portfolios as $portfolio): ?>
			<a href="<?php  echo $this->Html->url('/galerie-photos/'.$portfolio['Portfolio'] ['slug'] ); ?>"  style="padding:0;margin:0;" class="list-group-item"  title="voir cet article">
				<div class="media">
					<div class="media-left">
						<?=   $this->Html->image("../files/portfolio/photo/". $portfolio['Portfolio']['photo_dir']."/". 'thumb_'. $portfolio['Portfolio']['photo'],
		  				array("title"=> $portfolio['Portfolio']['name'],"alt"=> $portfolio['Portfolio']['name'])); ?>
					</div>
					<div class="media-body" style="padding-top: 10px;margin-right:10px">
						<h4 class="list-group-item-heading media-heading">
							<?php echo $this->Text->truncate($portfolio['Portfolio']['name'],50,array('exact' =>true,'html'=> true)); ?>
						</h4>
						<p class="list-group-item-text media-heading text-capitalize">
							<span class='date'>
								<small>
									<i class="fa fa-calendar">&nbsp;</i>&nbsp;<?php echo __('published') ?> :&nbsp;
									<?php  echo $this->Time->format($portfolio['Portfolio']['created'], '%a %e %B, %Y %z '); ?><br>
								</small>
							</span>
		  					<span style="padding-top:10px;">
		  						<?php  empty($portfolio['Portfolio']['photographer']) ? " " : '<i class="fa fa-user"></i> '. __('photographer')."(s) :" ; ?>
		  					</span>
						</p>
						<p>
							<?php  echo $this->Text->truncate(ltrim(strip_tags( $portfolio['Portfolio'] ['content'])),50,array('exact' =>false,'html'=> true)); ?>
						</p>
					</div>
				</div>
			</a>
	<?php endforeach ?>
	</div>
<?php else: ?>
	<div class="row" >
		<?php  foreach ($portfolios as $portfolio): ?>
		  <div class="col-sm-6 col-md-4 text-capitalize " >
		  <div class="thumbnail box-home">
		  <?=   $this->Html->image("../files/portfolio/photo/". $portfolio['Portfolio']['photo_dir']."/". 'port_'. $portfolio['Portfolio']['photo'],
		  	array("class" => "img-responsive ","title"=> $portfolio['Portfolio']['name'],"alt"=> $portfolio['Portfolio']['name'], 'url' =>
		  	array('controller'=>'portfolios', 'action' => 'view','slug'=>$portfolio['Portfolio']['slug'],'admin'=> false))); ?>
		  		<h3 class='text-center'><?php echo $this->Text->truncate($portfolio['Portfolio']['name'],28,array('exact' =>true,'html'=> true)); ?></h3>
		  		<p class="text-center small" style="min-height:40px;"><?php  echo h($portfolio['Portfolio']['subtitle']); ?> <br>
		  			<span class='date'>
		  				<small>
		  					<i class="fa fa-calendar">&nbsp;</i>&nbsp;
		  					<?php echo __('published') ?> :&nbsp;
		  					<?php echo $this->Date->french($portfolio['Portfolio']['created']); ?> <br>
		  					<span style="min-width:400px;">
		  						<i class="fa fa-user"></i>
		  						<?php echo __('photographer'); ?>(s) :&nbsp;<?php  echo h($portfolio['Portfolio']['photographer']); ?>
		  					</span>
		  				</small>
		  			</span>
		  		</p>
		  	</div>
		  </div>
		 <?php  endforeach; ?>
	</div>
<?php endif ?>
	<div class="row">
		<div class="col-md-12 text-center">
			<?php echo $this->element('pagination-counter'); ?>
			<?php echo $this->element('pagination'); ?>
		</div>
	</div>
	<hr class="style-two">
</div>



