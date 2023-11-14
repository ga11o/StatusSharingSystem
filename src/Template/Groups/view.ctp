<!-- view.ctp -->

<?php if (isset($data)): ?>

<h1><?= h($ginfo->gname) ?>画面</h1>

<?= $this->Html->link('一覧に戻る', ['controller' => 'Groups', 'action' => 'index'], ['class' => 'button']) ?>

<table>
    <tr>
        <th>ユーザID</th>
        <th>ユーザ名</th>
        <th>権限</th>
    <?php foreach ($data as $item): ?>
    <tr>
        <td><?= h($item->id) ?></td>
        <td><?= h($item->name) ?></td>
        <td><?= h($item->admin) ?></td>
        <td>
                <?= $this->Html->link(__('状態確認'), [],['class' => 'btn']) ?>
                <?= $this->Html->link(__('退会'),['action' => 'remove_user_from_group',$item->name],['class' => 'btn']) ?>
        </td>
    </tr>
    <?php endforeach; ?>

    <div style="margin-top: 20px;" style="text-align: center;">
        <?= $this->Html->link('ユーザを追加する', 
        ['controller' => 'Groups',
         'action' => 'addUserToGroup',
         '?' => [
            'gname' => $ginfo->gname,
            'gid'   => $ginfo->gid
        ]],
           ['class' => 'btn']) ?>
    </div>
    <div style="margin-top: 20px;" style="text-align: center;">
        <?= $this->Html->link('ユーザを削除する', 
        ['controller' => 'Groups',
        'action' => 'removeUserFromGroup',
        '?' => [
            'gname' => $ginfo->gname,
            'gid'   => $ginfo->gid
        ]],
        ['class' => 'btn']) ?>
    </div>
</table>

<?php else: ?>
<p>データが見つかりませんでした。</p>
<?php endif; ?>