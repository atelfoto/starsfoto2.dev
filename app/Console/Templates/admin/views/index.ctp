<?php
/**
 *
 *changer les dates avec
 *<?php  echo $this->Time->format($post['Post']['created'], '%A %e %B, %Y %z '); ?>
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php echo "<?php echo \$this->assign('title', __('$pluralHumanName')); ?>\n "; ?>
<?php echo "<?php \$this->Html->addCrumb(__('$pluralHumanName')); ?>\n "; ?>
<div class="<?php echo $pluralVar; ?> index row">
	<div class="col-md-12 page-header">
		<h2><i class="icon-<?php echo $pluralVar; ?>"></i>&nbsp;<?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
	</div>
	<div class="col-md-12">
		<div class="text-right" style='margin-bottom:10px;'>
			<button class="btn " data-toggle="modal" data-target="#ModalAide">
			<i class="icon-help-circled">&nbsp;<?= __('Help'); ?></i>
			</button>
				<?php echo "<?php echo \$this->Html->link(\"<i class='icon-plus'></i>\". __(\"Add\"),array('action'=>'add'),
				array('class' =>\"btn btn-success \",'escape'=>false)); ?>\n";
				echo"\t\t</div>\n"; ?>
		<div class="panel table-responsive box-home">
			<table  class="table table-bordered text-center table-striped">
				<thead>
					<tr class="info"><?php echo "\n\t\t\t\t\t\t" ?><?php foreach ($fields as $field): ?><th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th><?php echo "\n\t\t\t\t\t\t" ?><?php endforeach; ?><th>&nbsp;</th>
					<th colspan="3" class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php
				echo "\t<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
				echo "\t\t\t\t\t<tr>\n";
					foreach ($fields as $field) {
						$isKey = false;
						if (!empty($associations['belongsTo'])) {
							foreach ($associations['belongsTo'] as $alias => $details) {
								if ($field === $details['foreignKey']) {
									$isKey = true;
									echo "\t\t\t\t\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'],
									array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></td>\n";
									break;
								}
							}
						}
						if ($isKey !== true) {
							echo "\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
						}
					}
					echo "\t\t\t\t\t\t<td><?php if(\${$singularVar}['{$modelClass}'][ 'online' ] == 0) {
						echo \$this->Html->link('<span class=\"label label-danger\"><i class=\"icon-cancel-circled\">'.__('Offline').'</i></span>',
						array('action'=>'enable', \${$singularVar}['{$modelClass}']['id']),
						array(\"style\"=>\"text-decoration:none;\",\"data-toggle\"=>\"tooltip\",\"data-placement\"=>\"bottom\",
						\"title\"=>__('Enable this {$modelClass}'),'escape'=>false));
					}else{
						echo \$this->Html->link('<span class=\"label label-success\"><i class=\"icon-ok\">'.__('In line').'</i></span>',
						array('action'=>'disable', \${$singularVar}['{$modelClass}']['id']),
						array(\"style\"=>\"text-decoration:none;\",\"data-toggle\"=>\"tooltip\",\"data-placement\"=>\"bottom\",
						\"title\"=>__('Disable this {$modelClass}'),'escape'=>false));
					}
					?>\n";
					echo "\t\t\t\t\t\t</td>\n";
					echo "\t\t\t\t\t\t<td class=\"actions\">\n";
					echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"icon-eye\"></span>',
					 array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),
					 array('class'=>'btn btn-default','escape' => false,
					 'data-title'=>__('view').' '.\${$singularVar}['{$modelClass}']['name'],'data-toggle'=>'tooltip','data-placement'=>'bottom')); ?>\n";
					echo "\t\t\t\t\t\t</td>\n";
					echo "\t\t\t\t\t\t<td class=\"actions\">\n";
					echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"icon-pencil\"></span>',
					 array('action' => 'edit',\${$singularVar}['{$modelClass}']['{$primaryKey}'] ),
					 array('class'=>'btn btn-default','escape' => false,
					  'data-title'=>__('edit').' '.\${$singularVar}['{$modelClass}']['name'],'data-toggle'=>'tooltip','data-placement'=>'bottom')); ?>\n";
					echo "\t\t\t\t\t\t</td>\n";
					echo "\t\t\t\t\t\t<td class=\"actions\">\n";
					echo "\t\t\t\t\t\t\t<p data-placement='bottom' data-toggle='tooltip' title='<?= __('delete').' '.\${$singularVar}['{$modelClass}']['name'];?>' class='text-center'>\n";
					echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"icon-trash\"></span>','#delete'.\${$singularVar}['{$modelClass}']['{$primaryKey}'],
									array('class'=>'btn btn-default btn-remove-modal',
									'escape' => false,
									'data-toggle' =>'modal',
									'role'=>'button',
									'data-target'=>'#delete'.\${$singularVar}['{$modelClass}']['{$primaryKey}'],
									'data-title'=> __('delete'),
									'data-uid'=>\${$singularVar}['{$modelClass}']['{$primaryKey}']
									)
							 ); ?>\n";
					echo "\t\t\t\t\t\t\t</p>\n";
					echo "\t\t\t\t\t\t</td>\n";
					echo "\t\t\t\t\t</tr>\n";
					echo "\t\t\t\t<?php endforeach; ?>\n";
				?>
				</tbody>
			</table>
		</div>
		<div class="col col-md-12 text-center">
			<?php echo "<?php echo \$this->element('pagination'); ?>\n" ?>
			<?php echo "<?php  echo \$this->element(\"pagination-counter\"); ?>" ?>
		</div>
	</div>
</div><!-- end containing of content -->
<?php echo "<?php foreach (\${$pluralVar}  as \$k => \$v): \$v = current(\$v);?>" ?><!-- modal supprimer -->
<div class="modal fade" id="delete<?php echo "<?= \$v['id']; ?>" ?>">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" data-placement="left" title=" <?php echo _('close'); ?>">&times;</button>
				<h4 ><?php echo "<?php echo __('Remove') ;?>" ?></h4>
			</div>
			<div class="modal-body">
				<p> <?php echo "<?php echo __('Are you sure you want to delete'); ?>" ?> <b style="color:#f00;">&nbsp;<?php echo "<?php echo \$v['name'];?> " ?>&nbsp;</b>
					<?php echo "<?php echo __('of your').' '.__('{$pluralVar}') ; ?>";
					echo "\n\t\t\t\t\t<span class=\"label-uname strong\"></span> ? \n"; ?>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo "<?php echo __('Cancel') ?>" ?></button>
					<?php echo "<?php  echo \$this->Form->postLink(__('Delete'),array('action' => 'delete',	\$v['id']),
							array('class' => 'btn btn-danger delete-user-link')) ?>";
				echo "\n\t\t\t</div>";
				echo "\n\t\t</div><!-- /.modal-content -->";
				echo "\n\t</div><!-- /.modal-dialog -->\n" ?>
</div><!-- /.modal -->
<?php echo "<?php endforeach ?>" ?><!-- fin modal supprimer -->
<div class="modal fade" id="ModalAide"> <!-- modal Aide -->
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header panel-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-cancel-circled" style="color:#f00;"></i></button>
					<h4 id="myModalLabel"><?= __('Help') ?></h4>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Closed') ?></button>
			</div>
		</div><!-- /.modal-aide-content -->
	</div><!-- /.modal-aide-dialog -->
</div><!-- /.modal-aide -->

