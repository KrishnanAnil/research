<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\UserType[]|\Cake\Collection\CollectionInterface $userTypes
  */
?>
<div class="userTypes index large-9 medium-8 columns content">
    <h3><?= __('User Types') ?></h3>
    <table class="table table-responsive table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projectName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userTypes as $userType): ?>
            <tr>
                <td><?= $this->Number->format($userType->id) ?></td>
                <td><?= h($userType->projectName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userType->id)]) ?>
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
