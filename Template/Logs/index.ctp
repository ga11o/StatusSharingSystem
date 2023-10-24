<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log[]|\Cake\Collection\CollectionInterface $logs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Log'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="logs index large-9 medium-8 columns content">
<h3>状態ログ</h3>
    <table>
        <tr>
            <th>id</th>
            <th>感情</th>
            <th>体調</th>
            <th>更新時間</th>
        </tr>
            <?php foreach ((array)$logs as $row): ?>
                <tr>
                    <td><?= h($row->$id) ?></td>
                    <td><?= h($row->$mental) ?></td>
                    <td><?= h($row->$physical) ?></td>
                    <td><?= h($row->$time) ?></td>
                </tr>
            <?php endforeach; ?>
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
