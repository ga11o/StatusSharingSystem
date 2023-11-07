<h1>メッセージを送信</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input(['label' => "グループIDを入力してください"]) ?>
<?= $this->Form->input(['label' => "ユーザ名を入力してください"]) ?>
<?= $this->Form->button(__('招待')) ?>
<?= $this->Form->end() ?>