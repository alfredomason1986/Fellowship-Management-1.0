<!-- File: src/Template/Articles/index.ctp -->

<h1>Fellowship Database</h1>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= $this->Html->link('Add Fellowship', ['action' => 'add']) ?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th>Action</th
                </tr>
            </thead>
            <tbody>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?= $article->id ?></td>
                    <td>
                        <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
                    </td>
                    <td>
                        <?= $article->created->format(DATE_RFC850) ?>
                    </td>
                    <td>
                        <?= $this->Form->postLink(
                            'Delete',
                            ['action' => 'delete', $article->id],
                            ['confirm' => 'Are you sure?'])
                        ?>
                        <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
                    </td
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
</div>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable().destroy();
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>