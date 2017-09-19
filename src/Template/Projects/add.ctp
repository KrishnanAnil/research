<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="projects form large-9 medium-8 columns content">
    <?= $this->Form->create($project) ?>
    <fieldset>
        <legend><?= __('Post Project') ?></legend>
        <?php
            echo $this->Form->control('projectName',["placeholder"=>"Title of Project"]);
            echo $this->Form->control('description');
            echo $this->Form->control('major_id', ['options' => $majors]); 
           
            echo $this->Form->control('skills._ids', ['options' => $skills]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),["class"=>"btn btn-full btn-primary"]) ?>
    <?= $this->Form->end() ?>
</div>
