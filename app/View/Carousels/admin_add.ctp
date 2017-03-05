<?php echo	$this->assign('title',__('carousel'));
	$this->Html->addCrumb(__('carousel manager'),array('controller'=>"carousels",'action'=>'index',"admin"=>true));
	   $this->Html->addCrumb( $actionHeading ); ?>
<div class="page-header">
	<h2><?php echo __('Add picture'); ?></h2>
</div>
<div class="container">
<div class="col-md-9 col-md-offset-1">
	<div class="panel panel-info  box-home">
		<div class="panel-heading panel-title text-right">
			<?php echo $this->Html->link(
				'<i class="fa fa-check-circle fa-lg "></i>&nbsp;&nbsp;'.__('close'),
				array('action' => 'index'),
				array("title"=>__("close"),'escape' => false));
			?>
		</div>
		<div class="panel-body">
			<?php echo $this->Form->create('Carousel', array('role' => 'form',"type"=>'file',"novalidate"=>'novalidate')); ?>
			<?= $this->Form->input('user_id',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>
			<?= $this->Form->input('size',array('type'=>'hidden')); ?>
			<div class="form-group col-md-6">
				<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
			</div>
			<div class="col-md-6">
				<?php  echo $this->Form->input('Carousel.photo', array(
					'type' => 'file', 'label' => 'photo', 'id' => 'photo', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true'));  ?>
			</div>
			<div class="col-sm-9">
				<?php echo $this->Form->input('content', array('class' => 'form-control', 'placeholder' => 'contenu','type'=>"textarea",'id'=> 'content'));?>
				<p id="compteur" class="text-right"><i>0 mots - 0 Caractere / 250</i></p>
			</div>
			<div class="form-group pull-left active col-sm-3" style="margin-bottom:0px;margin-top:25px;">
						<?php echo $this->Form->input('online',array(
						'label'=>__('Online'),
						'required'=>false,
						'type'=>'checkbox',
						 'name'=>'data[Carousel][online]',
						 'data-toggle'=>"toggle",
						 "data-onstyle"=>"success",
						 "data-offstyle"=>"danger",
						 'data-style'=>"ios",
						 'data-size'=>"mini",
						 "data-on"=>__('En Ligne'),
						  "data-off"=>__('Hors Ligne'),
						  'div'=>array('class'=>'text-right '),
						 ));
						  ?>
			</div>
			<div class="form-group text-right col-md-12">
				<?php echo $this->Form->submit(__('Submit'), array(
				'class' => 'btn btn-primary',"data-loading-text"=>"Loading...", "id"=>"myButton","autocomplete"=>"off")); ?>
			</div>
			<?php echo $this->Form->end() ?>
		</div>
	</div>
</div><!-- end col md 9-->
</div>
<?php echo $this->Html->css(array('bootstrap-toggle','fileinput.min'),array('inline'=>false)); ?>
<?php  echo  $this->Html->script(array('bootstrap-toggle','fileinput.min','fileinput_locale_fr'
	),array('inline'=>false)); ?>
<?=  $this->Html->scriptStart(array('inline'=>false)); ?>
$(document).ready(function(e) {
  $('#content').keyup(function() {
    var nombreCaractere = $(this).val().length;
    var nombreMots = jQuery.trim($(this).val()).split(' ').length;
    if($(this).val() === '') {
     	nombreMots = 0;
    }
    var msg = ' ' + nombreMots + ' mot(s) | ' + nombreCaractere + ' Caractere(s) / 160';
    $('#compteur').text(msg);
    if (nombreCaractere > 160) { $('#compteur').addClass("mauvais"); } else { $('#compteur').removeClass("mauvais"); }
  })
});
$("#photo").fileinput({
	language: 'fr',
});
 $('#myButton').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })
<?= $this->Html->scriptEnd(); ?>
