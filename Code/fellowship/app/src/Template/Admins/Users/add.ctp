<!-- src/Template/Admins/add.ctp -->

<div class="users form">
<?= $this->Form->create($admin) ?>
    <fieldset>
        <legend><?= __('Add Admin') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('role', [
            'options' => ['admin' => 'Admin', 'author' => 'Fellow']
        ]) ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>