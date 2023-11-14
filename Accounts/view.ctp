<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account $account
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('アカウント編集'), ['action' => 'edit']) ?> </li>
        <li><?= $this->Form->postLink(__('アカウント削除'), ['action' => 'delete']) ?> </li>
    </ul>
</nav>
<div class="accounts view large-9 medium-8 columns content">
    <h3><?= h($account['name']) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('氏名') ?></th>
            <td><?= h($account['name']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ユーザID') ?></th>
            <td><?= h($account['id']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('電話番号') ?></th>
            <td><?= h($account['phone']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('メールアドレス') ?></th>
            <td><?= h($account['email']) ?></td>
        </tr>
    </table>
</div>
