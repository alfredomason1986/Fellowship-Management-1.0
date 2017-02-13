<!-- File: src/Template/Admin/Users/index.ctp -->

<h1>Users List</h1>
<?= $this->Html->link('Add User', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Id</th>
		<th>Role</th>
        <th>Username</th>
        <th>Created</th>
		<th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $users query object, printing out user info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
		<td><?= $user->role ?></td>
        <td>
            <?= $this->Html->link($user->username, ['action' => 'view', $user->id]) ?>
        </td>
        <td>
            <?= $user->created->format(DATE_RFC850) ?>
        </td>
		<td>
			<?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $user->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $user->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>