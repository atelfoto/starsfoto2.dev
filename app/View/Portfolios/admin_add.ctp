<?= $this->assign('title',__('photo gallery')); ?>
<?php  $this->Html->addCrumb(__('photo gallery'),array('controller'=>"portfolios",'action'=>'index',"admin"=>true));
	   $this->Html->addCrumb($actionHeading); ?>
<div class="portfolios form">
	<div class="page-header">
		<h2><?php echo $actionHeading; ?></h2>
	</div>
	<div class="container">
		<div class="col-md-9 box-home well">
			<?php echo $this->Form->create('Portfolio', array('role' => 'form',"type"=>'file',"novalidate"=>'novalidate')); ?>
			<div class="text-right col-md-12" role="group" aria-label="...">
  				<button  type="submit" class="btn btn-primary"><i class="fa fa-check fa-lg" style="color:#fff;">&nbsp;</i>
					<?= __('Save'); ?>
				</button>
				<?= $this->Html->link('<i class="fa fa-times-circle fa-lg" style="color:#f00;">&nbsp;</i>'.__('Closed'),
					array('controller' => 'portfolios', 'action' => 'index'),
					array('class'=>'btn btn-default ','type'=>'button','escape'=>false)); ?>
			</div>
			<div class="">
				<div class="form-group col-md-6">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => __('Name'),'autofocus'=>true));?>
					<?= $this->Form->input('user_id',array('value'=>$this->Session->read('Auth.User.id'),'type'=>'hidden')); ?>
				</div>
				<div class="form-group col-md-6">
				<?php echo $this->Form->input('photographer', array('class' => 'form-control', "label"=> __('photographer'), 'placeholder' => __('photographe')));
				echo $this->Form->input('slug', array('type' => 'hidden'));?>
				</div>
			</div>
			<div class="">
				<div class="col-md-6">
					<?php echo $this->Form->input('Portfolio.photo', array('type' => 'file', 'label' => 'photo', 'id' => 'photo', 'class' => 'file', 'data-show-upload' => 'false', 'data-show-caption' => 'true'));  ?>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo  $this->Form->input("subtitle", array("class"=>"form-control",'label'=> __('subtitle'),"placeholder"=>__('subtitle'))); ?>
					</div>
					<div class="active" style="margin-bottom:0px;margin-top:25px;">
						<?php echo $this->Form->input('online',array(
						'label'=>__('Online'),
						'required'=>false,
						'type'=>'checkbox',
						 'name'=>'data[Portfolio][online]',
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
					<?php echo  $this->Form->hidden("Portfolio.photo_dir"); ?>
				</div>
			</div>
			<div class="form-group col-md-12">
				<?php echo $this->Form->input('content', array('class' => 'form-control',"type"=>'textarea',"id"=>"metadescription",
							"placeholder"=>__("a description with a maximun of 160 letters"),"label"=>"Meta Description")); ?>
					<p id="compteur" class="text-right"><i>0 mot - 0 Caractere / 250</i></p>
			</div>
			<div class="form-group text-right col-md-12">
				<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-success')); ?>
			</div>
			<?php echo $this->Form->end() ?>
		</div>
	</div>
</div>
	<?php echo $this->Html->css(array('bootstrap-toggle','fileinput.min'),array('inline'=>false)); ?>
	<?php  echo  $this->Html->script(array('bootstrap-toggle','fileinput.min','fileinput_locale_fr',
	),array('inline'=>false)); ?>
<?php  echo  $this->Html->scriptStart(array('inline'=>false)); ?>
//pour les metas description
$(document).ready(function(e) {
  $('#metadescription').keyup(function() {
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
<?php  $this->Html->scriptEnd(); ?>
