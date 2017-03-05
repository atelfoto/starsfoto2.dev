 <?= $this->assign('title',__("photo gallery ")." | " .$portfolio['Portfolio']['name']); ?>
 <?php if ($portfolio['Portfolio']['online' ] == 1) {
 			echo $this->Html->meta(array('name' => 'robots','content'=>"index, follow"),NULL,array("inline"=>false));
 		}else{
 		 	echo $this->Html->meta(array('name' => 'robots','content'=>"no index, no follow"),NULL,array("inline"=>false));
 		 }
 ?>
<?php  echo $this->Html->css(array('portfolio'),array('inline'=>false)); ?>
<?php  echo $this->Html->meta('description', $this->Text->truncate(strip_tags($portfolio['Portfolio']['content'], 250)), array(
'exact' => false,'inline' => false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:type', 'type' => 'meta', 'content' => "website" ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:title', 'type' => 'meta', 'content' => $portfolio['Portfolio']['name']),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:url', 'type' => 'meta', 'content' => "http://www.chateau-chazeron.com/galerie-photos/".$portfolio['Portfolio']['slug'] ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:image', 'type' => 'meta',
'content' => "http://www.chateau-chazeron.com/files/portfolio/photo/". $portfolio['Portfolio']['photo_dir']."/". 'port_'.$portfolio['Portfolio']['photo'] ),NULL,array("inline"=>false)); ?>
<?php echo $this->Html->meta(array('property' => 'og:description', 'type' => 'meta',
 'content' => $this->Text->truncate(strip_tags($portfolio['Portfolio']['content']), 200)),NULL,array("inline"=>false));
echo $this->Html->meta(array('name' => 'twitter:description','content'=> $this->Text->truncate(strip_tags( $portfolio['Portfolio']['content']), 200)),NULL,array("inline"=>false));
echo $this->Html->meta(array('name' => 'twitter:card','content'=> "summary_large_image"),NULL,array("inline"=>false));
echo $this->Html->meta(array('name'=>'twitter:title','content'=> $portfolio['Portfolio']['name']),NULL,array('inline'=>false));
echo $this->Html->meta(array('name'=>'twitter:url','content'=>"http://www.chateau-chazeron.com/galerie-photos/".$portfolio['Portfolio']['slug'] ),NULL,array('inline'=>false));
echo $this->Html->meta(array('name' => 'twitter:image','content' =>"http://".env('HTTP_HOST')."/files/portfolio/photo/". $portfolio['Portfolio']['photo_dir']."/". 'port_'.$portfolio['Portfolio']['photo'] ),NULL,array("inline"=>false));
 ?>
 	<div id="header-portfolio">
 		<div class="container">
 			<a title="Retour Galeries" data-placement="bottom" class="infobulle" data-toogle='tooltip'   href=" <?php echo $this->Html->url(array('controller' => 'portfolios', 'action' => 'index')); ?>">
 				<i class="fa fa-arrow-left  fa-2x" style="background-color:transparent;color:#fff;"></i>
 			</a>
 			<div class="pull-right">
 				<button class="share_facebook btn-xs btn btn-primary" style=""
 						data-url="http://www.chateau-chazeron.com/galerie-photos/<?php echo $portfolio['Portfolio']['slug']; ?>">
 					<i class="fa fa-facebook hidden-xs fa-1x" style="color:#fff;"></i> <span class="">PARTAGER</span>
 				</button>
 				<button class="share_twitter btn-xs btn btn-info" style="padding:right:5px;padding:left:5px;"
 						data-url="http://www.chateau-chazeron.com/galerie-photos/<?php echo $portfolio['Portfolio']['slug']; ?>">
 					<i class="fa fa-twitter hidden-xs " style="color:#fff;"></i> <span class="">TWEETER</span>
 				</button>
 				<button class="share_gplus btn-xs btn btn-danger" style=""
 						data-url="http://www.chateau-chazeron.com/galerie-photos/<?php echo $portfolio['Portfolio']['slug']; ?>">
 					<i class="fa fa-google hidden-xs " style="color:#fff;"></i> <span class="">GOOGLE+</span>
 				</button>
 			</div>
		</div>
	</div>
<?php  $this->Html->script(array(
"jbcore/juicebox",
"social"), array("inline"=>false)); ?>
<?php  $this->Html->scriptStart(array("inline"=>false)); ?>
			new juicebox({
				baseUrl : '../files/portfolio/<?php echo $portfolio['Portfolio']['slug']; ?>/',
				themeUrl: '../../css/jbcore/classic/theme.min.css',
				configUrl:'http://<?= env('HTTP_HOST');?>/portfolios/configxml/<?php echo $portfolio['Portfolio']['id']; ?>',
				useFullscreenExpand: true,
				showOpenButton: false,
				//debugMode: true,
				// galleryTitle: '<?php // echo $portfolio['Portfolio']['name']; ?>',
				languagelist:"Afficher les vignettes|Masquer les Vignettes|Afficher Plein Ecran|Quitter plein Ecran|Ouvrir dans une nouvelle fenêtre|Images",
				backgroundColor: "rgba(34,34,34,1)",
				containerId: "juicebox-container",
				galleryHeight: "90%",
				galleryWidth: "100%",
				top:"150px"
			});
			$(document).ready(function(){
			 $("a.infobulle").mouseover(function(){
        		$(this).tooltip("show");// pour afficher une infobulle
        		});
			});
<?php  $this->Html->scriptEnd(); ?>
<div class="container">
<div id="juicebox-container" ></div></div>

