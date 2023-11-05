<!-- view.ctp -->

<?php if (isset($data)): ?>

    <h1><?= h($data->gname) ?></h1>

    <?= $this->Html->link('一覧に戻る', ['controller' => 'Groups', 'action' => 'index'], ['class' => 'button']) ?>

    <table>
        <tr>
            <th>グループID</th>
            <td><?= h($data->gid) ?></td>
        </tr>
        <tr>
            <th>名前</th>
            <td><?= h($data->name) ?></td>
        </tr>
        <!-- 他の表示項目を追加 -->
    </table>

<?php else: ?>
    <p>データが見つかりませんでした。</p>
<?php endif; ?>
