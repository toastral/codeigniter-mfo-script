<?include_once($this->config->item('views_root').'/head.php');?>
</head>
<body>

<div class="container">

    <?include_once($this->config->item('views_root').'/top.php');?>

    <div class="row">
        <div class="col-md-4 back-menu">
            <a href="/back">ЗАЙМЫ</a><br>
            <a href="/back/profile">ПРОФАЙЛ</a><br>
<?php if(!$a_setting['is_disable_show_karma']->value): ?>
            <a href="/back/karma">КРЕДИТНАЯ КАРМА</a><br>
<?php endif; ?>
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