<!-- File: src/Template/Fellowships/index.ctp -->

<?php echo $this->Form->create(null, ['type' => 'get']); ?>
<style>
.criteria {float:left; width:300px; padding: .5em 1em 0 0; weight:bold;}
.clear {clear:both;}
</style>
<div class="criteria">
<label>Discipline</label>
<?php
$discipline_o = ['AH' => 'Arts & Humanities', 'LF' => 'Life Sciences'];
echo $this->Form->select('discipline', $discipline_o, ['empty' => true]);
?>
</div>
<div class="criteria">
<label>Demographic</label>
<?php
$demographics_o = ['Women' => 'Women', 'URM' => 'Under-Represented Minorities', 'Other'=>'Other'];
echo $this->Form->select('demographics', $demographics_o, ['empty' => true]);
?>
</div>
<br/>
<div class="clear">
<?php
echo $this->Form->button('Search', ['type' => 'submit']);
?>
</div>
<?php
echo $this->Form->end();
?>
<h1>Fellowship Database</h1>
<!--?= $this->Html->link('Add Fellowship', ['action' => 'add']) ?-->
<table>
    <tr>
        <th><?= $this->Paginator->sort('id', 'Id') ?></th>
        <th><?= $this->Paginator->sort('title', 'Title') ?></th>
        <th><?= $this->Paginator->sort('created', 'Created') ?></th>
		<!--th>Action</th-->
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article->id ?></td>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
		<!--td>
			<?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $article->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
        </td-->
    </tr>
    <?php endforeach; ?>
</table>

<style>
.paginator ul {list-style: none; display:inline;}
.paginator ul li {display: inline;}

</style>
<div class="paginator">
<ul>
<!--Shows the next and previous links-->
<?= $this->Paginator->prev('« Previous') ?>
<!--Shows the page numbers-->
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next('Next »') ?>
</ul>
<br />
<!--Prints X of Y, where X is current page and Y is number of pages-->
<?= $this->Paginator->counter() ?>
