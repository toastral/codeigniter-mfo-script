<?include_once($this->config->item('views_root').'/head.php');?>

</head>
<body>

<div class="container">

    <?include_once($this->config->item('views_root').'/top.php');?>

    <div class="row">
        <div class="col-md-6" style="font-size: 84px; line-height: 1.2; font-weight: bold; padding-top:20px;">
            <div style="color:#444444">ВЫБЕРИТЕ</div>
            <div style="color:#666666">СУММУ И</div>
            <div style="color:#999999">СРОК</div>
            <div style="color:#cccccc">ЗАЙМА</div>
        </div>
        <div class="col-md-4 text-left">
            <?include_once($this->config->item('views_root').'/'.$content.'.php');?>
        </div>
        <div class="col-md-2 text-left">
        </div>
    </div>

    <?include_once($this->config->item('views_root').'/footer.php');?>
</div>

</body>
</html>