<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
  */
?>
<div class="projects well well-lg">
    <h3><?= __('List of Projects') ?></h3>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Stauts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projectName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?php echo $this->Form->checkbox('status', ['disabled'=>true, 'hiddenField' => false, 'checked'=> $project->status]); ?>
                </td>
                <td><?= h($project->projectName) ?></td>
                <td><?= h($project->description) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Apply'), ['action' => 'apply', $project->id]) ?>
                </td>
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
