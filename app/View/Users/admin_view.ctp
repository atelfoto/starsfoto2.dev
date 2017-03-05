<?php echo $this->assign('title', __('user')); ?>
 <?php $this->Html->addCrumb(__('user'),array('controller'=>'users','action'=>'index','admin'=>true)); ?>
 <?php $this->Html->addCrumb('view' ); ?>
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
								<li><?php echo $this->Form->postLink('<span class="icon-cancel"></span>&nbsp;&nbsp;'.__("delete user"),
									array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Users'),
									array('action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New User'),
									array('action' => 'add'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Groups'), array('controller' => 'groups', 'action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-list"></span>&nbsp;&nbsp;'.__('List Posts'), array('controller' => 'posts', 'action' => 'index'), array('escape' => false)); ?>
								</li>
								<li><?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New Post'), array('controller' => 'posts', 'action' => 'add'), array('escape' => false)); ?>
								</li>
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
						<th><?php echo __('firstname'); ?></th>
						<td>
							<?php echo h($user['User']['firstname']); ?>
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
						<th><?php echo __('Mail'); ?></th>
						<td>
							<?php echo h($user['User']['mail']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('firstname'); ?></th>
						<td>
							<?php echo h($user['User']['firstname']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Lastname'); ?></th>
						<td>
							<?php echo h($user['User']['lastname']); ?>
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
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Posts'); ?></h3>
	<?php if (!empty($user['Post'])): ?>
	<table  class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Online'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Robots'); ?></th>
		<th><?php echo __('Keywords'); ?></th>
		<th class="actions"></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($user['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['name']; ?></td>
			<td><?php echo $post['slug']; ?></td>
			<td><?php echo $post['content']; ?></td>
			<td><?php echo $post['type']; ?></td>
			<td><?php echo $post['created']; ?></td>
			<td><?php echo $post['modified']; ?></td>
			<td><?php echo $post['online']; ?></td>
			<td><?php echo $post['user_id']; ?></td>
			<td><?php echo $post['description']; ?></td>
			<td><?php echo $post['robots']; ?></td>
			<td><?php echo $post['keywords']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('<span class="icon-search"></span>', array('controller' => 'posts', 'action' => 'view', $post['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link('<span class="icon-edit"></span>', array('controller' => 'posts', 'action' => 'edit', $post['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<span class="icon-cancel-circled"></span>', array('controller' => 'posts', 'action' => 'delete', $post['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link('<span class="icon-plus"></span>&nbsp;&nbsp;'.__('New Post'), array('controller' => 'posts', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>	</div>
	</div><!-- end col md 12 -->
</div>
