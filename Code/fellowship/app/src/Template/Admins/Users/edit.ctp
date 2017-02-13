<!-- File: src/Template/Admins/Users/edit.ctp -->

<h1>Update User</h1>
<?php
    echo $this->Form->create($user);
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->button(__('Update User'));
    echo $this->Form->end();
?>

<h1>Fellowships <?php echo $user['username']; ?> Applied To</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
		<th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->
    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article['uf_id'] ?></td>
        <td>
            <?= $this->Html->link($article['title'], ['action' => 'view', $article['id']]) ?>
        </td>
        <td>
            <!--?= $article->created->format(DATE_RFC850) ?-->
        </td>
		<td>
			<?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $article['id']],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>