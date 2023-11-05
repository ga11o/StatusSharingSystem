<!-- src/Template/Accounts/add.ctp -->

<h1>アカウント新規登録</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('氏名',['name'=>'name']) ?>
<?= $this->Form->input('id') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('phone') ?>
<?= $this->Form->button(__('登録')) ?>
<?= $this->Form->end() ?>
<div class = 'actions'>
    <?= $this->Html->link(__('戻る'), ['action' => 'login']) ?>
</div>