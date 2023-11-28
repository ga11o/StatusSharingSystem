<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Account $account
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('ホーム'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link('あなたの情報', ['controller' => 'Accounts', 'action' => 'view'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link(__('アカウント編集'), ['action' => 'edit',$account['id']]) ?> </li>
        <li><?= $this->Form->postLink(__('アカウント削除'), ['action' => 'delete']) ?> </li>
    </ul>
</nav>
<div class="accounts form large-9 medium-8 columns content">
    <?= $this->Form->create($account) ?>
    <fieldset>
        <legend><?= __('Edit Account') ?></legend>
        <?php
            echo $this->Form->control('id');
            echo $this->Form->control('password');
            echo $this->Form->control('phone');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
