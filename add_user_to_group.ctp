<!-- src/Template/Groups/add_user_to_group.ctp -->
<?= $this->Form->create() ?>
<?= $this->Form->input('id', ['label' => 'ユーザIDを入力してください']) ?>
<?= $this->Form->button(__('ユーザを追加')) ?>
<?= $this->Form->end() ?>