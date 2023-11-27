<!-- src/Template/Groups/index.ctp -->

<h1>グループ</h1>

<table>
    <tr>
        <th>グループ名</th>
        <th>グループID</th>
        <th>ユーザ名</td>
        <th>権限</th>
    </tr>
    <!-- $groups はGroupsControllerから渡されたアカウント情報 -->
    <?php foreach ($groups as $group): ?>
    <tr>
        <td><?= h($group->gname) ?></td>
        <td><?= h($group->gid) ?></td>
        <td><?= h($group->name) ?></td>
        <td><?= ($group->admin == 1) ? "管理者" : "一般" ?></td>
        <td class = "actions">
            <?= $this->Html->link(__('状態登録'), ['action' => 'statusinput', $group->name, $group->gid]) ?>
            <?= $this->Html->link(__('グループ管理'),['action' => 'view',$group->gid],['class' => 'btn']) ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <div class = 'actions'>
        <?= $this->Html->link(__('グループ作成'), ['action' => 'add']) ?>
    </div>
    <div style="margin-top: 20px;" style="text-align: center;">
        <?= $this->Html->link('作成したグループへ', ['controller' => 'Groups', 'action' => 'view', $group->gid], ['class' => 'btn']) ?>
    </div>
</table>
