<!-- File: src/Template/Articles/index.ctp -->

<h1>Admins List</h1>
<?= $this->Html->link('Add Admin', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
		<th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $admins query object, printing out admin info -->

    <?php foreach ($admins as $admin): ?>
    <tr>
        <td><?= $admin->id ?></td>
        <td>
            <?= $this->Html->link($admin->username, ['action' => 'view', $admin->id]) ?>
        </td>
        <td>
            <?= $admin->created->format(DATE_RFC850) ?>
        </td>
		<td>
			<?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $admin->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $admin->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>