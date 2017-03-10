<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <h3 style="margin-top: 10px;">
            <?=  $this->Html->link('Home', 'index',['style'=>'vertical-align: middle;', 'target'=>'_self']);?>
        </h3>
    </div>
    <!-- /.navbar-header -->
        <?php
            if(isset($cred) && $cred['username']!=''){
                    echo '<span style="font-weight: bolder; color:white;">Hello '.$cred['username'].'.</span>';
            }
        ?>
    <ul class="nav navbar-top-links navbar-right">
        <?php if (AuthComponent::user()) : ?>
            <li><a href="/Users/logout">Log Out</a></li>
        <?php else : ?>
            <li><a href="/Users/login">Log In</a></li>
        <?php endif; ?>
    </ul>
    <!-- /.navbar-top-links -->
</nav>
