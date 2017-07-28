<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Bookmarktag $bookmarktag
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bookmarktag'), ['action' => 'edit', $bookmarktag->bookmark_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bookmarktag'), ['action' => 'delete', $bookmarktag->bookmark_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmarktag->bookmark_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarktag'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmarktag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookmarktag view large-9 medium-8 columns content">
    <h3><?= h($bookmarktag->bookmark_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Bookmark') ?></th>
            <td><?= $bookmarktag->has('bookmark') ? $this->Html->link($bookmarktag->bookmark->title, ['controller' => 'Bookmarks', 'action' => 'view', $bookmarktag->bookmark->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $bookmarktag->has('tag') ? $this->Html->link($bookmarktag->tag->title, ['controller' => 'Tags', 'action' => 'view', $bookmarktag->tag->id]) : '' ?></td>
        </tr>
    </table>
</div>
