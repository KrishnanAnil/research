<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'RPGS';
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
    <?= $this->Html->css('bootstrap/bootstrap.css');
     echo $this->Html->script(['jquery/jquery.js', 'bootstrap/bootstrap.js','jquery.matchHeight.js']);
     ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div id="wrap">
<nav class="navbar navbar-default" style="margin-bottom: 10px; min-height:100px;background-color:#3c75a7;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#fff">
        <img alt="Research" src="/img/RPGS_logo/Small_size_245x67_pixels/3_White_logo_on_color1_245x67.png" style="height:75px; padding-top:0px">
      </a>
    </div>
  </div>
</nav>
<?php
  $user = $this->request->session()->read('Auth.User');
  ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <ul class="nav nav-pills">
  <?php if($user['userType_id'] == 2){
   echo '<li role="presentation">'. $this->Html->link(__('Home'), ['controller' => 'Projects', 'action' => 'requests']).'</li>';       
   echo '<li role="presentation">'. $this->Html->link(__('Post Project'), ['controller' => 'Projects', 'action' => 'add']).'</li>';
  } ?>
  <?php if($user['userType_id'] == 1){
   echo '<li role="presentation">'. $this->Html->link(__('Home'), ['controller' => 'Projects', 'action' => 'view']).'</li>';              
   echo '<li role="presentation">'. $this->Html->link(__('Projects'), ['controller' => 'Projects', 'action' => 'index']).'</li>';
  } ?>
  <?php 
    echo '<li role="presentation">'. $this->Html->link(__('My Account'), ['controller' => 'Users', 'action' => 'edit', $user['id']]).'</li>';
    ?>
  <li role="presentation"><a href="#">About</a></li>
  <?php 
    echo '<li role="presentation">'. $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']).'</li>';
    ?>
</ul>
    </div>
    </div>
    </nav>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>

</div>
    <div id="footer">
    <div class="container text-right">
        <p class="muted credit">Research Project and Guidance Services by Basem. Copyright (c) 2017.</p>
    </div>

</div>
</body>

</html>
