<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
  */
?>
<div class="projects well well-lg">
    <h3><?= __('Requests') ?></h3>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Researcher Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projectName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('skills') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?= h($project->fullName) ?>
                </td>
                <td><?= h($project->projectName) ?></td>
                <td><?= h($project->description) ?></td>
                <!-- <td><?= h($project->skills) ?></td> -->
                <td><?= h($project->status) ?></td>
                <?php if($project->projectName) {
                 echo '<td class="actions">';
                 echo  $this->Html->link(__('View'), ['action' => 'request', $project->userId, $project->id ]);
                 echo  $this->Form->postLink(__('Delete'), ['action' => 'deleteRequest', $project->userId, $project->id], ['confirm' => __('Are you sure you want to delete this request?')]);
                 echo '</td>';
                } ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
