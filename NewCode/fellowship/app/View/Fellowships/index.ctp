
<div class="fellowships index">
	<div class="row">
		<div class="col-md-9">
			<legend>Fellowship Database</legend>
		</div>
		<div class="col-md-3" style="text-align: right;">
			<?php echo $this->Html->link(__("Add"), array('action' => 'add'), array("class" => "slds-button slds-button--neutral")); ?>
		</div>
	</div>
	<table class="slds-table slds-table--bordered slds-table--fixed-layout" role="grid" id="myDataTable">
		<thead>
			<tr class="slds-text-title--caps">
				<th class="slds-is-sortable slds-text-title--caps" scope="col"><?php echo $this->Paginator->sort('title'); ?></th>
				<th class="slds-is-sortable slds-text-title--caps" scope="col"><?php echo $this->Paginator->sort('description'); ?></th>
				<th class="slds-is-sortable slds-text-title--caps" scope="col"><?php echo $this->Paginator->sort('created'); ?></th>
				<th class="slds-is-sortable slds-text-title--caps" scope="col"><?php echo $this->Paginator->sort('modified'); ?></th>
				<th class="slds-is-sortable slds-text-title--caps" scope="col"><?php echo $this->Paginator->sort('degree_id'); ?></th>
				<th class="slds-is-sortable slds-text-title--caps" scope="col"><?php echo $this->Paginator->sort('discipline_id'); ?></th>
				<th class="slds-is-sortable slds-text-title--caps" scope="col"><?php echo $this->Paginator->sort('elegibility_id'); ?></th>
				<?php if (AuthComponent::user()) : ?>
					<th scope="col" class="actions"><?php echo __('Actions'); ?></th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($fellowships as $fellowship): ?>
				<tr>
						<td class="slds-truncate">
							<?php echo $this->Html->link($fellowship['Fellowship']['title'], array('action' => 'view', $fellowship['Fellowship']['id'])); ?>
						</td>
						<td class="slds-truncate"><?php echo h($fellowship['Fellowship']['description']); ?></td>
						<td class="slds-truncate"><?php echo date('m/d/Y', strtotime($fellowship['Fellowship']['created'])); ?></td>
						<td class="slds-truncate"><?php echo date('m/d/Y', strtotime($fellowship['Fellowship']['modified'])); ?></td>
						<td class="slds-truncate">
								<?php echo h($fellowship['Degree']['name']); ?>
						</td>
						<td class="slds-truncate">
								<?php echo h($fellowship['Discipline']['name']); ?>
						</td>
						<td class="slds-truncate">
								<?php echo h($fellowship['Elegibility']['name']); ?>
						</td>
						
						<?php if (AuthComponent::user()) : ?>
							<td class="actions">
								<?php echo $this->Html->link("", array('action' => 'edit', $fellowship['Fellowship']['id']), array("class"=>"fa fa-edit", "title" => "Edit")); ?>
								</i>
								<?php echo $this->Form->postLink("",array('action' => 'delete', $fellowship['Fellowship']['id']),
									array("class"=>"fa fa-trash-o", "title" => "Delete", 'confirm' => __('Are you sure you want to delete # %s?', $fellowship['Fellowship']['id']))); ?>
							</td>
						<?php endif; ?>

						
				</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
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
