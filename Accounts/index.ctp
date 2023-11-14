<!-- src/Template/Accounts/index.ctp -->

<h1>アカウントホーム画面</h1>
<table>
    <div style="margin-top: 20px;" style="text-align: center;">
        <?= $this->Html->link('あなたの情報', ['controller' => 'Accounts', 'action' => 'view'], ['class' => 'btn']) ?>
    </div>
    <div style="margin-top: 20px;" style="text-align: center;">
        <?= $this->Html->link('グループ作成', ['controller' => 'Groups', 'action' => 'add'], ['class' => 'btn']) ?>
    </div>
    <div style="margin-top: 20px;" style="text-align: center;">
        <?= $this->Html->link('ログアウト', ['controller' => 'Accounts', 'action' => 'logout'], ['class' => 'btn']) ?>
    </div>
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
        <th>所属グループ一覧</th>
    </tr>
    <?php foreach ($data as $data): ?>
    <tr>
        <td><?= h($data->gname) ?></td>
        <td><?= h($data->gid) ?></td>
        <td><?= h($data->admin) == 1 ? '管理者' : '参加者' ?></td>
    </tr>
    <?php endforeach; ?>
</table>
