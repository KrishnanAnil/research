<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Project $project
  */
?>
<div class="projects form large-9 medium-8 columns content">
    <?php if( isset($projects)){ ?>
        <?php foreach ($projects as $project): ?>
        <fieldset>
        <legend><?= __('Project Details') ?></legend>
        <?php
            echo $this->Form->input('projectName',["placeholder"=>"Title of Project", 'value'=>$project->projectName]);
            echo $this->Form->input('description', ['value'=>$project->description]);
            ?>
            <div class="row">
            <div class="col-md-6">
            <?php
            echo $this->Form->control('supervisor', ['value'=>$project->supervisor]); ?>
            </div>
            <div class="col-md-6">
            <?php
            echo $this->Form->control('email', ['value'=>$project->email]);
            ?>
            </div>
            </div>
    </fieldset>
            <?php break; endforeach; ?>
    <?php $this->Form->end();
    }
    ?>

    <?php if(count($projects) == 0) { 
        echo 'No Project has been approved / assigned.'; 
    } ?>

</div>
