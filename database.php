<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8' />
<title></title>
<head>
<body>
<?php

// データベースの接続
// $dbnameでデータベースを指定する
function connect($dbname) {
    $user = 'root';
    $pwd = '';
    $host = 'localhost';

    $dsn = "mysql:host={$host};port=3306;dbname=$dbname;";
    $conn = new PDO($dsn, $user, $pwd);

    return $conn;
}

// データベース接続解除
// $connでデータベースを指定する
function disconnect($conn) {
    $conn = null;
}

// データベース上の操作
// $connでデータベースを指定する
function for_database($conn, string $command) {
    $pst = $conn->query($command);
    $result = $pst->fetchAll(PDO::FETCH_ASSOC);
}

// データベースの初期設定
// テーブルaccountsを作成するだけ
function database_ini() {
    $d_information = connect('information');
    for_database($d_information, 'CREATE TABLE IF NOT EXISTS accounts(name varchar(33), id varchar(13), password varchar(30), phone varchar(11), email varchar(30))');
    disconnect($d_information);
}

?>
</body>
</html>
