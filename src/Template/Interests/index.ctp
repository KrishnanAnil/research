<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Interest[]|\Cake\Collection\CollectionInterface $interests
  */
?>

<div class="interests index large-9 medium-8 columns content">
    <h3><?= __('Interests') ?></h3>
    <table class="table table-responsive table-striped table-bordered">
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
            <?php foreach ($interests as $interest): ?>
            <tr>
                <td><?= $this->Number->format($interest->id) ?></td>
                <td><?= h($interest->title) ?></td>
                <td><?= h($interest->created) ?></td>
                <td><?= h($interest->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $interest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $interest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $interest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $interest->id)]) ?>
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
