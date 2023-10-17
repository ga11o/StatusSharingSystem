<!-- src/Template/Accounts/index.ctp -->

<h1>アカウント一覧</h1>
<table>
    <tr>
        <th>ID</th>
        <th>氏名</th>
        <th>Email</th>
        <th>電話番号</th>
        <th>パスワード</th>
    </tr>
    <?php foreach ($accounts as $account): ?>
    <tr>
        <td><?= h($account->id) ?></td>
        <td><?= h($account->name) ?></td>
        <td><?= h($account->email) ?></td>
        <td><?= h($account->phone) ?></td>
        <td><?= h($account->password) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
