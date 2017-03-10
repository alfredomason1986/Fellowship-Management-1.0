<?php 
	$userLink = $this->Html->link(__($fellowship['User']['first_name'] . $fellowship['User']['last_name']), array('controller' => 'users', 'action' => 'view', $fellowship['User']['id']));
	$title = h($fellowship['Fellowship']['title']);
	$buttons = array(
			$this->Form->button('Save', array("class" => "slds-button slds-button--neutral", "onclick" => "submitForm()")),
			$this->Html->link(__("Cancel"), array('action' => 'view', $fellowship['Fellowship']['id']), array("class" => "slds-button slds-button--neutral"))
		);
?>

<div class="fellowships form">
	
	<!--<legend><?php echo __('Edit Fellowship'); ?></legend>-->
	<?php echo $this->element('page_header', array('userLink' => $userLink, "title" => $title, 'buttons' => $buttons, 'escape' => false)); ?>

	<?php echo $this->Form->create('Fellowship', array("class" => "form-horizontal", "role" => "form")); ?>

	<?php echo $this->Form->input('id'); ?>

	<div class="row">
		<div class="col-md-6">
				<?php echo $this->Form->input('title', array("class" => "slds-input", 
					"div" => array("class" => "slds-form-element__control"),"label" => array("class" => "slds-form-element__label"))); ?>
		</div>
		<div class="col-md-6">
			<?php echo $this->Form->input('degree_id', array("class" => "slds-select", 
					"div" => array("class" => "slds-form-element__control"),"label" => array("class" => "slds-form-element__label"))); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
				<?php echo $this->Form->input('discipline_id', array("class" => "slds-select", 
					"div" => array("class" => "slds-form-element__control"),"label" => array("class" => "slds-form-element__label"))); ?>
		</div>
		<div class="col-md-6">
			<?php echo $this->Form->input('elegibility_id', array("class" => "slds-select", 
					"div" => array("class" => "slds-form-element__control"),"label" => array("class" => "slds-form-element__label"))); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
				<?php echo $this->Form->input('description', array("class" => "slds-textarea", "rows" => 5,
					"div" => array("class" => "slds-form-element__control"),"label" => array("class" => "slds-form-element__label"))); ?>
		</div>
	</div>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Fellowship.id')), 
			array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Fellowship.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Fellowships'), array('action' => 'index')); ?></li>
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
	function submitForm(){
		$('form#FellowshipEditForm').submit();
	}
</script>