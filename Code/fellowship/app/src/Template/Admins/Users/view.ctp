<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($user->username) ?></h1>
<p><?= h($user->password) ?></p>
<p><small>Created: <?= $user->created->format(DATE_RFC850) ?></small></p>