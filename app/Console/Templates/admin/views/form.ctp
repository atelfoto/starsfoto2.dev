<?php
/**
 *
 *description Ne pas oublié  de retirer les balise placeholder pour les input id select et  checkbox
 *pour les  selects remplacer par :
 *     'empty'=> __('choose'),
 *pour les textareas retiter la ligne  between et remplacer par
 *   'after'=>false
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php echo "<?php echo \$this->assign('title', __('$singularVar')); ?>\n "; ?>
<?php echo "<?php \$this->Html->addCrumb(__('$singularVar'),array('controller'=>'$pluralVar','action'=>'index','admin'=>true)); ?>\n ";
      echo "<?php \$this->Html->addCrumb('edit' ); ?>\n";?>
<div class="<?php echo $pluralVar; ?> index row">
	<div class="col-sm-12 page-header">
		<h3><i class="icon-<?php echo $pluralVar; ?>"></i>&nbsp;<?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?>
		</h3>
	</div>
	<div class="col-sm-12">
		<div class="box box-primary  with-border nav-tabs-custom">
			<?php echo "<?php echo \$this->Form->create('{$modelClass}',array(
				'novalidate'=>true,
				'inputDefaults'=>array(
				'div'=>'form-group',
				'label'=>array('class'=>'control-label'),
				'after'=>'</div>',
				'error'=>array('attributes' => array('wrap' => 'span', 'class' => 'help-block text-danger')),
				'class'=>'form-control'),
				'class'=>'')); ?>\n"; ?>
			<ul class="nav nav-tabs" role="tablist">
		 		<li role="presentation" class="active">
		 			<a href="#contenu" role="tab" data-toggle="tab" aria-controls="contenu"><?php echo __('contenu') ?></a>
		 		</li>
		 		<li role="presentation">
		 			<a href="#publication" role="tab" data-toggle="tab" aria-controls="publication"><?php echo __('publication') ?></a>
		 		</li>
	<?php
			echo "\t\t\t<li class='pull-right'>\n";
			echo "\t\t\t\t\t<?php echo \$this->html->link('<i class=\"icon-cancel-circled\" style=\"color:#f00;\">&nbsp;</i>'.__('closed'),
							array('controller'=>'{$pluralVar}','action'=>'index'),
							array('class' => 'btn btn-default','escape'=>false)); ?>\n";
			echo "\t\t\t\t</li>\n";
			echo "\t\t\t\t<li class='pull-right'>\n";
			echo "\t\t\t\t\t<?php echo \$this->Form->button('<i class=\"icon-ok\" style=\"color:#fff;\">&nbsp;</i>'.__('publish'),
			 				array('class' => 'btn btn-success  pull-right')); ?>\n";
			echo "\t\t\t\t</li>\n";
			echo "\t\t\t\t<li class='pull-right'>\n";
			echo "\t\t\t\t\t<?php echo \$this->Form->input('online', array('label' => false,'div'=>array('class'=>'pull-right'),
							'after'=>false)); ?>\n";
			echo "\t\t\t\t</li>\n";
			echo "\t\t\t</ul>\n";
			echo "\t\t\t<div class=\"tab-content box-body\">\n";
			echo "\t\t\t\t<div class=\"tab-pane fade in active\" role=\"tabpanel\" id=\"contenu\">\n";
	?>
<?php
			foreach ($fields as $field) {
				if (strpos($action, 'add') !== false && $field == $primaryKey) {
					continue;
				} elseif (!in_array($field, array('created', 'modified', 'updated','online'))) {
							echo "\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array('class' => 'form-control',
							 'placeholder' => __('".Inflector::humanize($field)."'),
							 'between'=>'<div class=\"input-group\"><div class=\"input-group-addon\"><i class=\"icon-{$field}\"></i></div>'
							 ));?>\n";
							 if (in_array($field,array('description'))) {
							 	echo "\t\t\t\t\t<p id='compteur' class='text-right'><i>0 mots - 0 Caractere / 250</i></p>\n";
							 }
				}
			}
			if (!empty($associations['hasAndBelongsToMany'])) {
				foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
							echo "\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}',
							 array('class' => 'form-control chosen-select', 'after'=>false));?>\n";
				}
			}
	?>
				</div>
				<div class="tab-pane fade" role="tabpanel" id="publication">

				</div>
			</div>
<?php
					echo "\t\t\t<div class=\"text-right box-footer\" style=\"margin-top:10px;\">\n";
					echo "\t\t\t\t<?php echo \$this->Form->submit(__('publish'), array('div'=>false,'class' => 'btn btn-primary')); ?>\n";
					echo "\t\t\t\t<?php echo \$this->html->link('<i class=\"icon-cancel-circled\" style=\"color:#f00;\">&nbsp;</i>'.__('closed'),
						array('controller'=>'{$pluralVar}','action'=>'index'),
						array('class' => 'btn btn-default','escape'=>false)); ?>\n";
					echo "\t\t\t</div>\n";
				echo "\t\t\t<?php echo \$this->Form->end() ?>\n";
	?>
		</div>
	</div><!-- end containers -->
</div>
<?php if (in_array($field,array('description','content'))): ?>


<?php echo "<?php  echo \$this->Html->script(array('tinymce/tinymce.min'),array('inline'=>false)); ?>\n"; ?>
<?php echo "<?php echo  \$this->Html->scriptStart(array('inline'=>false)); ?>
//pour les tabs
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
//pour les toogle
  $(function() {
    $('#{$modelClass}Online').bootstrapToggle({
	//	size:'',
		onstyle: 'primary',
		offstyle:'danger',
    });
  });
//pour le textarea
tinyMCE.init({
	selector: \"#{$modelClass}Content\",
	height:'500',
    elements:\"contenu\",
	entity_encoding : \"raw\",
	encoding: \"UTF-8\",
	theme: \"modern\",
	language :\"fr_FR\",
  	skin: \"lightgray-gradient\",
  	browser_spellcheck: true,
  	elementpath: true,
    media_live_embeds: true,
    plugin_preview_width: 1170,
    paste_remove_styles : true,
    visualblocks_default_state: true,
    visual_table_class: 'table table-striped',
    relative_urls: false,
    spellchecker_languages : \"English=en,French=fr\",
    code_dialog_height: 550,
  	code_dialog_width: 900,
  	fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',

    image_advtab: true,
	resize: \"none\",
	// mode:\"exact\",

	plugins: [
		\"advlist autolink lists link image charmap  preview hr anchor pagebreak\",
		\"searchreplace wordcount visualblocks code \",
		\"media nonbreaking save table contextmenu \",
		\"template paste textcolor spellchecker emmet\"
		],

	toolbar1: \" undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink anchor \",
	toolbar2: \" preview code | forecolor backcolor | spellchecker media image |  visualblocks hr bootstrap fontsizeselect template\",

 table_class_list: [
    {title: 'None', value: ''},
    {title: 'table-striped', value: 'table table-striped'},
    {title: 'table-hover', value: 'table table-hover'},
    {title: 'table-hover', value: 'table table-bordered'},
    {title: 'table-condensed', value: 'table table-condensed'}
  ],
  table_appearance_options: false,
    image_explorer :'<?php echo \$this->Html->url(array('controller'=>'medias','action'=>'index', \$this->request->data['{$modelClass}']['id'])); ?>',
    image_edit :'<?= \$this->Html->url(array('controller'=>'medias','action'=>'show')); ?>',
    content_css : '<?= \$this->Html->url('/css/wysiwyg.css'); ?>',
    table_appearance_options: false,
    // table_grid: false,
setup: function(editor) {
    editor.addButton('bootstrap', {
      type: 'menubutton',
      text: 'bootstrap',
      icon: false,
      menu: [{
        text: 'table',
        onclick: function() {
          editor.insertContent('<div class=\"table-responsive\">insert table</div><div></div>');
        }
      },{
        text: 'panel',
        onclick: function() {
          editor.insertContent('<div class=\"panel panel-default\"><div class=\"panel-heading\">heading</div><div class=\"panel-body\">content</div><div class=\"panel-footer\">footer</div></div>');
        }
      },{
      	text: 'video',
      	onclick: function(){
      	editor.insertContent('<div class=\"embed-responsive embed-responsive-16by9\"><iframe src=\"\" width=\"640\" height=\"360\" ></iframe></div><div><p>&nbsp;</p></div>');
      	}
      }]
    });
  },
  	table_class_list: [
    {title: 'None', value: ''},
    {title: 'table-striped', value: 'table table-striped'},
    {title: 'table-hover', value: 'table table-hover'},
    {title: 'table-bordered', value: 'table table-bordered'},
    {title: 'table-condensed', value: 'table table-condensed'}
  ],
templates: [
 {title: 'panel-tableau',
  content: '<div class=\"panel panel-default\"><div class=\"panel-heading\"><h3>insert</h3></div>&nbsp;<div class=\"panel-footer\">footer</div></div>'},
 {title: 'table',
  content: '<div class=\"table-responsive\">insert table</div><div>suite</div>'},
 {title: 'video',
 \"description\": \"description de mon template\",
  content: '<div class=\"embed-responsive embed-responsive-16by9\"><iframe src=\"\" width=\"640\" height=\"360\" ></iframe></div><div><p>insert</p></div>'},
 {title: 'test',
 \"description\": \"description de mon templatetest\",
 \"url\": \"/development.html\"},
    ],
template_popup_height: 500,
template_popup_width: 900,
});

function send_to_editor(content){
	var ed = tinyMCE.activeEditor;
	ed.execCommand('mceInsertContent',false,content);
};

//pour les meta description
$(document).ready(function(e) {
  $('#{$modelClass}Description').keyup(function() {
    var nombreCaractere = $(this).val().length;
    var nombreMots = jQuery.trim($(this).val()).split(' ').length;
    if($(this).val() === '') {
     	nombreMots = 0;
    }
    var msg = ' ' + nombreMots + ' mot(s) | ' + nombreCaractere + ' Caractere(s) / 160';
    $('#compteur').text(msg);
    if (nombreCaractere > 160) { $('#compteur').addClass(\"mauvais\"); } else { $('#compteur').removeClass(\"mauvais\"); }
  })
});
<?= \$this->Html->scriptEnd(); ?>" ?>

<?php else: ?>
<?php echo "<?php echo  \$this->Html->scriptStart(array('inline'=>false)); ?>
//pour les tabs
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
//pour les toogle
  $(function() {
    $('#{$modelClass}Online').bootstrapToggle({
		size:'small',
		onstyle: 'primary',
		offstyle:'danger',
    });
  });
 <?= \$this->Html->scriptEnd(); ?>" ?>
<?php endif ?>
