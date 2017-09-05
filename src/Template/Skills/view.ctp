<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Skill $skill
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skill'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="skills view large-9 medium-8 columns content">
    <h3><?= h($skill->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($skill->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($skill->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($skill->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($skill->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($skill->projects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('ProjectName') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->projects as $projects): ?>
            <tr>
                <td><?= h($projects->id) ?></td>
                <td><?= h($projects->projectName) ?></td>
                <td><?= h($projects->description) ?></td>
                <td><?= h($projects->created) ?></td>
                <td><?= h($projects->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($skill->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('FullName') ?></th>
                <th scope="col"><?= __('Organisation') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Experiences') ?></th>
                <th scope="col"><?= __('Strengths') ?></th>
                <th scope="col"><?= __('Weakness') ?></th>
                <th scope="col"><?= __('Major Id') ?></th>
                <th scope="col"><?= __('Interest Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->fullName) ?></td>
                <td><?= h($users->organisation) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->experiences) ?></td>
                <td><?= h($users->strengths) ?></td>
                <td><?= h($users->weakness) ?></td>
                <td><?= h($users->major_id) ?></td>
                <td><?= h($users->interest_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
