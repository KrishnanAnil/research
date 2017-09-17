<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Majors'), ['controller' => 'Majors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Major'), ['controller' => 'Majors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Interests'), ['controller' => 'Interests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Interest'), ['controller' => 'Interests', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Register Page') ?></legend>
        <div class="row">
        <div class="col-md-6 radio">
       <?php echo $this->Form->radio('userType_id',
       [
        ['value' => '1', 'text' => 'Researcher', 'style' => 'margin-right:5px;font-size:14px',  'onclick'=> 'myFunc(this.value)'],
        ['value' => '2', 'text' => 'Academic Expert', 'style' => 'padding-left:5;font-size:14px',  'onclick'=> 'myFunc(this.value)']
    ]);
 ?>
</div>
</div>
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
    <?php                         
    echo $this->Form->control('position_id', ['options' => $positions]);  
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
<script type="text/javascript">
    $( window ).on( "load", function() { 
        $("label[for='usertype-id-1']").click();
        //$("#userType-id-1")
        // myFunc(1);
    });
    function myFunc(val) {
            if(val==1){
                $('#position-id').addClass('hide');
                $("label[for='position-id']").addClass('hide');
                $('#skills-ids').removeClass('hide');
                $("label[for='skills-ids']").removeClass('hide');
            }
            else{
                $('#position-id').removeClass('hide');
                $("label[for='position-id']").removeClass('hide');
                $('#skills-ids').addClass('hide');
                $("label[for='skills-ids']").addClass('hide');
            }
       }
</script>