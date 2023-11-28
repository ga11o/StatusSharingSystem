<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('ログイン'), ['action' => 'login']) ?></li>
        <li><?= $this->Html->link(__('新規アカウント登録'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<div class="users index large-9 medium-8 columns content">
<h1>ログインページ</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('ID',['name'=>'id']) ?>
<?= $this->Form->control('パスワード',['name'=>'password']) ?>
<?= $this->Form->button('ログイン') ?>
<?= $this->Form->end() ?>
</div>