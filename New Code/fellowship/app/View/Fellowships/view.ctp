<?php 
	$userLink = $this->Html->link(__($fellowship['User']['first_name'] . $fellowship['User']['last_name']), array('controller' => 'users', 'action' => 'view', $fellowship['User']['id']));
	$title = h($fellowship['Fellowship']['title']);
	$buttons = array(
			$this->Html->link(__("Edit"), array('action' => 'edit', $fellowship['Fellowship']['id']), array("class" => "slds-button slds-button--neutral")),
			$this->Form->postLink(__('Delete'), array('action' => 'delete', $fellowship['Fellowship']['id']), 
				array("class" => "slds-button slds-button--neutral", 'confirm' => __('Are you sure you want to delete # %s?', $fellowship['Fellowship']['id'])))
		);
?>

<div class="fellowships view">
	<?php echo $this->element('page_header', array('userLink' => $userLink, "title" => $title, 'buttons' => $buttons, 'escape' => false)); ?>

	<div class="main-screen">
		<div class="row">
			<div class="col-md-6">
				<div class="slds-form-element slds-has-divider--bottom">
					<span for="Description" class="slds-form-element__label">Description</span>
					<div class="slds-form-element__control read-only-view">
						<span class="slds-form-element__static"><?php echo h($fellowship['Fellowship']['description']); ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="slds-form-element slds-has-divider--bottom">
					<span for="Degree" class="slds-form-element__label">Degree</span>
					<div class="slds-form-element__control read-only-view">
						<span class="slds-form-element__static">
							<?php echo h($fellowship['Degree']['name']); ?>
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
						<span class="slds-form-element__static"><?php echo date('m/d/Y', strtotime($fellowship['Fellowship']['created'])); ?></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="slds-form-element slds-has-divider--bottom">
					<span for="Degree" class="slds-form-element__label">Modified</span>
					<div class="slds-form-element__control read-only-view">
						<span class="slds-form-element__static">
							<span class="slds-form-element__static"><?php echo date('m/d/Y', strtotime($fellowship['Fellowship']['modified'])); ?></span>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="slds-form-element slds-has-divider--bottom">
					<span for="Description" class="slds-form-element__label">Discipline</span>
					<div class="slds-form-element__control read-only-view">
						<span class="slds-form-element__static">
							<?php echo h($fellowship['Discipline']['name']); ?>
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="slds-form-element slds-has-divider--bottom">
					<span for="Degree" class="slds-form-element__label">Elegibility</span>
					<div class="slds-form-element__control read-only-view">
						<span class="slds-form-element__static">
							<span class="slds-form-element__static">
								<?php echo h($fellowship['Elegibility']['name']); ?>
							</span>
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
		<li><?php echo $this->Html->link(__('Edit Fellowship'), array('action' => 'edit', $fellowship['Fellowship']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fellowship'), array('action' => 'delete', $fellowship['Fellowship']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $fellowship['Fellowship']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Fellowships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fellowship'), array('action' => 'add')); ?> </li>
	</ul>
</div>
