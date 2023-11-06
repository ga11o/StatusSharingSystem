<!-- src/Template/Groups/remove_user_from_group.ctp -->
<?= $this->Form->create() ?>
<?= $this->Form->input('id', ['label' => 'ユーザIDを入力してください']) ?>
<?= $this->Form->button(__('ユーザを削除')) ?>
<?= $this->Form->end() ?>