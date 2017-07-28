<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Bookmarktag[]|\Cake\Collection\CollectionInterface $bookmarktag
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bookmarktag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookmarktag index large-9 medium-8 columns content">
    <h3><?= __('Bookmarktag') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('bookmark_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookmarktag as $bookmarktag): ?>
            <tr>
                <td><?= $bookmarktag->has('bookmark') ? $this->Html->link($bookmarktag->bookmark->title, ['controller' => 'Bookmarks', 'action' => 'view', $bookmarktag->bookmark->id]) : '' ?></td>
                <td><?= $bookmarktag->has('tag') ? $this->Html->link($bookmarktag->tag->title, ['controller' => 'Tags', 'action' => 'view', $bookmarktag->tag->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookmarktag->bookmark_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookmarktag->bookmark_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookmarktag->bookmark_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmarktag->bookmark_id)]) ?>
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
