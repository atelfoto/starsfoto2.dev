<div class="users view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('User'); ?></h1>
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
									<li><?php echo $this->Html->link('<span class="icon-edit"></span>&nbsp;&nbsp;'.__('Edit User'),
							 array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink('<span class="icon-cancel"></span>&nbsp;&nbsp;'.__('Delete User'),
								 array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Users'),
								 array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New User'),
								 array('action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table  class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Username'); ?></th>
		<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Password'); ?></th>
		<td>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mail'); ?></th>
		<td>
			<?php echo h($user['User']['mail']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Active'); ?></th>
		<td>
			<?php echo h($user['User']['active']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Avatar'); ?></th>
		<td>
			<?php echo h($user['User']['avatar']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Role'); ?></th>
		<td>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Token'); ?></th>
		<td>
			<?php echo h($user['User']['token']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Lastlogin'); ?></th>
		<td>
			<?php echo h($user['User']['lastlogin']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

