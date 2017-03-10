<?php
	$tableHeaders = array(
		$this->Paginator->sort('title'),
		$this->Paginator->sort('description'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('modified'),
		$this->Paginator->sort('degree_id'),
		$this->Paginator->sort('discipline_id'),
		$this->Paginator->sort('elegibility_id')
	);

	$tableItems = array();

	foreach($fellowships as $fellowship) {
		$tableItems[] = implode("|", array(
			$this->Html->link($fellowship['Fellowship']['title'], array('action' => 'view', $fellowship['Fellowship']['id'])),
			h($fellowship['Fellowship']['description']),
			date('m/d/Y', strtotime($fellowship['Fellowship']['created'])),
			date('m/d/Y', strtotime($fellowship['Fellowship']['modified'])),
			h($fellowship['Degree']['name']),
			h($fellowship['Discipline']['name']),
			h($fellowship['Elegibility']['name'])
		));
	}

	$actions = array(
		$this->Html->link("", array('action' => 'edit', $fellowship['Fellowship']['id']), array("class"=>"fa fa-edit", "title" => "Edit")),
		$this->Form->postLink("",array('action' => 'delete', $fellowship['Fellowship']['id']),
			array("class"=>"fa fa-trash-o", "title" => "Delete", 
			'confirm' => __('Are you sure you want to delete # %s?', $fellowship['Fellowship']['id'])))
	);

?> 

<div class="fellowships index">
	<legend>Fellowship Database</legend>
	<?php echo $this->element('table', array('tableHeaders' => $tableHeaders, "tableItems" => $tableItems, 'actions' => $actions, 'tableId' => 'myDataTable','escape' => false)); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Fellowship'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Degrees'), array('controller' => 'degrees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Degree'), array('controller' => 'degrees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Disciplines'), array('controller' => 'disciplines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Discipline'), array('controller' => 'disciplines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Elegibilities'), array('controller' => 'elegibilities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elegibility'), array('controller' => 'elegibilities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>



<script>
    $(document).ready(function() {
        $('#myDataTable').DataTable().destroy();
        $('#myDataTable').DataTable({
            responsive: true
        });
    });
</script>
