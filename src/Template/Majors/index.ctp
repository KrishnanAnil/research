<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Major[]|\Cake\Collection\CollectionInterface $majors
  */
?>
<div class="majors index large-9 medium-8 columns content">
    <h3><?= __('Majors') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-responsive table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($majors as $major): ?>
            <tr>
                <td><?= $this->Number->format($major->id) ?></td>
                <td><?= h($major->title) ?></td>
                <td><?= h($major->created) ?></td>
                <td><?= h($major->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $major->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $major->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $major->id], ['confirm' => __('Are you sure you want to delete # {0}?', $major->id)]) ?>
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
