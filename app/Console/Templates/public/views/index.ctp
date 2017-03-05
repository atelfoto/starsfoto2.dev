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
			<i class="fa fa-question-circle">&nbsp;<?= __('Help'); ?></i>
			</button>
				<?php echo "<?php echo \$this->Html->link(\"<i class='icon-plus'></i>\". __(\"Add article\"),array('action'=>'add'),
				array('class' =>\"btn btn-success \",'escape'=>false)); ?>\n";
				echo"\t\t</div>\n"; ?>
		<div class="panel table-responsive box-home">
			<table  class="table table-bordered text-center table-striped">
				<thead>
					<tr class="info"><?php echo "\n\t\t\t\t\t\t" ?><?php foreach ($fields as $field): ?><th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th><?php echo "\n\t\t\t\t\t\t" ?><?php endforeach; ?><th colspan="3" class="actions"></th>
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
									echo "\t\t\t\t\t\t\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'],
									array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
									break;
								}
							}
						}
						if ($isKey !== true) {
							echo "\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;toto</td>\n";
						}
					}
					echo "\t\t\t\t\t\t<td class=\"actions\">\n";
					echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"fa fa-eye\"></span>',
					 array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn btn-default','escape' => false)); ?>\n";
					echo "\t\t\t\t\t\t</td>\n";
					echo "\t\t\t\t\t\t<td class=\"actions\">\n";
					echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"fa fa-pencil\"></span>',
					 array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn btn-default','escape' => false)); ?>\n";
					echo "\t\t\t\t\t\t</td>\n";
					echo "\t\t\t\t\t\t<td class=\"actions\">\n";
					echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"fa fa-trash\"></span>',
								'#Modal'.\${$singularVar}['{$modelClass}']['{$primaryKey}'],
									array('class'=>'btn btn-default btn-remove-modal',
									'escape' => false,
									'data-toggle' =>'modal',
									'role'=>'button',
									'data-uid'=>\${$singularVar}['{$modelClass}']['{$primaryKey}']
									)
							 ); ?>\n";
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



