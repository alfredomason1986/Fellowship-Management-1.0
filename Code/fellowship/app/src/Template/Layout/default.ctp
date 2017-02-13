<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'FIU: Fellowship Management 1.0';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul style="z-index:100;" class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1>
				<?=  $this->Html->link(
					'Home', '/',
					['class'=>'', 'target'=>'_self']);
				?>
				</h1>
            </li>
        </ul>
        <div class="top-bar-section">
			<?php
				
				//$session = $this->request->session();
				//$cred_data = $this->request->session()->read('Auth.User');
				//$cred_data = AuthComponent::user();
				//$credname = $cred['username'];
				if(isset($cred) && $cred['username']!=''){
					echo '<span style="font-weight: bolder; color:white;">Hello '.$cred['username'].'.</span>';
				}
			?>
            <ul class="right">
            
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
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
