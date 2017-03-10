<div class="usersFellowships view">
<h2><?php echo __('Users Fellowship'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersFellowship['UsersFellowship']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersFellowship['User']['id'], array('controller' => 'users', 'action' => 'view', $usersFellowship['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fellowship'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersFellowship['Fellowship']['title'], array('controller' => 'fellowships', 'action' => 'view', $usersFellowship['Fellowship']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usersFellowship['UsersFellowship']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usersFellowship['UsersFellowship']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Users Fellowship'), array('action' => 'edit', $usersFellowship['UsersFellowship']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users Fellowship'), array('action' => 'delete', $usersFellowship['UsersFellowship']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usersFellowship['UsersFellowship']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Fellowships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Fellowship'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fellowships'), array('controller' => 'fellowships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fellowship'), array('controller' => 'fellowships', 'action' => 'add')); ?> </li>
	</ul>
</div>
