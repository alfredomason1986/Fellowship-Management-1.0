<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <h3 style="margin-top: 10px;">
            <?=  $this->Html->link('Home', '/',['style'=>'vertical-align: middle;', 'target'=>'_self']);?>
        </h3>
    </div>
    <!-- /.navbar-header -->
        <?php

                //$session = $this->request->session();
                //$cred_data = $this->request->session()->read('Auth.User');
                //$cred_data = AuthComponent::user();
                //$credname = $cred['username'];
                if(isset($cred) && $cred['username']!=''){
                        echo '<span style="font-weight: bolder; color:white;">Hello '.$cred['username'].'.</span>';
                }
        ?>
    <ul class="nav navbar-top-links navbar-right">
        <?php

            //$session = $this->request->session();
            //$cred_data = $session->read('Auth.User');
            //if(!empty($cred_data)){
            //	print_r($cred_data);
            //}


            if(empty($cred)){
                    echo '<li>' . $this->Html->link(
                            'Create Profile', '/users/add',
                            ['class'=>'button', 'target'=>'_self'])
                            . '</li>';

                    echo '<li>' . $this->Html->link(
                            'Login', '/users/login',
                            ['class'=>'button', 'target'=>'_self'])
                            . '</li>';
            } else{
                    //print_r($cred_data);


                    if(isset($cred['role']) && $cred['role']==='admin'){
                            echo '<li>' . $this->Html->link(
                            'Edit Profile', '/admins/users/edit/'.$cred['id'],
                            ['class'=>'button', 'target'=>'_self'])
                            . '</li>';

                            echo '<li>' . $this->Html->link(
                            'Users', '/admins/users/',
                            ['class'=>'button', 'target'=>'_self'])
                            . '</li>';
                            echo '<li>' . $this->Html->link(
                            'Fellowships', '/admins/fellowships/',
                            ['class'=>'button', 'target'=>'_self'])
                            . '</li>';
                    }else if(isset($cred['role']) && $cred['role']==='fellow'){
                            echo '<li>' . $this->Html->link(
                            'Edit Profile', '/fellow/users/edit/'.$cred['id'],
                            ['class'=>'button', 'target'=>'_self'])
                            . '</li>';

                            echo '<li>' . $this->Html->link(
                            'Fellowships You Applied To', '/fellow/fellowships',
                            ['class'=>'button', 'target'=>'_self'])
                            . '</li>';
                    }
                    echo '<li>' . $this->Html->link(
                            'Logout', '/users/logout',
                            ['class'=>'button', 'target'=>'_self'])
                            . '</li>';
            }

        ?>
    </ul>
    <!-- /.navbar-top-links -->
</nav>
