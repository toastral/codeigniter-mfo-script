<div class="row">
    <div class="col-md-2">
        <h2 class="site_title"><a href="/">SUPER</a></h2>
        <h2 class="site_title"><a href="/">ZAIM</a></h2>
    </div>
    <div class="col-md-8 text-left">
        <?include_once($this->config->item('views_root').'/left_menu.php');?>
    </div>
    <div class="col-md-2 text-right">
        <?php if($this->User->id):?>
            <a href="/gate/logout">выход</a>
        <?php else:?>
            <a href="/gate/login_form">вход</a>
        <?php endif;?>

    </div>
</div>