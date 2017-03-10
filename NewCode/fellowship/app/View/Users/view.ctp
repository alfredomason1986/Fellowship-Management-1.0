<?php 
	$userLink = $this->Html->link(__($user['User']['first_name'] .$user['User']['last_name']), array('controller' => 'users', 'action' => 'view', $user['User']['id']));
	$title = h($user['User']['first_name'] .' ' .$user['User']['last_name']);
	$buttons = array(
			$this->Html->link(__("Edit"), array('action' => 'edit', $user['User']['id']), array("class" => "slds-button slds-button--neutral")),
			$this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id'] ), 
				array("class" => "slds-button slds-button--neutral", 'confirm' => __('Are you sure you want to delete user %s?', $user['User']['first_name'] .' '. $user['User']['last_name'])))
		);
?>

<div class="users view">
	<?php echo $this->element('page_header', array('userLink' => $userLink, "title" => $title, 'buttons' => $buttons, 'escape' => false)); ?>

	<div class="main-screen">
		<div class="row">
			<div class="col-md-6">
				<div class="slds-form-element slds-has-divider--bottom">
					<span for="Description" class="slds-form-element__label">Username</span>
					<div class="slds-form-element__control read-only-view">
						<span class="slds-form-element__static"><?php echo h($user['User']['username']); ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="slds-form-element slds-has-divider--bottom">
					<span for="Degree" class="slds-form-element__label">Role</span>
					<div class="slds-form-element__control read-only-view">
						<span class="slds-form-element__static">
							<?php echo h($user['Role']['name']); ?>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="slds-form-element slds-has-divider--bottom">
					<span for="Description" class="slds-form-element__label">Created</span>
					<div class="slds-form-element__control read-only-view">
						<span class="slds-form-element__static"><?php echo date('m/d/Y', strtotime($user['User']['created'])); ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="slds-form-element slds-has-divider--bottom">
					<span for="Degree" class="slds-form-element__label">Modified</span>
					<div class="slds-form-element__control read-only-view">
						<span class="slds-form-element__static">
							<span class="slds-form-element__static"><?php echo date('m/d/Y', strtotime($user['User']['modified'])); ?></span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Fellowships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>

<div class="related">
	<h3><?php echo __('Related Fellowships'); ?></h3>
	<?php if (!empty($user['Fellowship'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Degree Id'); ?></th>
		<th><?php echo __('Discipline Id'); ?></th>
		<th><?php echo __('Elegibility Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Fellowship'] as $fellowship): ?>
		<tr>
			<td><?php echo $fellowship['id']; ?></td>
			<td><?php echo $fellowship['title']; ?></td>
			<td><?php echo $fellowship['description']; ?></td>
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

	
</div>
