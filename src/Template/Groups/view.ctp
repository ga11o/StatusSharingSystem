<!-- view.ctp -->

<?php if (isset($data)): ?>

<h1><?= h($ginfo->gname) ?></h1>

<?= $this->Html->link('一覧に戻る', ['controller' => 'Groups', 'action' => 'index'], ['class' => 'button']) ?>

<table>
    <tr>
        <th>グループID</th>
        <td><?= h($ginfo->gid) ?></td>
    </tr>
    <tr>
        <th>名前</th>
        <th>体調</th>
        <th>心情</th>
    <?php foreach ($data as $item): ?>
    <tr>
        <td><?= h($item->name) ?></td>
        <td>
            <?php if($item->physical === 0): ?>
                <p>とても悪い</p>
            <?php elseif($item->physical === 1): ?>
                <p>悪い</p>
            <?php elseif($item->physical === 2): ?>
                <p>普通</p>
            <?php elseif($item->physical === 3): ?>
                <p>良い</p>
            <?php elseif($item->physical === 4): ?>
                <p>とても良い</p>
            <?php endif; ?>
        </td>
        <td>
            <?php if($item->mental === 0): ?>
                <p>とても悪い</p>
            <?php elseif($item->mental === 1): ?>
                <p>悪い</p>
            <?php elseif($item->mental === 2): ?>
                <p>普通</p>
            <?php elseif($item->mental === 3): ?>
                <p>良い</p>
            <?php elseif($item->mental === 4): ?>
                <p>とても良い</p>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <!-- 他の表示項目を追加 -->

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
</table>

<?php else: ?>
<p>データが見つかりませんでした。</p>
<?php endif; ?>