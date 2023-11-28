<!-- src/Template/Accounts/index.ctp -->
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
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
<h1>アカウントホーム画面</h1>
<table>
    <tr>
        <th>ID</th>
        <th>氏名</th>
        <th>Email</th>
        <th>電話番号</th>
    </tr>
    <tr>
        <td><?= h($id) ?></td>
        <td><?= h($name) ?></td>
        <td><?= h($email) ?></td>
        <td><?= h($phone) ?></td>
    </tr>

    <tr>
        <th>グループ名</th>
        <th>権限</th>
        <th>操作</th>
    </tr>
    <?php foreach ($data as $data): ?>
    <tr>
        <td><?= h($data->gname) ?></td>
        <td><?= ($data->admin == 1) ? "管理者" : "一般" ?></td>
        <td class = "actions">
            <?= $this->Html->link(__('状態登録'), ['controller' => 'Groups', 'action' => 'statusinput', $data->name, $data->gid]) ?>
            <?= $this->Html->link(__('過去の状態'), ['controller' => 'Logs', 'action' => 'index', $data->id, $data->gid]) ?>
            <?php if($data->admin == 1): ?>
                <?= $this->Html->link(__('グループ管理'),['controller' => 'Groups', 'action' => 'view',$data->gid],['class' => 'btn']) ?>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <div style="margin-top: 20px;" style="text-align: center;">
        <?= $this->Form->create(null, ['url' => ['action' => 'index', $data->id], 'class' => 'form']) ?>
        <?= $this->Form->input('グループ ID', ['name' => 'gid']) ?>
        <?= $this->Form->submit('参加する') ?>
        <?= $this->Form->end() ?>
    </div>
</table>
</div>