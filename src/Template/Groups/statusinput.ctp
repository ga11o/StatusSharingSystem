<head>
    <style>
        .radio-group label img{
            animation:fwari ease-in-out 1s infinite alternate;
            -webkit-animation:fwari ease-in-out 1s infinite alternate;
            -moz-animation:fwari ease-in-out 1s infinite alternate;
            margin: 3px;
            padding: 5px;
            width: 120px;
            height: 120px;
        }

        @keyframes fwari{
            0%   { transform:translate(0%, 0%); }
            100% { transform:translate(0%, -20px); }
        }

        @-webkit-keyframes fwari{
            0%   { -webkit-transform:translate(0%, 0%); }
            100% { -webkit-transform:translate(0%, -20px); }
        }

        @-moz-keyframes fwari{
            0%   { -moz-transform:translate(0%, 0%); }
            100% { -moz-transform:translate(0%, -20px); }
        }

        .radio-group input[type="radio"] + label img {
            opacity:0.3;
        }

        .radio-group input[type="radio"]:checked + label img{
            animation-play-state: paused;
            opacity:1;
        }

        .radio-group input[type="radio"] {
            display: none;
        }

        label[for="radiop-1"] img, label[for="radiom-1"] img{
            animation-delay: .0s;
        }

        label[for="radiop-2"] img, label[for="radiom-2"] img{
            animation-delay: .2s;
        }

        label[for="radiop-3"] img, label[for="radiom-3"] img{
            animation-delay: .4s;
        }

        label[for="radiop-4"] img, label[for="radiom-4"] img{
            animation-delay: .6s;
        }

        label[for="radiop-5"] img, label[for="radiom-5"] img{
            animation-delay: .8s;
        }

        .parent {
            display: flex;
            justify-content: flex-start;
        }

        .child {
            text-align: center;
            line-height: 100px;
            width: 155px;
            height: 100px;
        }

        #submit {
            width: 96px;
            height: 57px;
            background-color: #ffd700;
            border-color: #ffd700;
            margin: 0px 10px 10px 0px;
        }

    </style>
</head>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link('ホーム', ['controller' => 'Accounts', 'action' => 'index'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('あなたの情報', ['controller' => 'Accounts', 'action' => 'view'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('グループ作成', ['controller' => 'Groups', 'action' => 'add'], ['class' => 'btn']) ?></li>
        <li><?= $this->Html->link('ログアウト', ['controller' => 'Accounts', 'action' => 'logout'], ['class' => 'btn']) ?></li>
    </ul>
</nav>

<div class="users index large-9 medium-8 columns content">
<h1>体調・心情入力</h1>
<div class="radio-group">
    <form method="post">
        <h3>体調</h3>
        <div>
            <input type="radio" class="radio" id="radiop-1" name="physical" value=0 />
            <label for="radiop-1" id="physical-1"><img src="/img/sobad.png"></label>
            <input type="radio" class="radio" id="radiop-2" name="physical" value=1 />
            <label for="radiop-2" id="physical-2"><img src="/img/bad.png"></label>
            <input type="radio" class="radio" id="radiop-3" name="physical" value=2 />
            <label for="radiop-3" id="physical-3"><img src="/img/normal.png"></label>
            <input type="radio" class="radio" id="radiop-4" name="physical" value=3 />
            <label for="radiop-4" id="physical-4"><img src="/img/good.png"></label>
            <input type="radio" class="radio" id="radiop-5" name="physical" value=4 />
            <label for="radiop-5" id="physical-5"><img src="/img/sogood.png"></label>
        </div>
        <div class="parent">
            <div class="child">とても悪い</div>
            <div class="child">悪い</div>
            <div class="child">普通</div>
            <div class="child">良い</div>
            <div class="child">とても良い</div>
        </div>
        <h3>心情</h3>
        <div>
            <input type="radio" class="radio" id="radiom-1" name="mental" value=0 />
            <label for="radiom-1" id="mental-1"><img src="/img/sobad.png"></label>
            <input type="radio" class="radio" id="radiom-2" name="mental" value=1 />
            <label for="radiom-2" id="mental-2"><img src="/img/bad.png"></label>
            <input type="radio" class="radio" id="radiom-3" name="mental" value=2 />
            <label for="radiom-3" id="mental-3"><img src="/img/normal.png"></label>
            <input type="radio" class="radio" id="radiom-4" name="mental" value=3 />
            <label for="radiom-4" id="mental-4"><img src="/img/good.png"></label>
            <input type="radio" class="radio" id="radiom-5" name="mental" value=4 />
            <label for="radiom-5" id="mental-5"><img src="/img/sogood.png"></label>
        </div>
        <div class="parent">
            <div class="child">とても悪い</div>
            <div class="child">悪い</div>
            <div class="child">普通</div>
            <div class="child">良い</div>
            <div class="child">とても良い</div>
        </div>    
        <input type="submit" id="submit" value="登録">
        <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken') ?>">
    </form>
</div>
<div class = 'actions'>
    <?= $this->Html->link(__('戻る'), ['controller' => 'Accounts', 'action' => 'index'],['class' => 'button']) ?>
</div>
</div>