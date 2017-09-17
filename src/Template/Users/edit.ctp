<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('My Account') ?></legend>
        <div class="row">
            <div class="col-md-6">
            <?php
            echo $this->Form->control('username');
        echo $this->Form->control('fullName'); 
        ?>
    </div>
    <div class="col-md-6">
    <?php echo $this->Form->control('experiences'); ?>
</div>
    </div>
    <div class="row">
            <div class="col-md-6">
            <?php
echo $this->Form->control('email');
echo $this->Form->control('password');
            ?>
            </div>
    <div class="col-md-6">
    <?php             echo $this->Form->control('strengths');
 ?>
</div>
    </div>
    <div class="row">
            <div class="col-md-6">
            <?php
            echo $this->Form->control('confirm_password',array('type'  =>  'password'));
            echo $this->Form->control('organisation');
            echo $this->Form->control('major_id', ['options' => $majors]); 
            
?>
            </div>
    <div class="col-md-6">
    <?php if($user->userType_id == 2)                         
    echo $this->Form->control('position_id', ['options' => $positions]);  
    else 
    echo $this->Form->control('skills._ids', ['options' => $skills]);
    
 ?>
</div>
</div>


<div class="row">
            <div class="col-md-6">
            <?php
                       
            echo $this->Form->control('interest_id', ['options' => $interests]);
            
?>
            </div>
    <div class="col-md-6">

</div>
</div>
    </fieldset>
    <div class="row ">
    <?= $this->Form->button(__('Submit'), array('class'  =>  'btn-block btn-primary')) ?>
       </div>
    <?= $this->Form->end() ?>
</div>
