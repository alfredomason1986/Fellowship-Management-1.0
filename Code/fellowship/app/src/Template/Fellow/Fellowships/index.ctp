<!-- File: src/Template/Fellow/Fellowships/index.ctp -->

<h1>Fellowships You Applied To</h1>

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
            <?= $this->Html->link($article['title'], '/fellowships/view/'. $article['id']) ?>
        </td>
        <td>
            <!--?= $article->created->format(DATE_RFC850) ?-->
        </td>
		<td>
			<?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $article['uf_id']],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>