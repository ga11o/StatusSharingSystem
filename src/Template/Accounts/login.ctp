<h1>ログインページ</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('ID',['name'=>'id']) ?>
<?= $this->Form->control('パスワード',['name'=>'password']) ?>
<?= $this->Form->button('ログイン') ?>
<?= $this->Form->end() ?>
<div class = 'actions'>
    <?= $this->Html->link(__('新規アカウント登録'), ['action' => 'add']) ?>
</div>