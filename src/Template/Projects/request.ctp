<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Request') ?></legend>
        <div class="row">
            <div class="col-md-6">
            <?php
        echo $this->Form->control('fullName' ,['disabled'=> true]); 
        echo $this->Form->control('email',['disabled'=> true]);
        
        ?>
    </div>
    <div class="col-md-6">
    <?php echo $this->Form->control('experiences',['disabled'=> true]); ?>
</div>
    </div>
    <div class="row">
            <div class="col-md-6">
            <?php
                        echo $this->Form->control('organisation',['disabled'=> true]);
                        echo $this->Form->control('major_id', ['options' => $majors ,'disabled'=> true]); 
            ?>
            </div>
    <div class="col-md-6">
    <?php             echo $this->Form->control('strengths',['disabled'=> true]);
 ?>
</div>
    </div>
    <div class="row">
            <div class="col-md-6">
            <?php
echo $this->Form->control('skills._ids', ['options' => $skills ,'disabled'=> true]);
            
?>
            </div>
    <div class="col-md-6">
    
</div>
</div>

    </fieldset>
    <div class="row">
        <div class="col-md-6">
        <?= $this->Form->button(__('Approve'), array('class'  =>  'btn-block btn-primary', 'name'=>'Approve')) ?>

        </div> 
        <div class="col-md-6">
        <?= $this->Form->button(__('Disapprove'), array('class'  =>  'btn-block btn-primary' , 'name'=>'Disapprove')) ?>

        </div> 

    </div>
    <?= $this->Form->end() ?>
</div>
