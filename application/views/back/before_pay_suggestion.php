<h3><?if($P_data->sex == 'male'):?>Уважаемый<?else:?>Уважаемая<?endif;?>
    <?=$P_data->name_1?> <?=$P_data->name_2?> , Вам прямо сейчас доступно до <?=$Addition_data->credit_amount?> руб онлайн!
    Нужно только Активировать сервис.</h3>

<div>
    <p>Способ получения займа:</p>
    <span><img src="/img/visa-v.png"></span>
    <span><img src="/img/mc-v.png"></span>
    <span><img src="/img/contact-v.png"></span>
    <span><img src="/img/ya-v.png"></span>
</div>

<div>
    <h3>Для активации перейдите по следующей ссылке</h3>
</div>

<div style="width:300px; margin:0 auto; padding-top:40px">
    <? $order_id = $User->id; ?>
    <?php if($a_setting['cur_payment']->value == 'yandex'):?>
        <?php echo Utills::echoYandexForm($a_setting['ya_money_account']->value, $a_setting['pay_sum_activation']->value, $order_id); ?>
    <?php endif;?>
    <?php if($a_setting['cur_payment']->value == 'payeer'):?>
        <?php echo Utills::echoPayeerForm($a_setting['payeer_shop_id']->value, $a_setting['pay_sum_activation']->value, $a_setting['payeer_shop_secret_key']->value, $order_id); ?>
    <?php endif;?>
</div>

<!--
    <div style="width:400px; margin:0 auto; padding-top:40px ">
        <?php if((bool)$a_setting['is_make_a_gift_karma']->value):?>
                <div style="width:100px; float:left; ">
                    <img src="/img/gift.png">
                </div>
                <div style="width:300px; padding-top:20px; float-right; font-size: 18px;">
                    <?=$a_setting['gift_karma_message']->value?>
                </div>
        <?php endif;?>
    </div>
-->