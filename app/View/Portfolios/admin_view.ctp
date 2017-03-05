<div class="portfolios view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Portfolio'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;'.__('Edit Portfolio'), array('action' => 'edit', $portfolio['Portfolio']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Delete Portfolio'), array('action' => 'delete', $portfolio['Portfolio']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $portfolio['Portfolio']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;'.__('List Portfolios'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;'.__('New Portfolio'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;'.__('New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($portfolio['Portfolio']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($portfolio['Portfolio']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Slug'); ?></th>
		<td>
			<?php echo h($portfolio['Portfolio']['slug']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Content'); ?></th>
		<td>
			<?php echo h($portfolio['Portfolio']['content']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($portfolio['Portfolio']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Online'); ?></th>
		<td>
			<?php echo h($portfolio['Portfolio']['online']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($portfolio['Portfolio']['user_id'], array(
			'controller' => 'users', 'action' => 'view', $portfolio['Portfolio']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($portfolio['Portfolio']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($portfolio['Portfolio']['modified']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

