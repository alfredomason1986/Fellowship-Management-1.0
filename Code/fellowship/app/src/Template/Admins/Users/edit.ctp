<!-- File: src/Template/Admins/Users/edit.ctp -->

<h1>Update User</h1>
<?php
    echo $this->Form->create($user);
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->button(__('Update User'));
    echo $this->Form->end();
?>