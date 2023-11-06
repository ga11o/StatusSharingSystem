<h1>体調・心情入力</h1>
<?= $this->Form->create() ?>
<?= $this->Form->label('体調') ?>
<?= $this->Form->select('physical', ['とても悪い','悪い','普通','良い','とても良い'],['empty' => '現在の体調を教えてください']) ?>
<?= $this->Form->label('心情') ?>
<?= $this->Form->select('mental',['とても悪い','悪い','普通','良い','とても良い'],['empty' => '現在の精神状態を教えてください']) ?>
<?= $this->Form->button(__('登録')) ?>
<?= $this->Form->end() ?>
<div class = 'actions'>
    <?= $this->Html->link(__('戻る'), ['action' => 'index'],['class' => 'button']) ?>
</div>