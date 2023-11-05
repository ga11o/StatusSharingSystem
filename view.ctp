<!-- view.ctp -->

<?php if (isset($data)): ?>

    <h1><?= h($gname->gname) ?></h1>

    <?= $this->Html->link('一覧に戻る', ['controller' => 'Groups', 'action' => 'index'], ['class' => 'button']) ?>

    <table>
        <tr>
            <th>グループID</th>
            <td><?= h($gname->gid) ?></td>
        </tr>
        <tr>
            <th>名前</th>
        <?php foreach ($data as $item): ?>
        <tr>
            <td><?= h($item->name) ?></td>
        </tr>
        <?php endforeach; ?>
        <!-- 他の表示項目を追加 -->
    </table>

<?php else: ?>
    <p>データが見つかりませんでした。</p>
<?php endif; ?>