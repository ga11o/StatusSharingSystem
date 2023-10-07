<!DOCTYPE html>
<html lang="ja">
<?php
    if(isset($_POST['username']) and !empty($user=$_POST['username']) and !empty($POST['password'])){
        $user=htmlspecialchars($user,ENT_QUOTES|ENT_HTML5);
        $mode=1;
    }
    else $mode=0;
?>
<head>
    <meta charset="utf-8">
    <title>状態共有アプリ</title>
    <style>
        form {
            width: 400px;
            padding: 40px 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            text-align: center;
        }
        form input[type = "text"],form input[type = "password"]{
            width:400px;
            height:50px;
            font-size:200%;
        }
        form p{
            font-size:150%;
            font-weight: bold;
        }
        form input[type = "submit"]{
            width:200px;
            height:50px;
            font-size:90%;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    if($mode==0){
        print <<< EOF
        <img src="sss_login_background.jpg" width="1470" height="820">
        <form method="POST" action="sss.php">
            <h1>ログイン</h1>
            <p>ユーザーID</p>
            <input type="text" name="username" minlength="5" maxlength="13" pattern="^[a-zA-Z0-9_]+$" />
            <p>パスワード</p>
            <input type="password" name="password" minlength="8" maxlength="15" pattern="^[a-zA-Z0-9]+$" />
            <p><input type="submit" value="ログイン" /></P>
        </form>
    EOF;       
    }
    else if($mode==1){
        print "こんにちは".$user."さん";
    }
    ?>
</body>
</html>
