<div class="elegibilities view">
<h2><?php echo __('Elegibility'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($elegibility['Elegibility']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($elegibility['Elegibility']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Elegibility'), array('action' => 'edit', $elegibility['Elegibility']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Elegibility'), array('action' => 'delete', $elegibility['Elegibility']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $elegibility['Elegibility']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Elegibilities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elegibility'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fellowships'), array('controller' => 'fellowships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fellowship'), array('controller' => 'fellowships', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Fellowships'); ?></h3>
	<?php if (!empty($elegibility['Fellowship'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Degree Id'); ?></th>
		<th><?php echo __('Discipline Id'); ?></th>
		<th><?php echo __('Elegibility Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($elegibility['Fellowship'] as $fellowship): ?>
		<tr>
			<td><?php echo $fellowship['id']; ?></td>
			<td><?php echo $fellowship['title']; ?></td>
			<td><?php echo $fellowship['body']; ?></td>
			<td><?php echo $fellowship['created']; ?></td>
			<td><?php echo $fellowship['modified']; ?></td>
			<td><?php echo $fellowship['degree_id']; ?></td>
			<td><?php echo $fellowship['discipline_id']; ?></td>
			<td><?php echo $fellowship['elegibility_id']; ?></td>
			<td><?php echo $fellowship['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'fellowships', 'action' => 'view', $fellowship['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'fellowships', 'action' => 'edit', $fellowship['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'fellowships', 'action' => 'delete', $fellowship['id']), array('confirm' => __('Are you sure you want to delete # %s?', $fellowship['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Fellowship'), array('controller' => 'fellowships', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
