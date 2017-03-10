<div class="disciplines form">
<?php echo $this->Form->create('Discipline'); ?>
	<fieldset>
		<legend><?php echo __('Edit Discipline'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Discipline.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Discipline.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Disciplines'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Fellowships'), array('controller' => 'fellowships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fellowship'), array('controller' => 'fellowships', 'action' => 'add')); ?> </li>
	</ul>
</div>
