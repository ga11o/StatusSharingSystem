<h1>ログインページ</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('id') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('ログイン') ?>
<?= $this->Form->end() ?>