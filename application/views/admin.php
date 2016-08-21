<?include_once($this->config->item('views_root').'/head.php');?>
</head>
<body>

<div class="container">

    <?include_once($this->config->item('views_root').'/top.php');?>

    <div class="row">
        <div class="col-md-4 back-menu">
            <a href="/admin/setting">НАСТРОЙКИ</a><br>
            <a href="/admin/offer">КРЕДИТЫ</a><br>
            <a href="/admin/trans_log">ЛОГ</a><br>
            <a href="/admin/user">ПОЛЬЗОВАТЕЛИ</a><br>
            <a href="/admin/upacc">ПАРОЛЬ</a><br>
        </div>
        <div class="col-md-6 text-left">
            <?include_once($this->config->item('views_root').'/'.$content.'.php');?>
        </div>
        <div class="col-md-2 text-left">
        </div>
    </div>
    <?include_once($this->config->item('views_root').'/footer.php');?>
</div>

</body>
</html>