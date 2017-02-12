<!-- File: src/Template/Admins/Fellowships/add.ctp -->

<h1>Add Fellowship</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->input('title');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->button(__('Save Fellowship'));
    echo $this->Form->end();
?>