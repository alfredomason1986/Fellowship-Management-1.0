<!-- File: src/Template/Fellow/Users/edit.ctp -->

<h1>Update Profile</h1>
<?php
    echo $this->Form->create($user);
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->button(__('Update Profile'));
    echo $this->Form->end();
?>