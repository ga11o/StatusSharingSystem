<!-- src/Template/Accounts/add.ctp -->

<h1>アカウント新規登録</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('氏名',['name'=>'name']) ?>
<?= $this->Form->input('ID',['name'=>'id']) ?>
<?= $this->Form->input('パスワード',['name'=>'password']) ?>
<?= $this->Form->input('メールアドレス',['name'=>'email']) ?>
<?= $this->Form->input('電話番号',['name'=>'phone']) ?>
<?= $this->Form->button(__('登録')) ?>
<?= $this->Form->end() ?>
<div class = 'actions'>
    <?= $this->Html->link(__('戻る'), ['action' => 'login']) ?>
</div>