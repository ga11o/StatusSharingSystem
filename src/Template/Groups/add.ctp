<!-- src/Template/Groups/add.ctp -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('ホーム', ['controller' => 'Accounts', 'action' => 'index'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('あなたの情報', ['controller' => 'Accounts', 'action' => 'view'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('グループ作成', ['controller' => 'Groups', 'action' => 'add'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('ログアウト', ['controller' => 'Accounts', 'action' => 'logout'], ['class' => 'btn']) ?></li>
    </ul>
</nav>

<div class="users index large-9 medium-8 columns content">
<h1>グループ作成</h1>
<!-- $group はGroupsControllerから渡されたグループ情報 -->
<?= $this->Form->create() ?>
<?= $this->Form->input('gname', ['label' => 'グループ名']) ?>
<?= $this->Form->input('gid',['label' => 'グループID']) ?>
<?= $this->Form->button(__('作成')) ?>
<?= $this->Form->end() ?>
</div>