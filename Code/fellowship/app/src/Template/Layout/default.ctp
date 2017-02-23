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

        <!-- lib/CSS-->
        <?php
            echo $this->Html->css('bootstrap.min'); // Bootstrap
            echo $this->Html->css('metisMenu.min'); // MetisMenu
            echo $this->Html->css('sb-admin-2.min'); // Custom Theme
            echo $this->Html->css('font-awesome.min'); // Custom Fonts    
            echo $this->Html->css('bootstrap-social'); // Social Buttons

            /*Datatables*/
            echo $this->Html->css('datatables/dataTables.bootstrap');
            echo $this->Html->css('datatables/dataTables.responsive');

            echo $this->Html->css('morris'); // Morris Charts
        ?>
        <!-- End lib/CSS -->

        <!--lib/JS-->
        <?php
            echo $this->Html->script('jquery.min.js'); // jQuery
            echo $this->Html->script('bootstrap.min.js'); // Bootstrap
            echo $this->Html->script('metisMenu.min.js'); // MetisMenu
            echo $this->Html->script('sb-admin-2.min.js'); // Custom Theme

            /*Datatables*/
            echo $this->Html->script('datatables/jquery.dataTables.min.js');
            echo $this->Html->script('datatables/dataTables.bootstrap.min.js');
            echo $this->Html->script('datatables/dataTables.responsive.js');

            /*Morris Chart*/
    //        echo $this->Html->script('morrisChart/raphael.min.js');
    //        echo $this->Html->script('morrisChart/morris.min.js');
    //        echo $this->Html->script('morrisChart/morris-data.js');

            /*Flot Charts*/
    //        echo $this->Html->script('flotChart/excanvas.min.js');
    //        echo $this->Html->script('flotChart/jquery.flot.js');
    //        echo $this->Html->script('flotChart/jquery.flot.pie.js');
    //        echo $this->Html->script('flotChart/jquery.flot.resize.js');
    //        echo $this->Html->script('flotChart/jquery.flot.time.js');
    //        echo $this->Html->script('flotChart/jquery.flot.tooltip.min.js');
    //        echo $this->Html->script('flotChart/flot-data.js');
        ?>
        <!--End of lib/JS-->

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <?php include('navigation.ctp'); ?>
            <?= $this->Flash->render() ?>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>
        </div>    
    </body>
</html>
