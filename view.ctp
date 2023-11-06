<!-- view.ctp -->

<?php if (isset($data)): ?>

    <h1><?= h($ginfo->gname) ?></h1>

    <table>
        <tr>
            <th>グループID</th>
            <td><?= h($ginfo->gid) ?></td>
        </tr>
        <tr>
            <th>名前</th>
        <?php foreach ($data as $item): ?>
        <tr>
            <td><?= h($item->name) ?></td>
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