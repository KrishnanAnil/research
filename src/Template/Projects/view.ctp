<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Project $project
  */
?>
<div class="projects form large-9 medium-8 columns content">
    <?php if( isset($project)){ ?>
    <fieldset>
        <legend><?= __('Project Details') ?></legend>
        <?php
            echo $this->Form->control('projectName',["placeholder"=>"Title of Project"]);
            echo $this->Form->control('description');
            ?>
            <div class="row">
            <div class="col-md-6">
            <?php
            echo $this->Form->control('supervisor'); ?>
            </div>
            <div class="col-md-6">
            <?php
            echo $this->Form->control('email');
            ?>
            </div>
            </div>
    </fieldset>
    <?= $this->Form->end() ?>
    <?php } ?>
    <?php if(!isset($project)) { 
        echo 'No Project has been approved / assigned.'; 
    } ?>
</div>
