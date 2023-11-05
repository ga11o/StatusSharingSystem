<!-- src/Template/Groups/add.ctp -->

<h1>グループ作成</h1>
<!-- $group はGroupsControllerから渡されたグループ情報 -->
<?= $this->Form->create() ?>
<?= $this->Form->input('gname', ['label' => 'グループ名']) ?>
<?= $this->Form->input('gid',['label' => 'グループID']) ?>
<?= $this->Form->input('name',['label' => 'ユーザ名']) ?>
<?= $this->Form->input('admin',['label' => '権限']) ?>
<?= $this->Form->button(__('作成')) ?>
<?= $this->Form->end() ?>