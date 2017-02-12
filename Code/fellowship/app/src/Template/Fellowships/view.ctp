<!-- File: src/Template/Articles/view.ctp -->
<?= $this->Form->postLink(
                'Apply to Fellowship',
                ['controller'=>'fellowships', 'prefix'=>'fellow',
				'action' => 'add', $article->id])
            ?>
<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>