
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Fellowships'), array('controller' => 'fellowships', 'action' => 'index')); ?> </li>
	</ul>
</div>

<?php
	$headerCols = array(
		$this->Paginator->sort('username'),
		$this->Paginator->sort('first_name'),
		$this->Paginator->sort('last_name'),
		$this->Paginator->sort('created'),
		$this->Paginator->sort('modified'),
		$this->Paginator->sort('role_id')
	);

	foreach($users as $user) {
		$rows[] = array(
			$this->Html->link($user['User']['username'], array('action' => 'view', $user['User']['id'])),
			h($user['User']['first_name']),
			h($user['User']['last_name']),
			date('m/d/Y', strtotime($user['User']['created'])),
			date('m/d/Y', strtotime($user['User']['modified'])),
			h($user['Role']['name']),
		);
	}

	$actions = array(
		$this->Html->link("", array('action' => 'edit', $user['User']['id']), array("class"=>"fa fa-edit", "title" => "Edit")),
		$this->Form->postLink("",array('action' => 'delete', $user['User']['id']),
			array("class"=>"fa fa-trash-o", "title" => "Delete", 
			'confirm' => __('Are you sure you want to delete user %s?', $user['User']['first_name'] .' '. $user['User']['last_name'])))
	);

?> 

<div class="users index">
	<div class="row">
		<div class="col-md-9">
			<legend>User List</legend>
		</div>
		<div class="col-md-3" style="text-align: right;">
			<?php echo $this->Html->link(__("Add"), array('action' => 'add'), array("class" => "slds-button slds-button--neutral")); ?>
		</div>
	</div>
	<?php echo $this->element('table', array('headerCols' => $headerCols, "rows" => $rows, 'actions' => $actions, 'tableId' => 'myDataTable','escape' => false)); ?>
</div>