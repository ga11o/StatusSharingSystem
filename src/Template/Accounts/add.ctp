<!-- src/Template/Accounts/add.ctp -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('ログイン'), ['action' => 'login']) ?></li>
        <li><?= $this->Html->link(__('新規アカウント登録'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<div class="users index large-9 medium-8 columns content">
<h1>アカウント新規登録</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('氏名',['name'=>'name']) ?>
<?= $this->Form->input('ID',['name'=>'id']) ?>
<?= $this->Form->input('パスワード',['name'=>'password']) ?>
<?= $this->Form->input('メールアドレス',['name'=>'email']) ?>
<?= $this->Form->input('電話番号',['name'=>'phone']) ?>
<?= $this->Form->button(__('登録')) ?>
<?= $this->Form->end() ?>
</div>